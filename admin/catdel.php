<?php require_once "./public/session.php" ?>
<?php
header("Content-type:text/html;charset=utf-8");  //设置字符集防止乱码

/**
 * catdel.php  //栏目删除页面
 * @author zhangshuai   //作者
 * @link www.zh66.club   //友链
 * @since 2019年9月29  1.1   //日期
 * @copyright GPL   //版权
 */
require_once "./lib/init.php";


//获取地址栏上的id
$id=$_GET['cat_id'];



//检测栏目id是否合法
if(!is_numeric($id))
{
    echo '栏目id不合法！';
    exit;
}

//检测栏目id是否存在
$sql="select count(*) from cat where cat_id=$id ";

$count=mGetOne($sql);
if($count<=0)
{
    echo '栏目不存在';
    exit;
}

//检测栏目下是否有文章
$sql="select count(*) from art where cat_id=$id";

$count=mGetOne($sql);
if($count!=0)
{
    echo "<script>alert('栏目下有文章，不能删除，否则将清空栏目下所有文章！');window.location.href='category.php'</script>";
}


//执行删除操作
$sql="delete from cat where cat_id=$id";
$res= mQuery($sql);
//删除栏目时，栏目下的所有文章将全部删除;
mQuery("delete from art where cat_id=$id");

if(!$res)
{
    echo "<script>alert('栏目删除失败！');window.location.href='category.php'</script>";

}  else {
    echo "<script>alert('栏目删除成功！');window.location.href='category.php'</script>";
}




