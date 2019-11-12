<?php require_once "./public/session.php" ?>
<?php
header("Content-type:text/html;charset=utf-8");  //设置字符集防止乱码

/**
 * catedit.php  //文章编辑页面
 * @author zhangshuai   //作者
 * @link www.zh66.club   //友链
 * @since 2019年9月29  1.1   //日期
 * @copyright GPL   //版权
 */

require_once "./lib/init.php";

//获取地址栏上的id
$art_id=$_GET['art_id'];

//链接数据库
//$link= mConn();


//检测是否有数据提交
if(empty($_POST))
{
    //取出该行的数据，作为默认值放在前台页面上展示
    $sql="select art.*,cat.catname from art,cat where art.art_id=$art_id and  art.cat_id=cat.cat_id  ";
    $row= mGetRow($sql);  //这是一维数组

    $sql="select * from cat";
    $c=mGetAll($sql);
    //展示前台页面
    require './update-article.php';
    exit();
} 

$cat_id=$_POST['category'];
$title=trim($_POST['title']);
$contents=trim($_POST['content']);
$tags=$_POST['tags'];
$keywords=$_POST['keywords'];
$des=$_POST['describe'];
$add_time=time();
$pic=$_POST['titlepic'];

//检测文章是否为空
if(empty($title))
{
    echo '文章名不能为空';
    exit();
}

//检测文章是否已经存在
//获取查询出的内容 mysqli_fetho_assoc，row,array
$sql="select count(*) from cat where title='$title'";
$count= mGetOne($sql);
if($count>=1)
{
    echo "<script>alert('该文章名已经存在，请重新输入！'); window.location.href='update-article.php?art_id=$art_id'</script>";
    exit();
}


//执行都成功了，下一步就是修改文章内容到数据库表中了
//修改文章
$sql="update art set cat_id='$cat_id',title='$title',contents='$contents',tags='$tags',keywords='$keywords',des='$des',add_time='$add_time',pic='$pic' where art_id=$art_id";
$res= mQuery($sql);

//判断SQL语句是否执行成功
if(!$res)
{
    echo "<script>alert('文章修改失败！');window.location.href='article.php'</script>";
}  
else {
    echo "<script>alert('文章修改成功！');window.location.href='article.php'</script>";
}