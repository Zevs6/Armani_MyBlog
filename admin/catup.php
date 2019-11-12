<?php require_once "./public/session.php" ?>
<?php
header("Content-type:text/html;charset=utf-8");  //设置字符集防止乱码

/**
 * catedit.php  //栏目编辑页面
 * @author zhangshuai   //作者
 * @link www.zh66.club   //友链
 * @since 2019年9月29  1.1   //日期
 * @copyright GPL   //版权
 */

require_once "./lib/init.php";

//获取地址栏上的id
$id=$_GET['cat_id'];

//链接数据库
//$link= mConn();


//检测是否有数据提交
if(empty($_POST))
{
    //取出该行的数据，作为默认值放在前台页面上展示
    $sql="select * from cat where cat_id=$id ";
    $row= mGetRow($sql);  //这是一维数组
    //展示前台页面
    require './update-category.php';
    exit();
} 

$catname=trim($_POST['catname']);
$alias=$_POST['alias'];
$keywords=$_POST['keywords'];
$describe=$_POST['describe'];

//检测栏目是否为空
if(empty($catname))
{
    echo '栏目名不能为空';
    exit();
}

//检测栏目是否已经存在
//获取查询出的内容 mysqli_fetho_assoc，row,array
$sql="select count(*) from cat where catname='$catname'";
$count= mGetOne($sql);
if($count>=1)
{
    echo "<script>alert('该栏目名已经存在，请重新输入！'); window.location.href='update-category.php?cat_id=$id'</script>";
    exit();
}


//执行都成功了，下一步就是修改栏目内容到数据库表中了
//修改栏目
$sql="update cat set catname='$catname',alias='$alias',keywords='$keywords',des='$describe' where cat_id=$id";
$res= mQuery($sql);

//判断SQL语句是否执行成功
if(!$res)
{
    echo "<script>alert('栏目修改失败！');window.location.href='category.php'</script>";
}  
else {
    echo "<script>alert('栏目修改成功！');window.location.href='category.php'</script>";
}