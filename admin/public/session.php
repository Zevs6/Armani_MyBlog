<!--判断用户是否登录-->
<?php 
if( !isset($_COOKIE['name'])) {    
	//如果没有登录,跳转到登录页面    
	header('Location:login.php');    
	exit(); 
}
?>