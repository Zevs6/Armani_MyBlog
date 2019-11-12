<?php require_once "./public/session.php" ?>
<!doctype html>
<html lang="zh-CN">
<?php require_once "./artadd.php" ?>
	<head>
		<meta charset="utf-8">
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>写文章 - 张帅个人博客管理系统</title>
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
						<li class="active">
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
						<form action="artadd.php" method="post" class="add-article-form">
							<div class="col-md-9">
								<h1 class="page-header">撰写新文章</h1>
								<div class="form-group">
									<label for="article-title" class="sr-only">标题</label>
									<input type="text" id="article-title" name="title" class="form-control" placeholder="在此处输入标题" required autofocus autocomplete="off">
								</div>
								<div class="form-group">
									<label for="article-content" class="sr-only">内容</label>
									<script id="article-content" name="content" type="text/plain"></script>
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
									<h2 class="add-article-box-title"><span>栏目</span></h2>
									<div class="add-article-box-content">
										<ul class="category-list">
										<?php foreach($row as $k=>$c){  ?>
											<li>
												<label>
													<input name="category" type="radio" value="<?php echo $c['cat_id'] ?>" checked>
													<?php echo $c['catname'] ?> <em class="hidden-md">( 栏目ID: <span><?php echo $c['cat_id'] ?></span> )</em>
												</label>
											</li>
											<?php } ?>
										</ul>
									</div>
								</div>
								<div class="add-article-box">
									<h2 class="add-article-box-title"><span>标签</span></h2>
									<div class="add-article-box-content">
										<input type="text" class="form-control" placeholder="输入新标签" name="tags" autocomplete="off">
										<span class="prompt-text">多个标签请用英文逗号,隔开</span> </div>
								</div>
								<div class="add-article-box">
									<h2 class="add-article-box-title"><span>标题图片</span></h2>
									<div class="add-article-box-content">
										<input type="text" class="form-control" placeholder="点击按钮选择图片" id="pictureUpload" name="titlepic" autocomplete="off">
									</div>
									<div class="add-article-box-footer">
										<button class="btn btn-default" type="button" ID="upImage">选择</button>
									</div>
								</div>
								<div class="add-article-box">
									<h2 class="add-article-box-title"><span>发布</span></h2>
									<div class="add-article-box-content">
										<p><label>状态：</label><span class="article-status-display">未发布</span></p>
										<p><label>公开度：</label><input type="radio" name="visibility" value="0" checked/>公开 <input type="radio" name="visibility" value="1" />加密</p>
										<p><label>发布于：</label><span class="article-time-display"><input style="border: none;" type="datetime" name="time" value="<?php echo date('Y-m-d H:i:s') ?>" /></span></p>
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
		<script src="lib/ueditor/ueditor.config.js"></script>
		<script src="lib/ueditor/ueditor.all.min.js">
		</script>
		<script src="lib/ueditor/lang/zh-cn/zh-cn.js"></script>
		<script id="uploadEditor" type="text/plain" style="display:none;"></script>
		<script type="text/javascript">
			var editor = UE.getEditor('article-content');
			window.onresize = function() {
				window.location.reload();
			}
			var _uploadEditor;
			$(function() {
				//重新实例化一个编辑器，防止在上面的editor编辑器中显示上传的图片或者文件
				_uploadEditor = UE.getEditor('uploadEditor');
				_uploadEditor.ready(function() {
					//设置编辑器不可用
					//_uploadEditor.setDisabled();
					//隐藏编辑器，因为不会用到这个编辑器实例，所以要隐藏
					_uploadEditor.hide();
					//侦听图片上传
					_uploadEditor.addListener('beforeInsertImage', function(t, arg) {
						//将地址赋值给相应的input,只去第一张图片的路径
						$("#pictureUpload").attr("value", arg[0].src);
						//图片预览
						//$("#imgPreview").attr("src", arg[0].src);
					})
					//侦听文件上传，取上传文件列表中第一个上传的文件的路径
					_uploadEditor.addListener('afterUpfile', function(t, arg) {
						$("#fileUpload").attr("value", _uploadEditor.options.filePath + arg[0].url);
					})
				});
			});
			//弹出图片上传的对话框
			$('#upImage').click(function() {
				var myImage = _uploadEditor.getDialog("insertimage");
				myImage.open();
			});
			//弹出文件上传的对话框
			function upFiles() {
				var myFiles = _uploadEditor.getDialog("attachment");
				myFiles.open();
			}
		</script>
	</body>

</html>