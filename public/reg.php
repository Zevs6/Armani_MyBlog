<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>登录</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/UI.js"></script>
	<style type="text/css">
		body{background: url(../images/guangying_xiantiao-005.jpg);}
		form{background-color: rgba(0, 0, 0, 0.4);width: 600px;height: 475px;margin: 0 auto;}
		.title{text-align: center;font-size: 32px;color: #666; margin-top: 240px;padding-top:20px;}
		.form{margin: 30px auto; width: 360px;}
		.form .input-group{margin: 20px 0px;}
		.btn-block {width: 360px;margin: 30px auto;}
	</style>
</head>
<body>
	<form  action="../admin/reg.php" method="post">
		<div class="title">注册博客</div>
		<div class="form">
			<div class="input-group input-group-sm">
			<span class="input-group-addon">用户名</span>
			<input type="text" class="form-control" name="username" placeholder="请输入用户名">
			</div>

			<div class="input-group input-group-sm">
			<span class="input-group-addon">姓名</span>
			<input type="text" class="form-control" name="nick" placeholder="请输入姓名">
			</div>

			<div class="input-group input-group-sm">
			<span class="input-group-addon">邮箱</span>
			<input type="text" class="form-control" name="email" placeholder="请输入邮箱">
			</div>

			<div class="input-group input-group-sm">
			<span class="input-group-addon">手机号</span>
			<input type="text" class="form-control" name="cal" placeholder="请输入手机号">
			</div>
		
			<div class="input-group input-group-sm">
			<span class="input-group-addon">密&nbsp;&nbsp;&nbsp;&nbsp;码</span>
			<input type="password" class="form-control" name="pwd" placeholder="请输入密码">
			</div>
			
			<div class="input-group input-group-sm">
			<span class="input-group-addon">确认密码</span>
			<input type="password" class="form-control" name="spwd" placeholder="请再次输入密码">
			</div>
		</div>
		<button type="submit" class="btn btn-primary btn-sm btn-block" onclick="reg()">注册</button>
	</form>
</body>
</html>
<script type="text/javascript">
	// 登录
	function reg(){
		var username = $.trim($('input[name="username"]').val());
		var pwd = $.trim($('input[name="pwd"]').val());
		var spwd = $.trim($('input[name="spwd"]').val());
		if(username == ''){
			UI.alert({msg:'用户名不能为空',icon:'error'});
			return;
		}
		
		if(pwd == ''){
			UI.alert({msg:'密码不能为空',icon:'error'});
			return;
		}

		if(spwd!=pwd){
			UI.alert({msg:'两次输入密码不一致，请重新输入！',icon:'error'});
			return;
		}

		// 提交验证
		$.post('/service/dologin.php',{username:username,pwd:pwd},function(res){
			if(res.code>0){
				UI.alert({msg:res.msg,icon:'error'});
			}else{
				UI.alert({msg:res.msg,icon:'ok'});
				setTimeout(function(){parent.window.location.reload();},1000);
			}
		},'json');

	}
</script>