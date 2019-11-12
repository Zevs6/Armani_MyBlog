<?php require_once "./public/session.php" ?>
<?php 
    header("Content-type:text/html;charset=utf-8");  //设置字符集防止乱码
    /**
     * catadd.php  //文章添加
     * @author zhangshuai   //作者
     * @link www.zh66.club   //友链
     * @since 2019年10月31  1.1   //日期
     * @copyright GPL   //版权
     */
    require_once "./lib/init.php";

    $sql="select * from cat";
    $row=mGetAll($sql);
    
    //检测是否有数据提交
    if(empty($_POST))
    {
        //展示前台页面
        require './add-article.php';
        exit;
    } else{
        //检测标题是否为空
        $title=trim($_POST['title']);
        if($title==''){
            echo "<script>alert('标题不能为空！'); window.location.href='add-article.php'</script>";
        }

        //检测栏目是否合法
        $cat_id=$_POST['category'];
        

        //检测内容是否为空
        $contents=trim($_POST['content']);
        if($contents==''){
            echo "<script>alert('内容不能为空！'); window.location.href='add-article.php'</script>";
        }
        
        $tags=$_POST['tags'];
        $keywords=$_POST['keywords'];
        $des=$_POST['describe'];
        $add_time=time();
        $pic=$_POST['titlepic'];
      
        $sql="insert into art (cat_id,title,contents,tags,keywords,des,add_time,pic) value ('$cat_id','$title','$contents','$tags','$keywords','$des','$add_time','$pic')";
        $row=mQuery($sql);
        //插入内容到art表
        if(!$row){
            echo "<script>alert('文章发布失败！'); window.location.href='add-article.php'</script>";
        }else{
            
            if($tags==''){
                echo "<script>alert('文章发布成功！'); window.location.href='article.php'</script>";
            }else {
                //获取上次 insert 操作产生的主键id
                $art_id=mGetOne("select max(art_id) from art");
				
                //插入tag到tag表
                $tag=explode(',',$tags); //索引数组
                //print_r($tag);
                $sql="insert into tag (art_id,tag) values ";
                foreach($tag as $v){
                    $sql.="(".$art_id.",'".$v."'),";
                }
                $sql=rtrim($sql,",");
                if(mQuery($sql)){
                    echo "<script>alert('文章发布成功！'); window.location.href='article.php'</script>";
                }else{
                    //tag 添加失败 删除原文章
                    $sql="delete from art where art_id=$art_id";
                    if(mQuery($sql)){
                        echo "<script>alert('文章发布失败！'); window.location.href='add-article.php'</script>";
                    }
                }
            }
        }
        

    }
?>