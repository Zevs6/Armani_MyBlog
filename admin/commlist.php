<?php require_once "./public/session.php" ?>
<?php
header("Content-type:text/html;charset=utf-8");  //设置字符集防止乱码

/**
 * catlist.php  //评论展示页面
 * @author zhangshuai   //作者
 * @link www.zh66.club   //友链
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


$sql='select comment_id,art.art_id,comm,time,author,title from comment,art where comment.art_id=art.art_id order by comment_id desc LIMIT '.($curr-1)*$cnt.",".$cnt;

$comm=mGetAll($sql);





?>