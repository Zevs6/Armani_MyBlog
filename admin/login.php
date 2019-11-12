<!doctype html>
<html>

	<head>
		<meta charset="utf-8">
		<title>张帅个人博客后台登录</title>
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet" />
		<link href="css/login.css" rel="stylesheet" />
	</head>

	<style>

	</style>

	<body id="body">
		<nav class="bg-canvas blur"><iframe name="htm" src="./a5.html"></iframe></nav>
		<section class="cont">
			<section>
				<nav class="cont_left">
					<p><h1>博客后台管理系统登陆</h1></p>
				</nav>
				<form class="cont_right" action="login_check.php" method="post">
					<h2 align="center">平台登陆</h2>
					<div class="form-group">
						<p><i class="fa fa-user"></i><input type="text" class="form-control" id="inputEmail3" name="name" placeholder="请输入用户名"></p>
						<p><i class="fa fa-key"></i>
							<input type="password" class="form-control" id="exampleInputPassword3" name="password" placeholder="请输入密码">
							<input type="text" class="form-control" id="exampleInputPassword3" name="pwd" placeholder="请输入密码" style="display: none;">
							<a class="eye"><i class="fa fa-eye-slash"></i></a>
						</p>
					</div>
					<button type="submit" class="btn btn-primary btn-lg btn-block" >登陆</button>
				</form>
			</section>
		</section>
	</body>

	<script src="js/jquery-2.1.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		$(function() {

			$("#body").height($(window).height());

		})

		$(".eye").mouseover(function() {

			$("input[name=pwd]").val($("input[name=password]").val());

			$("input[name=password]").hide();

			$("input[name=pwd]").show().focus();

			$(".eye i").removeClass("fa-eye-slash");

			$(".eye i").addClass("fa-eye");

		});

		$(".eye").mouseout(function() {

			$("input[name=password]").val($("input[name=pwd]").val());

			$("input[name=password]").show().focus();

			$("input[name=pwd]").hide();

			$(".eye i").removeClass("fa-eye");

			$(".eye i").addClass("fa-eye-slash");

		})
	</script>
</html>


