<?php require_once "./public/session.php" ?>
<?php
header("Content-type:text/html;charset=utf-8");  //设置字符集防止乱码

/**
 * catedit.php  //用户编辑页面
 * @author zhangshuai   //作者
 * @link www.zh66.club   //友链
 * @since 2019年10月29  1.1   //日期
 * @copyright GPL   //版权
 */

require_once "./lib/init.php";

//获取地址栏上的id
$user_id=$_GET['user_id'];


//检测是否有数据提交
if(empty($_POST))
{
    //取出该行的数据，作为默认值放在前台页面上展示
    $sql="select * from user where user_id=$user_id ";
    $row= mGetRow($sql);  //这是一维数组

} 

$name=$_POST['name'];


//检测用户是否为空
if(empty($name))
{
    echo '用户名不能为空';
    exit();
}

//检测用户是否已经存在
//获取查询出的内容 mysqli_fetho_assoc，row,array
$sql="select count(*) from user where name='$name'";
$count= mGetOne($sql);
if($count>=1)
{
    echo "<script>alert('该用户名已经存在，请重新输入！'); window.location.href='manage-use.php'</script>";
    exit();
}


//执行都成功了，下一步就是修改用户内容到数据库表中了
//修改用户
$sql="update art set cat_id='$cat_id',title='$title',contents='$contents',tags='$tags',keywords='$keywords',des='$des',add_time='$add_time',pic='$pic' where art_id=$art_id";
$res= mQuery($sql);

//判断SQL语句是否执行成功
if(!$res)
{
    echo "<script>alert('用户修改失败！');window.location.href='article.php'</script>";
}  
else {
    echo "<script>alert('用户修改成功！');window.location.href='article.php'</script>";
}