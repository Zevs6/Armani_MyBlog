<?php require_once "./public/session.php" ?>
<?php
header("Content-type:text/html;charset=utf-8");  //设置字符集防止乱码

/**
 * catedit.php  //友链编辑页面
 * @author zhangshuai   //作者
 * @link www.zh66.club   //友链
 * @since 2019年9月29  1.1   //日期
 * @copyright GPL   //版权
 */

require_once "./lib/init.php";

//获取地址栏上的id
$link_id=$_GET['link_id'];

//链接数据库
//$link= mConn();


//检测是否有数据提交
if(empty($_POST))
{
    //取出该行的数据，作为默认值放在前台页面上展示
    $sql="select * from link where link_id=$link_id";
    $row= mGetRow($sql);  //这是一维数组


    //展示前台页面
    require './update-flink.php';
    exit();
} 

$name=trim($_POST['name']);
$url=trim($_POST['url']);
$imgurl=trim($_POST['imgurl']);
$describe=trim($_POST['describe']);






//修改友链
$sql="update link set link_name='$name',link_web='$url',link_img='$imgurl',link_des='$describe' where link_id=$link_id";
$res= mQuery($sql);

//判断SQL语句是否执行成功
if(!$res)
{
    echo "<script>alert('友链修改失败！');window.location.href='flink.php'</script>";
}  
else {
    echo "<script>alert('友链修改成功！');window.location.href='flink.php'</script>";
}