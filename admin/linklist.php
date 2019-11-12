<?php require_once "./public/session.php" ?>
<?php
header("Content-type:text/html;charset=utf-8");  //设置字符集防止乱码

/**
 * catlist.php  //友链展示页面
 * @author zhangshuai   //作者
 * @link www.zh66.club   //友链
 * @since 2019年11月03  1.1   //日期
 * @copyright GPL   //版权
 */

 require_once "./lib/init.php";




//把数据从数据库中取出
$sql='select * from link order by link_id desc';

$data=mGetAll($sql);


?>