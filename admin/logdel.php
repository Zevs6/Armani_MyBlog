<?php require_once "./public/session.php" ?>
<?php
header("Content-type:text/html;charset=utf-8");  //设置字符集防止乱码

/**
 * catdel.php  //登录记录删除页面
 * @author zhangshuai   //作者
 * @link www.zh66.club   //登录记录
 * @since 2019年11月03  1.1   //日期
 * @copyright GPL   //版权
 */
require_once "./lib/init.php";


//获取地址栏上的id
$log_id=$_GET['log_id'];



//检测登录记录id是否合法
if(!is_numeric($log_id))
{
    echo '登录记录id不合法！';
    exit;
}

//检测登录记录id是否存在
$sql="select count(*) from log where log_id=$log_id ";

$count=mGetOne($sql);
if($count<=0)
{
    echo '登录记录不存在';
    exit;
}



//执行删除操作
$sql="delete from log where log_id=$log_id";
$res= mQuery($sql);


if(!$res)
{
    echo "<script>alert('登录记录删除失败！');window.location.href='loginlogphp'</script>";

}  else {
    echo "<script>alert('登录记录删除成功！');window.location.href='loginlog.php'</script>";
}




