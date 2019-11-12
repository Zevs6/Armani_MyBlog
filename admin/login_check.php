<?php
/**
 * 
 * 登录数据处理
 * 
 */
header("content-type:text/html;charset=utf-8");


require_once "./lib/init.php";



if(empty($_POST)){
    require_once "./login.php";
}else{
    //1-接收登录信息
    $name = trim($_POST['name']);
    $password = trim($_POST['password']);
    $sql = "select * from user where name='" . $name  . "' and password='" . $password . "'";
    $res= mGetRow($sql); 
    //判断用户名密码是否正确
    if(!$res){
        echo "<script>alert('用户名或密码错误，请重新输入！');window.location.href='login.php'</script>";
    }else{

        //登录记录log
        $ip=get_real_ip();
        $time=time();
        $browser=get_browser_name();
        $os=get_os();
        $adress=getCity($ip);
        $sql="insert into log (user_name,ip,time,browser,os,adress) values ('$name','$ip','$time','$browser','$os','$adress')";
        mQuery($sql);

        //记录用户表中的登录时间，IP，登录次数登
        $sql="update user set updated_at='$time',login_ip='$ip',login_times=login_times+1 where name='$name'";
        echo $sql;
        mQuery($sql);


        //设置cookie值
        setcookie('name' , $res['name'],time()+3600*2);
        header('Location:index.php');
    }

}

?>