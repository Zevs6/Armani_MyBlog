<?php require_once "./public/session.php" ?>
<?php
header("Content-type:text/html;charset=utf-8");  //设置字符集防止乱码

/**
 * catlist.php  //登录记录展示页面
 * @author zhangshuai   //作者
 * @link www.zh66.club   //登录记录
 * @since 2019年11月03  1.1   //日期
 * @copyright GPL   //版权
 */

 require_once "./lib/init.php";

//分页代码
$sql="select count(*) from comment";  //获取总的文章数
$num=mGetOne($sql);  //总的文章数
$curr=isset($_GET['page'])?$_GET['page']:1;  //当前页码数
$cnt=6;  //每页显示条数
$page=getPage($num,$curr,$cnt);


//把数据从数据库中取出
$sql='select * from log order by log_id desc LIMIT '.($curr-1)*$cnt.",".$cnt;

$data=mGetAll($sql);


?>