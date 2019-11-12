<?php 
	require_once "./admin/lib/init.php" ;

	//查询所有的友链
	$sql="select * from link where udit=1";
	$comms=mGetAll($sql);

	

	//友链提交
	if (!empty($_GET)){
		$link_name=$_GET['link_name'];
		$link_web=$_GET['link_web'];
		$link_img=$_GET['link_img'];
		$link_des=$_GET['link_des'];
		//判断名称不能为空
		if($link_name==""){
			echo "<script>alert('名称不能为空！');window.location.href='link.php'</script>";
			exit;
		}
		$sql="insert into link (link_name,link_web,link_img,link_des) values ('$link_name','$link_web','$link_img','$link_des')";
		$res=mQuery($sql);
		//判断友链是否提交成功
		if($res){
			//跳转到上个页面
			$ref=$_SERVER['HTTP_REFERER'];
			echo "<script>alert('友链提交成功，等待管理员审核！');window.location.href='link.php'</script>";
		}
	}

?>
<!doctype html>
<html>

	<head>
		<meta charset="utf-8">
		<title>友人恋_张帅个人博客 - 一个站在web前后端设计之路的小萌新个人博客网站</title>
		<?php require_once "./public/head.php"; ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/base.css" rel="stylesheet">
		<link href="css/index.css" rel="stylesheet">
		<link href="css/m.css" rel="stylesheet">
		<link href="css/link.css" rel="stylesheet">
		<script src="js/jquery-2.1.1.min.js"></script>

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
			<h1 class="t_nav"><span>您现在的位置是：首页 > 友人恋 </span><a href="index.php" class="n1">网站首页</a><a href="#" class="n2">友人恋</a></h1>
			<div class="infos">
				
				<div class="news_pl">
		
					<ul>
						<div class="gbko" style="padding: 70px;"> 
															<div class="post-content page-content">
													<h3>友链信息</h3><p>名字：张帅个人博客<br>头像：<a href="https://cdn.jsdelivr.net/gh/Zevs6/blogimg2/img/1572944814982571.jpg" style="color: red;">戳这里</a><br>简介：开心快乐每一天！</p><h3>换链说明</h3><p>友情链接交换原则：</p><p>经常互访<br>坚持更文<br>频繁交流<br>内容合法</p><p>当然，有些我不感兴趣的博客内容我可能会拒链。<br>不过如果我们是比较熟悉的朋友，或者是我认可的大佬，就请忽略这些要求吧～</p><p>正常交换的友链都是在左邻右舍里的，单向收藏一些大佬的链接会放在非佬即神里～<br>找不到头像的小伙伴的头像我随意设置，请在留言板找回自己的头！</p><h3>个人天地</h3><div class="links-box container-fluid"><div class="row">
									<div class="col-lg-2 col-6 col-md-3 links-container">
												<a href="http://blog.zh66.club" target="_blank" class="links-link" >
												<div class="links-item">
													<div class="links-img" style="background:url('https://cdn.jsdelivr.net/gh/Zevs6/blogimg2/img/1568801456553896.jpg');width: 100%;padding-top: 100%;background-repeat: no-repeat;background-size: cover;"></div>
													<div class="links-title">
													<h4>妙笔生花</h4>
													</div>
												</div>
												</a>
												</div>
									<div class="col-lg-2 col-6 col-md-3 links-container">
												<a href="http://www.zh66.club" target="_blank" class="links-link">
												<div class="links-item">
													<div class="links-img" style="background:url('https://cdn.jsdelivr.net/gh/Zevs6/CDN@3.0/img/avatar.jpg');width: 100%;padding-top: 100%;background-repeat: no-repeat;background-size: cover;"></div>
													<div class="links-title">
													<h4>皮皮家园</h4>
													</div>
												</div>
												</a>
												</div>
									<div class="col-lg-2 col-6 col-md-3 links-container">
												<a href="http://sakura.zh66.club/" target="_blank" class="links-link">
												<div class="links-item">
													<div class="links-img" style="background:url('http://sakura.zh66.club/wp-content/uploads/2019/10/1353750205.jpg');width: 100%;padding-top: 100%;background-repeat: no-repeat;background-size: cover;"></div>
													<div class="links-title">
													<h4>樱花の恋</h4>
													</div>
												</div>
												</a>
												</div>
									<div class="col-lg-2 col-6 col-md-3 links-container">
												<a href="http://www.zhsh666.xyz/" target="_blank" class="links-link">
												<div class="links-item">
													<div class="links-img" style="background:url('http://www.zhsh666.xyz/img/avatar.png');width: 100%;padding-top: 100%;background-repeat: no-repeat;background-size: cover;"></div>
													<div class="links-title">
													<h4>皮皮猪</h4>
													</div>
												</div>
												</a>
												</div>
									<div class="col-lg-2 col-6 col-md-3 links-container">
												<a href="http://www.zhsh666.xyz/demo/myseo/" target="_blank" class="links-link">
												<div class="links-item">
													<div class="links-img" style="background:url('https://s2.ax1x.com/2019/07/09/ZyuoQJ.gif');width: 100%;padding-top: 100%;background-repeat: no-repeat;background-size: cover;"></div>
													<div class="links-title">
													<h4>帅导航</h4>
													</div>
												</div>
												</a>
												</div>
									<div class="col-lg-2 col-6 col-md-3 links-container">
												<a href="http://z.zhsh666.xyz/" target="_blank" class="links-link">
												<div class="links-item">
													<div class="links-img" style="background:url('https://z.zhsh666.xyz/imgs/avatar.jpg');width: 100%;padding-top: 100%;background-repeat: no-repeat;background-size: cover;"></div>
													<div class="links-title">
													<h4>喵绪～</h4>
													</div>
												</div>
												</a>
												</div>
									<div class="col-lg-2 col-6 col-md-3 links-container">
												<a href="http://v.zh66.club/" target="_blank" class="links-link">
												<div class="links-item">
													<div class="links-img" style="background:url('http://v.zh66.club/images/logo.png');width: 100%;padding-top: 100%;background-repeat: no-repeat;background-size: cover;"></div>
													<div class="links-title">
													<h4>游戏魔盒</h4>
													</div>
												</div>
												</a>
												</div>
									<div class="col-lg-2 col-6 col-md-3 links-container">
												<a href="http://zhsh666.xyz/demo/personblog/home" target="_blank" class="links-link">
												<div class="links-item">
													<div class="links-img" style="background:url('https://cdn.jsdelivr.net/gh/Zevs6/blogimg2/img/36-1610210P620.jpg');width: 100%;padding-top: 100%;background-repeat: no-repeat;background-size: cover;"></div>
													<div class="links-title">
													<h4>课程设计</h4>
													</div>
												</div>
												</a>
												</div>
									

									</div></div><h3>左邻右舍</h3><div class="links-box container-fluid"><div class="row">

									<?php foreach($comms as $c) { ?>
									<div class="col-lg-2 col-6 col-md-3 links-container" title="<?php echo $c['link_des'] ?>">
												<a href="<?php echo $c['link_web'] ?>" target="_blank" class="links-link" rel="nofollow">
												<div class="links-item">
													<div class="links-img" style="background:url('<?php echo $c['link_img'] ?>');width: 100%;padding-top: 100%;background-repeat: no-repeat;background-size: cover;"></div>
													<div class="links-title">
													<h4><?php echo $c['link_name'] ?></h4>
													</div>
												</div>
												</a>
												</div>
									<?php } ?>
									

									</div></div>		</div>
							<!-- 友链提交 -->
						<style type="text/css">
							/*messages*/
							.messages{padding:40px 110px; margin-top: 30px;box-shadow: 1px 1px 6px #756c6c;}
							.messages input,.messages select,.messages textarea{margin:0;padding:0; background:none; border:0; font-family:"Microsoft Yahei";}
							.messlist {height:30px;margin-bottom:20px;}
							.messlist label{float:left;width:100px; height:40px; font-size:16px; line-height:40px; text-align:right;padding-right:10px;}
							.messlist input{float:left;width:300px;height:38px;padding-left:5px;border:#ccc 1px solid;}
							.messlist.textareas{ height:auto;}
							.messlist.yzms input{width:100px;}
							.messlist.yzms .yzmimg{ float:left;margin-left:10px;}
							.messsub{padding:0px 0 0 110px;}
							.messsub input{width:100px; height:35px; background:#ddd; font-size:14px; font-weight:bold; cursor:pointer;margin-right:5px}
							.messsub input:hover{ background:#f60;color:#fff;}

						</style>
						<p style="font-size: 24px; text-align:center; ">友链提交申请<span style="font-size: 16px; color: red;">(*管理员审核后方可展示)</span></p>
						<form action="" method="get" class="messages">
							
							<div class="messlist">
							<label>名称</label>
							<input type="text" placeholder="请输入网站名称" name="link_name"/>
							<div class="clears"></div>
							</div>
							<div class="messlist">
							<label>网址</label>
							<input type="text" placeholder="请输入您的网站地址" name="link_web" />
							<div class="clears"></div>
							</div>
							<div class="messlist">
							<label>头像</label>
							<input type="text" placeholder="请输入您的头像地址" name="link_img" />
							<div class="clears"></div>
							</div>
							<div class="messlist">
							<label>描述</label>
							<input type="text" placeholder="请输入您的网站描述" name="link_des">
							<div class="clears"></div>
							</div>
							
							<div class="messsub">
							<input type="submit" value="提交" style="background:#00a3eb;color:#fff;" />
					
							</div>
						</form>    
						</div>
					</ul>
				</div>
			</div>
			<?php require_once "./public/sidebar.php" ?>
		</article>
		<?php require_once "./public/footer.php"; ?>
		<?php require_once "./public/scrollTop.php"; ?>
		<script src="js/nav.js"></script>
	</body>

</html>