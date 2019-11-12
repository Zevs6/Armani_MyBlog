<?php require_once "./public/session.php" ?>
<?php
header("Content-type:text/html;charset=utf-8");  //设置字符集防止乱码

/**
 * catlist.php  //栏目展示页面
 * @author zhangshuai   //作者
 * @link www.zh66.club   //友链
 * @since 2019年9月29  1.1   //日期
 * @copyright GPL   //版权
 */

 require_once "./lib/init.php";

//链接数据库
//$link=  mysqli_connect('localhost','root','','zhangshuai');
//mysqli_query($link, 'set names utf8');


//把数据从数据库中取出
$sql='select * from cat';
//$res=  mysqli_query($link, $sql);
//var_dump($res);
$data=mGetAll($sql);
//while($row=mysqli_fetch_assoc($res))
//{
 //   $data[]=$row;  //二维数组
//}
//print_r($data);

?>