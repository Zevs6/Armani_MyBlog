<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>登录_张帅个人博客 - 一个站在web前后端设计之路的小萌新原创个人博客网站 - 关注web前端技术分享与生活的原创个人网站</title>
		<?php require_once "./public/head.php"; ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/base.css" rel="stylesheet">
		<link href="css/index.css" rel="stylesheet">
		<link href="css/m.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="font/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="font/iconic/css/material-design-iconic-font.min.css">
		<link rel="stylesheet" type="text/css" href="css/util.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		
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
			<h1 class="t_nav"><span>像“草根”一样，紧贴着地面，低调的存在，冬去春来，枯荣无恙。</span><a href="index.php" class="n1">网站首页</a><a href="login.php" class="n2">登录</a></h1>
			<div class="ab_box">
				<div class="leftbox">
					<div class="newsview">
						<form class="login100-form validate-form" action="./admin/login_check.php" method="post">
							<span class="login100-form-title p-b-49">登录</span>
							<div class="wrap-input100 validate-input m-b-23" data-validate="请输入用户名">
								<span class="label-input100">用户名</span>
								<input class="input100" type="text" name="name" placeholder="请输入用户名" autocomplete="off">
								<span class="focus-input100" data-symbol="&#xf206;"></span>
							</div>

							<div class="wrap-input100 validate-input" data-validate="请输入密码">
								<span class="label-input100">密码</span>
								<input class="input100" type="password" name="password" placeholder="请输入密码">
								<span class="focus-input100" data-symbol="&#xf190;"></span>
							</div>

							<div class="text-right p-t-8 p-b-31">
								<a href="" onclick=window.alert("此站未开启密码找回功能，请重新注册账号");>忘记密码？</a>
							</div>

							<div class="container-login100-form-btn">
								<div class="wrap-login100-form-btn">
									<div class="login100-form-bgbtn"></div>
									<button class="login100-form-btn">登 录</button>
								</div>
							</div>
							<div class="flex-col-c p-t-25">
								<a href="./public/reg.php"; class="txt2"; id="UI_alert_sm" >立即注册</a>
							</div>
							<div class="txt1 text-center p-t-54 p-b-20"><span>第三方登录</span></div>

							<div class="flex-c-m">
								<a href="#" class="login100-social-item bg1"><i class="fa fa-wechat"></i></a>

								<a href="#" class="login100-social-item bg2"><i class="fa fa-qq"></i></a>

								<a href="#" class="login100-social-item bg3"><i class="fa fa-weibo"></i></a>
							</div>

						</form>
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
						<ul><img src="images/wx.jpg"></ul>
					</div>
				</div>
			</div>
		</article>

		<?php require_once "./public/footer.php"; ?>
		
		<script src="js/nav.js"></script>
		<script src="js/jquery-2.1.1.min.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>
