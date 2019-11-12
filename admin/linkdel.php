<?php require_once "./public/session.php" ?>
<?php
header("Content-type:text/html;charset=utf-8");  //设置字符集防止乱码

/**
 * catdel.php  //友链删除页面
 * @author zhangshuai   //作者
 * @link www.zh66.club   //友链
 * @since 2019年11月03  1.1   //日期
 * @copyright GPL   //版权
 */
require_once "./lib/init.php";


//获取地址栏上的id
$id=$_GET['link_id'];



//检测友链id是否合法
if(!is_numeric($id))
{
    echo '友链id不合法！';
    exit;
}

//检测友链id是否存在
$sql="select count(*) from link where link_id=$id ";

$count=mGetOne($sql);
if($count<=0)
{
    echo '友链不存在';
    exit;
}



//执行删除操作
$sql="delete from link where link_id=$id";
$res= mQuery($sql);


if(!$res)
{
    echo "<script>alert('友链删除失败！');window.location.href='flink.php'</script>";

}  else {
    echo "<script>alert('友链删除成功！');window.location.href='flink.php'</script>";
}




