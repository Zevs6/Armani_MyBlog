<?php require_once "./public/session.php" ?>
<?php require_once "./lib/init.php" ; ?>
<!doctype html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8">
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>修改公告 - 张帅个人博客管理系统</title>
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
						<li>
							<a href="index.php">报告</a>
						</li>
					</ul>
					<ul class="nav nav-sidebar">
						<li>
							<a href="article.php">文章</a>
						</li>
						<li class="active">
							<a href="notice.php">公告</a>
						</li>
						<li>
							<a href="comment.php">评论</a>
						</li>
						<li>
							<a data-toggle="tooltip" data-placement="top" title="网站暂无留言功能">留言</a>
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
									<a href="loginlog.php">访问记录</a>
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
									<a href="readset.php">用户设置</a>
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
					<div class="row">
						<form action="test.php" method="post" class="add-article-form">
							<div class="col-md-9">
								<h1 class="page-header">修改公告</h1>
								<div class="form-group">
									<label for="article-title" class="sr-only">标题</label>
									<input type="text" id="article-title" name="title" class="form-control" placeholder="在此处输入标题" required autofocus autocomplete="off">
								</div>
								<div class="form-group">
									<label for="article-content" class="sr-only">内容</label>
									<textarea id="article-content" name="content" class="form-control"></textarea>
								</div>
								<div class="add-article-box">
									<h2 class="add-article-box-title"><span>关键字</span></h2>
									<div class="add-article-box-content">
										<input type="text" class="form-control" placeholder="请输入关键字" name="keywords" autocomplete="off">
										<span class="prompt-text">多个标签请用英文逗号,隔开。</span>
									</div>
								</div>
								<div class="add-article-box">
									<h2 class="add-article-box-title"><span>描述</span></h2>
									<div class="add-article-box-content">
										<textarea class="form-control" name="describe" autocomplete="off"></textarea>
										<span class="prompt-text">描述是可选的手工创建的内容总结，并可以在网页描述中使用</span>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<h1 class="page-header">操作</h1>
								<div class="add-article-box">
									<h2 class="add-article-box-title"><span>发布</span></h2>
									<div class="add-article-box-content">
										<p><label>状态：</label><span class="article-status-display">未发布</span></p>
										<p><label>公开度：</label><input type="radio" name="visibility" value="0" checked/>公开 <input type="radio" name="visibility" value="1" />加密</p>
										<p><label>发布于：</label><span class="article-time-display"><input style="border: none;" type="datetime" name="time" value="2016-01-09 17:29:37" /></span></p>
									</div>
									<div class="add-article-box-footer">
										<button class="btn btn-primary" type="submit" name="submit">发布</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
		<!-- 模态框-->
		<?php require_once "./public/modal.php" ?>
		<!--右键菜单列表-->
		<?php require_once "./public/rightClickMenu.php" ?>
		<!--summernote富文本编辑器-->
		<link rel="stylesheet" type="text/css" href="lib/summernote/summernote.css">
		<script src="lib/summernote/summernote.js"></script>
		<script src="lib/summernote/lang/summernote-zh-CN.js"></script>
		<script>
			$('#article-content').summernote({
				lang: 'zh-CN'
			});
		</script>
	</body>

</html>