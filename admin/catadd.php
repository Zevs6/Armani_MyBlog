<?php require_once "./public/session.php" ?>
<?php
header("Content-type:text/html;charset=utf-8");  //设置字符集防止乱码

/**
 * catadd.php  //栏目添加
 * @author zhangshuai   //作者
 * @link www.zh66.club   //友链
 * @since 2019年9月29  1.1   //日期
 * @copyright GPL   //版权
 */
require_once "./lib/init.php";

//检测是否有数据提交
if(empty($_POST))
{
    //展示前台页面
    require './category.php';
    exit();
}  

//检测栏目是否为空
$catname=trim($_POST['catname']);
$alias=trim($_POST['alias']);
$keywords=trim($_POST['keywords']);
$describe=trim($_POST['describe']);
if(empty($catname))
{
    echo "<script>alert('栏目名不能为空！'); window.location.href='category.php'</script>";
    exit();
}


//链接数据库
//$link=mysqli_connect('localhost', 'root','', 'zhangshuai');
//查看是否里链接成功
//var_dump($link);

//设置MySQL字符集
//mysqli_query($link, 'set names utf8');
//执行查询语句
$sql="select count(*) from cat where catname='$catname'";
//执行sql语句
$res= mQuery($sql);

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
    echo "<script>alert('该栏目名已经存在，请重新输入！'); window.location.href='category.php'</script>";
    exit();
}


//执行都成功了，下一步就是添加栏目内容到数据库表中了

//添加栏目
$sql="insert into cat(catname,alias,keywords,des) values ('$catname','$alias','$keywords','$describe')";
$res= mQuery($sql);


//判断SQL语句是否执行成功
if(!$res)
{
    echo "<script>alert('栏目添加失败！');window.location.href='category.php'</script>";
}  else {
    echo "<script>alert('栏目添加成功！');window.location.href='category.php'</script>";
    // header('location:category.php');
}