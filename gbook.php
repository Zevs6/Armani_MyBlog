<!doctype html>
<html>

	<head>
		<meta charset="utf-8">
		<title>留言_张帅个人博客 - 一个站在web前后端设计之路的小萌新原创个人博客网站 - 关注web前端技术分享与生活的原创个人网站</title>
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
			<h1 class="t_nav"><span>像“草根”一样，紧贴着地面，低调的存在，冬去春来，枯荣无恙。</span><a href="index.php" class="n1">网站首页</a><a href="gbook.php" class="n2">留言</a></h1>
			<div class="ab_box">
				<div class="leftbox">
					<div class="newsview">
						<div class="news_infos"> 此处安装插件 </div>
					</div>
				</div>
				<div class="rightbox">
					<div class="aboutme">
						<h2 class="hometitle">关于我</h2>
						<div class="avatar"> <img src="images/avatar.png"> </div>
						<div class="ab_con">
							<p>网名：Zevs | 张帅</p>
							<p>职业：大二在校学生 </p>
							<p>QQ：2602138376</p>
							<p>邮箱：2602138376@qq.com</p>
						</div>
					</div>
					<div class="weixin">
						<h2 class="hometitle">微信关注</h2>
						<ul>
							<img src="images/wx.jpg">
						</ul>
					</div>
				</div>
			</div>
		</article>
		<?php require_once "./public/footer.php"; ?>
		<?php require_once "./public/scrollTop.php"; ?>
		<script src="js/nav.js"></script>
	</body>

</html>