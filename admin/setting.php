<?php require_once "./public/session.php" ?>
<?php require_once "./lib/init.php" ; ?>
<!doctype html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8">
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>常规设置 - 张帅个人博客管理系统</title>
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
						<li>
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
									<a href="#">管理用户组</a>
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
						<li class="active">
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
									<a href="#">安全配置</a>
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
						<form action="/Setting/general" method="post" autocomplete="off" draggable="false">
							<div class="col-md-9">
								<h1 class="page-header">常规设置</h1>
								<div class="add-article-box">
									<h2 class="add-article-box-title"><span>站点标题</span></h2>
									<div class="add-article-box-content">
										<input type="text" name="title" class="form-control" placeholder="请输入站点标题" required autofocus autocomplete="off">
									</div>
								</div>
								<div class="add-article-box">
									<h2 class="add-article-box-title"><span>副标题</span></h2>
									<div class="add-article-box-content">
										<input type="text" name="ftitle" class="form-control" placeholder="请输入站点副标题" autocomplete="off">
										<span class="prompt-text">用简洁的文字描述本站点。</span> </div>
								</div>
								<div class="add-article-box">
									<h2 class="add-article-box-title"><span>站点地址（URL）</span></h2>
									<div class="add-article-box-content">
										<input type="text" name="siteurl" class="form-control" placeholder="在此处输入站点地址（URL）" required autocomplete="off">
									</div>
								</div>
								<div class="add-article-box">
									<h2 class="add-article-box-title"><span>站点关键字</span></h2>
									<div class="add-article-box-content">
										<textarea class="form-control" name="keywords" autocomplete="off"></textarea>
										<span class="prompt-text">关键字会出现在网页的keywords属性中。</span> </div>
								</div>
								<div class="add-article-box">
									<h2 class="add-article-box-title"><span>站点描述</span></h2>
									<div class="add-article-box-content">
										<textarea class="form-control" name="describe" rows="4" autocomplete="off"></textarea>
										<span class="prompt-text">描述会出现在网页的description属性中。</span> </div>
								</div>
							</div>
							<div class="col-md-3">
								<h1 class="page-header">站点</h1>
								<div class="add-article-box">
									<h2 class="add-article-box-title"><span>电子邮件地址</span></h2>
									<div class="add-article-box-content">
										<input type="email" name="email" class="form-control" placeholder="在此处输入邮箱" autocomplete="off" />
										<span class="prompt-text">这个电子邮件地址仅为了管理方便而填写</span> </div>
								</div>
								<div class="add-article-box">
									<h2 class="add-article-box-title"><span>ICP备案号</span></h2>
									<div class="add-article-box-content">
										<input type="email" name="email" class="form-control" placeholder="在此处输入备案号" autocomplete="off" />
									</div>
								</div>
								<div class="add-article-box">
									<h2 class="add-article-box-title"><span>登录超时</span></h2>
									<div class="add-article-box-content">
										<input type="email" name="email" class="form-control" placeholder="在此处输入超时时间(s)" value="3600" required autocomplete="off" />
										<span class="prompt-text">单位(秒),超时将强制退出</span> </div>
								</div>
								<div class="add-article-box">
									<h2 class="add-article-box-title"><span>保存</span></h2>
									<div class="add-article-box-content"> <span class="prompt-text">请确定您对所有选项所做的更改</span> </div>
									<div class="add-article-box-footer">
										<button class="btn btn-primary" type="submit" name="submit">更新</button>
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
	</body>

</html>