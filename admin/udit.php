<?php require_once "./public/session.php" ?>
<?php
header("Content-type:text/html;charset=utf-8");  //设置字符集防止乱码

/**
 * catdel.php  //友链审核页面
 * @author zhangshuai   //作者
 * @link www.zh66.club   //友链
 * @since 2019年11月05 1.1   //日期
 * @copyright GPL   //版权
 */
require_once "./lib/init.php";


//获取地址栏上的id
$link_id=$_GET['link_id'];


//判断udit是为0还是1
$judge=mGetOne("select udit from link where link_id=$link_id ");
if($judge==0){
    $judge=1;
}
else{
    $judge=0;
}

//执行审核操作
$sql="update link set udit=$judge where link_id=$link_id";
$res= mQuery($sql);


if(!$res)
{
    echo "<script>alert('友链审核失败！');window.location.href='flink.php'</script>";

}  else {
    
    if($judge==1){
         echo "<script>alert('友链审核成功！');window.location.href='flink.php'</script>";
    }else{
        echo "<script>alert('友链禁用成功！');window.location.href='flink.php'</script>";
    }
}




