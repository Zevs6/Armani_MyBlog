<?php require_once "./public/session.php" ?>
<?php
header("Content-type:text/html;charset=utf-8");  //设置字符集防止乱码

/**
 * catadd.php  //用户添加
 * @author zhangshuai   //作者
 * @link www.zh66.club   //友链
 * @since 2019年9月29  1.1   //日期
 * @copyrigh GPL   //版权
 */

require_once "./lib/init.php";

//检测是否有数据提交
if(empty($_POST))
{
    //展示前台页面
    require './manage-user.php';
    exit();
}  

//检测用户名是否为空
$truename=trim($_POST['truename']);
$username=trim($_POST['username']);
$usertel=trim($_POST['usertel']);
$password=trim($_POST['password']);
$new_password=trim($_POST['new_password']);
if(empty($username))
{
    echo '用户名不能为空';
    exit();
}


//链接数据库
$link= mConn();
//$link=mysqli_connect('localhost', 'root','', 'zhangshuai');
//查看是否里链接成功
//var_dump($link);
//设置MySQL字符集
//mysqli_query($link, 'set names utf8');
//执行查询语句
$sql="select count(*) from user where name='$username'";
//执行sql语句
$res=  mysqli_query($link, $sql);

//判断SQL语句是否执行成功
if(!$res)
{
    echo mysqli_error($link);
    exit();
}

//检测栏目是否已经存在
//获取查询出的内容 mysqli_fetho_assoc，row,array
$count= mysqli_fetch_row($res)[0];
if($count>=1)
{
    echo '该用户名已经存在，请重新输入！';
    exit();
}

if ($password!=$new_password){
	echo "密码不一致,请重新输出！";
	header('refresh:2; url=manage-user.php');
	exit();
}

//执行都成功了，下一步就是添加栏目内容到数据库表中了
//添加栏目
$sql="insert into user(nick,name,cal,password) values ('$truename','$username','$usertel','$password')";
$res=  mysqli_query($link, $sql);

//判断SQL语句是否执行成功
if(!$res)
{
    echo mysqli_error($link);
}  else {
//    echo '栏目添加成功！';
     header('location:manage-user.php');
}