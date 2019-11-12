<?php require_once "./public/session.php" ?>
<?php
header("Content-type:text/html;charset=utf-8");  //设置字符集防止乱码

/**
 * catadd.php  //友链添加
 * @author zhangshuai   //作者
 * @link www.zh66.club   //友链
 * @since 2019年11月04  1.1   //日期
 * @copyright GPL   //版权
 */
require_once "./lib/init.php";

//检测是否有数据提交
if(empty($_POST))
{
    //展示前台页面
    require './add-flink.php';
    exit();
}  

//检测友链是否为空
$name=trim($_POST['name']);
$url=trim($_POST['url']);
$imgurl=trim($_POST['imgurl']);
$describe=trim($_POST['describe']);



//添加友链
$sql="insert into link (link_name,link_web,link_img,link_des) values ('$name','$url','$imgurl','$describe')";
$res= mQuery($sql);


//判断SQL语句是否执行成功
if(!$res)
{
    echo "<script>alert('友链添加失败！');window.location.href='flink.php'</script>";
}  else {
    echo "<script>alert('友链添加成功！');window.location.href='flink.php'</script>";
}