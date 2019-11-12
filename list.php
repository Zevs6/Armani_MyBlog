<?php
	require_once "./admin/lib/init.php";

	$sql="select catname,cat_id from cat";
	$cats=mGetAll($sql);
	
	

    //判断地址栏是否有cat_id
    if(isset($_GET['cat_id'])){
      $where ="and cat_id=$_GET[cat_id]";
    }else{
      $where ='';
    }
	echo $where;

	//分页代码
	$sql="select count(*) from art where true ".$where;  //获取总的文章数
	$num=mGetOne($sql);  //总的文章数
	$curr=isset($_GET['page'])?$_GET['page']:1;  //当前页码数
	$cnt=8;  //每页显示条数
	$page=getPage($num,$curr,$cnt);

	//上一页，下一页
	$prepage=($curr<>1)?$curr-1:$curr;
	$nextpage=($curr<>ceil($num/$cnt))?$curr+1:$curr;

	$sql = "select art_id,pic,title,des,tags,add_time,pv from art where true ".$where." order by add_time desc LIMIT ".($curr-1)*$cnt.",".$cnt;
	$data=mGetAll($sql);
 ?>
<!doctype html>
<html>

	<head>
		<meta charset="utf-8">
		<title>学无止境_张帅个人博客 - 一个站在web前后端设计之路的小萌新原创个人博客网站 - 关注web前端技术分享与生活的原创个人网站</title>
		<?php require_once "./public/head.php"; ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/base.css" rel="stylesheet">
		<link href="css/index.css" rel="stylesheet">
		<link href="css/m.css" rel="stylesheet">

		<script>
			window.onload = function() {
				var oH2 = document.getElementsByTagName("h2")[0];
				var oUl = document.getElementsByTagName("ul")[0];
				oH2.onclick = function() {
					var style = oUl.style;
					style.display = style.display == "block" ? "none" : "block";
					oH2.className = style.display == "block" ? "open" : ""
				}
			}
		</script>
	</head>

	<body>
		<?php require_once "./public/nav.php"; ?>
		<article>
			<h1 class="t_nav"><span>不要轻易放弃。学习成长的路上，我们长路漫漫，只因学无止境。 </span><a href="index.php" class="n1">网站首页</a><a href="#" class="n2">学无止境</a></h1>
			<div class="mt20"></div>
			<?php require_once "./public/content.php" ?>
			<div class="pagelist">
					<?php if ($curr==1) {?>
					<a  href="javascript:" class="disabled" >&nbsp;<b>首页</b> </a>&nbsp;&nbsp;
					<a href="javascript:" class="disabled">上一页</a>&nbsp;
					<?php }else { ?>
					<a  href="list.php?<?php echo $page[1] ?>" >&nbsp;<b>首页</b> </a>&nbsp;&nbsp;
					<a href="list.php?<?php echo $page[$prepage] ?>">上一页</a>&nbsp;
					<?php } ?>
					<?php foreach($page as $k=>$v) { ?>
						<?php if ($k==$curr) {?>
							<a href="javascript:" class="active"><?php echo $k ?></a>&nbsp;
						<?php }else{?>
							<a href="list.php?<?php echo $v ?>" ><?php echo $k ?></a>&nbsp;
						<?php }?>
					<?php } ?>

					<?php if ($curr==ceil($num/$cnt)) {?>
						<a href="javascript:"  class="disabled">下一页</a>&nbsp;
						<a href="javascript:"  class="disabled"><b>末页</b></a>
					<?php }else { ?>
						<a href="list.php?<?php echo $page[$nextpage] ?>">下一页</a>&nbsp;
						<a href="list.php?<?php echo $page[ceil($num/$cnt)] ?>"><b>末页</b></a>
					<?php } ?>
			</div>
			</div>
			
			<?php require_once "./public/sidebar.php" ?>
			
		</article>
		<?php require_once "./public/footer.php"; ?>
		<?php require_once "./public/scrollTop.php"; ?>
		<script src="js/nav.js"></script>
	</body>

</html>