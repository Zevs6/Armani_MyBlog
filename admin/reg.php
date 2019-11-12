<?php
header("Content-type:text/html;charset=utf-8");  //设置字符集防止乱码

/**
 * reg.php  //用户注册
 * @author zhangshuai   //作者
 * @link www.zh66.club   //友链
 * @since 2019年11月04  1.1   //日期
 * @copyright GPL   //版权
 */
require_once "./lib/init.php";  

//检测友链是否为空
$name=trim($_POST['username']);
$nick=trim($_POST['nick']);
$email=trim($_POST['email']);
$cal=trim($_POST['cal']);
$password=trim($_POST['spwd']);

if(true){
    echo "<script>alert('博主已经关闭注册功能！');window.location.href='../public/reg.php'</script>";
    exit;
}

if(empty($name)){
    echo "<script>alert('用户名不能为空！');window.location.href='../public/reg.php'</script>";
    exit;
}

if(empty($nick)){
    echo "<script>alert('姓名不能为空！');window.location.href='../public/reg.php'</script>";
    exit;
}

if(empty($pwd) or empty($spwd) ){
    echo "<script>alert('密码不能为空！');window.location.href='../public/reg.php'</script>";
    exit;
}

if($pwd!=$spwd ){
    echo "<script>alert('密码输入不一致！');window.location.href='../public/reg.php'</script>";
    exit;
}

//都符合条件则可以添加用户信息

//添加用户
$sql="insert into user (name,nick,email,cal,password) values ('$name','$nick','$email','$cal','$password')";
$res= mQuery($sql);


//判断SQL语句是否执行成功
if(!$res)
{
    echo "<script>alert('用户注册失败！');window.location.href='../public/reg.php'</script>";
}  else {
    echo "<script>alert('用户注册成功！');window.location.href='login.php'</script>";
}