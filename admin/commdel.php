<?php require_once "./public/session.php" ?>
<?php
header("Content-type:text/html;charset=utf-8");  //设置字符集防止乱码

/**
 * catdel.php  //评论删除页面
 * @author zhangshuai   //作者
 * @link www.zh66.club   //友链
 * @since 2019年9月29  1.1   //日期
 * @copyright GPL   //版权
 */
require_once "./lib/init.php";


//获取地址栏上的id
$id=$_GET['comment_id'];

//链接数据库
//$link=  mysqli_connect('localhost','root','','zhangshuai');
//mysqli_query($link, 'set names utf8');

//检测评论id是否合法
if(!is_numeric($id))
{
    echo '评论id不合法！';
    exit();
}

//检测评论id是否存在
$sql="select count(*) from comment where comment_id=$id ";

$count=mGetOne($sql);
if($count<=0)
{
    echo '评论不存在';
    exit();
}



//执行删除操作
$sql="delete from comment where comment_id=$id";
$res= mQuery($sql);


if(!$res)
{
    echo "<script>alert('评论删除失败！');window.location.href='comment.php'</script>";

}  else {
    echo "<script>alert('评论删除成功！');window.location.href='comment.php'</script>";
}




