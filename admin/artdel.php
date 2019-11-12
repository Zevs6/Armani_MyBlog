<?php require_once "./public/session.php" ?>
<?php
header("Content-type:text/html;charset=utf-8");  //设置字符集防止乱码

/**
 * catdel.php  //文章删除页面
 * @author zhangshuai   //作者
 * @link www.zh66.club   //友链
 * @since 2019年9月29  1.1   //日期
 * @copyright GPL   //版权
 */
require_once "./lib/init.php";


//获取地址栏上的id
$id=$_GET['art_id'];

//链接数据库
//$link=  mysqli_connect('localhost','root','','zhangshuai');
//mysqli_query($link, 'set names utf8');

//检测文章id是否合法
if(!is_numeric($id))
{
    echo '文章id不合法！';
    exit();
}

//检测文章id是否存在
$sql="select count(*) from art where art_id=$id ";

$count=mGetOne($sql);
if($count<=0)
{
    echo '文章不存在';
    exit();
}



//执行删除操作
$sql="delete from art where art_id=$id";
$res= mQuery($sql);
//删除文章时，文章下的评论也将全部删除
mQuery("delete from comment where art_id=$id");

if(!$res)
{
    echo "<script>alert('文章删除失败！');window.location.href='article.php'</script>";

}  else {
    echo "<script>alert('文章删除成功！');window.location.href='article.php'</script>";
}




