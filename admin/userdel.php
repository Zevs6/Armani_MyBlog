<?php require_once "./public/session.php" ?>
<?php
header("Content-type:text/html;charset=utf-8");  //设置字符集防止乱码

/**
 * catdel.php  //用户删除页面
 * @author zhangshuai   //作者
 * @link www.zh66.club   //友链
 * @since 2019年9月29  1.1   //日期
 * @copyrigh GPL   //版权
 */

require_once "./lib/init.php";

//获取地址栏上的id
$id=$_GET['user_id'];

//链接数据库
$link= mConn();
//$link=  mysqli_connect('localhost','root','','zhangshuai');
//mysqli_query($link, 'set names utf8');

//检测用户id是否合法
if(!is_numeric($id))
{
    echo '用户id不合法！';
}

//检测用户id是否存在
$sql="select count(*) from user where user_id=$id ";
$res=  mysqli_query($link, $sql);
//判断SQL语句是否执行成功
if (!$res)
{
    echo mysqli_error($link);
    exit();
}
$count=mysqli_fetch_row($res)[0];
if($count<=0)
{
    echo '用户id不存在';
    exit();
}


//执行删除操作
$sql="delete from user where user_id='$id'";
$res=  mysqli_query($link, $sql);
if(!$res)
{
    echo mysqli_error($link);
}  else {
    header('location:manage-user.php');
}




