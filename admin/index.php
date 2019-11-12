<?php require_once "./public/session.php" ?>
<?php require_once "./lib/init.php"; ?>
<!doctype html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8">
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>张帅个人博客管理系统</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
		<link rel="apple-touch-icon-precomposed" href="images/icon/icon.png">
		<link rel="shortcut icon" href="images/icon/favicon.ico">
		<script src="js/jquery-2.1.4.min.js"></script>
	</head>

	<body class="user-select">
		<section class="container-fluid">
			<?php require_once "./public/head.php"?>
			<div class="row">
				<aside class="col-sm-3 col-md-2 col-lg-2 sidebar">
					<ul class="nav nav-sidebar">
						<li class="active">
							<a href="index.php">报告</a>
						</li>
					</ul>
					<ul class="nav nav-sidebar">
						<li>
							<a href="article.php">文章</a>
						</li>
						<li>
							<a href="notice.php">公告</a>
						</li>
						<li>
							<a href="comment.php">评论</a>
						</li>
						<li>
							<a data-toggle="tooltip" data-placement="bottom" title="网站暂无留言功能">留言</a>
						</li>
					</ul>
					<ul class="nav nav-sidebar">
						<li>
							<a href="category.php">栏目</a>
						</li>
						<li>
							<a class="dropdown-toggle" id="otherMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">其他</a>
							<ul class="dropdown-menu" aria-labelledby="otherMenu">
								<li>
									<a href="flink.php">友情链接</a>
								</li>
								<li>
									<a data-toggle="modal" data-target="#areDeveloping">访问记录</a>
								</li>
							</ul>
						</li>
					</ul>
					<ul class="nav nav-sidebar">
						<li>
							<a class="dropdown-toggle" id="userMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">用户</a>
							<ul class="dropdown-menu" aria-labelledby="userMenu">
								<li>
									<a data-toggle="modal" data-target="#areDeveloping">管理用户组</a>
								</li>
								<li>
									<a href="manage-user.php">管理用户</a>
								</li>
								<li role="separator" class="divider"></li>
								<li>
									<a href="loginlog.php">管理登录日志</a>
								</li>
							</ul>
						</li>
						<li>
							<a class="dropdown-toggle" id="settingMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">设置</a>
							<ul class="dropdown-menu" aria-labelledby="settingMenu">
								<li>
									<a href="setting.php">基本设置</a>
								</li>
								<li>
									<a href="readset.php">阅读设置</a>
								</li>
								<li role="separator" class="divider"></li>
								<li>
									<a data-toggle="modal" data-target="#areDeveloping">安全配置</a>
								</li>
								<li role="separator" class="divider"></li>
								<li class="disabled">
									<a>扩展菜单</a>
								</li>
							</ul>
						</li>
					</ul>
				</aside>
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 main" id="main">
					<h1 class="page-header">信息总览</h1>
					<div class="row placeholders">
						<div class="col-xs-6 col-sm-3 placeholder">
							<h4>文章</h4>
							<span class="text-muted"><?php echo mGetOne("select count(*)  from art"); ?></span> </div>
						<div class="col-xs-6 col-sm-3 placeholder">
							<h4>评论</h4>
							<span class="text-muted"><?php echo mGetOne("select count(*)  from comment"); ?></span> </div>
						<div class="col-xs-6 col-sm-3 placeholder">
							<h4>友链</h4>
							<span class="text-muted"><?php echo mGetOne("select count(*) from link "); ?></span> </div>
						<div class="col-xs-6 col-sm-3 placeholder">
							<h4>访问量</h4>
							<span class="text-muted"><?php echo mGetOne("select count(*) from log "); ?></span> </div>
					</div>
					<h1 class="page-header">状态</h1>
					<div class="table-responsive">
						<table class="table table-striped table-hover">
							<tbody>
								<tr>
									<td>登录者: <span><?php echo $_COOKIE['name']; ?></span>，这是您第 <span><?php echo mGetOne("select login_times from user  where name='$_COOKIE[name]'"); ?></span> 次登录</td>
								</tr>
								<tr>
									<td>上次登录时间: <?php echo date("Y-m-d H:i:s",mGetOne("select updated_at from user  where name='$_COOKIE[name]'")) ?> , 上次登录IP:<?php echo mGetOne("select login_ip from user  where name='$_COOKIE[name]'") ?></td>
								</tr>
							</tbody>
						</table>
					</div>
					<h1 class="page-header">系统信息</h1>
					<div class="table-responsive">
						<table class="table table-striped table-hover">
							<thead>
								<tr> </tr>
							</thead>
							<tbody>
								<tr>
									<td>管理员个数:</td>
									<td>3 人</td>
									<td>服务器软件:</td>
									<td><?php echo $_SERVER['SERVER_SOFTWARE'] ?></td>
								</tr>
								<tr>
									<td>浏览器:</td>
									<td><?php echo get_browser_name() ?></td>
									<td>PHP版本:</td>
									<td><?php echo PHP_VERSION; ?></td>
								</tr>
								<tr>
									<td>操作系统:</td>
									<td><?php echo get_os() ?></td>
									<td>PHP运行方式:</td>
									<td><?php echo  $_SERVER['GATEWAY_INTERFACE'] ?></td>
								</tr>
								<tr>
									<td>登录者IP:</td>
									<td><?php echo $_SERVER['REMOTE_ADDR'] ?></td>
									<td>MYSQL版本:</td>
									<td>5.5.40</td>
								</tr>
								<tr>
									<td>程序版本:</td>
									<td class="version">YlsatCMS 1.0
										<font size="-6" color="#BBB">(20160108160215)</font>
									</td>
									<td>上传文件:</td>
									<td>可以
										<font size="-6" color="#BBB">(最大文件：2M ，表单：8M )</font>
									</td>
								</tr>
								<tr>
									<td>程序编码:</td>
									<td>UTF-8</td>
									<td>当前时间:</td>
									<td><?php echo date("Y-m-d H:i:s")  ?></td>
								</tr>
							</tbody>
							<tfoot>
								<tr></tr>
							</tfoot>
						</table>
					</div>
					<footer>
						<h1 class="page-header">程序信息</h1>
						<div class="table-responsive">
							<table class="table table-striped table-hover">
								<tbody>
									<tr>
										<td><span style="display:inline-block; width:8em">版权所有</span> POWERED BY WY ALL RIGHTS RESERVED</td>
									</tr>
									<tr>
										<td><span style="display:inline-block;width:8em">页面加载时间</span> PROCESSED IN <?PHP echo get_cfg_var("max_execution_time")."s"; ?>  SECONDS</td>
									</tr>
								</tbody>
							</table>
						</div>
					</footer>
				</div>
			</div>
		</section>
		<!-- 模态框-->
		<?php require_once "./public/modal.php" ?>
		<!--右键菜单列表-->
		<?php require_once "./public/rightClickMenu.php" ?>
	</body>

</html>

