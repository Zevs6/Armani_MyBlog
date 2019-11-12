<?php require_once "./public/session.php" ?>
<?php require_once "./catup.php" ?>
<!doctype html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8">
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>修改栏目 - 张帅个人博客管理系统</title>
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
        <li><a href="index.php">报告</a></li>
      </ul>
      <ul class="nav nav-sidebar">
        <li ><a href="article.php">文章</a></li>
        <li><a href="notice.php">公告</a></li>
        <li><a href="comment.php">评论</a></li>
        <li><a data-toggle="tooltip" data-placement="top" title="网站暂无留言功能">留言</a></li>
      </ul>
      <ul class="nav nav-sidebar">
        <li class="active"><a href="category.php">栏目</a></li>
        <li><a class="dropdown-toggle" id="otherMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">其他</a>
          <ul class="dropdown-menu" aria-labelledby="otherMenu">
            <li><a href="flink.php">友情链接</a></li>
            <li><a href="loginlog.php">访问记录</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav nav-sidebar">
        <li><a class="dropdown-toggle" id="userMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">用户</a>
          <ul class="dropdown-menu" aria-labelledby="userMenu">
            <li><a href="#">管理用户组</a></li>
            <li><a href="manage-user.php">管理用户</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="loginlog.php">管理登录日志</a></li>
          </ul>
        </li>
        <li><a class="dropdown-toggle" id="settingMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">设置</a>
          <ul class="dropdown-menu" aria-labelledby="settingMenu">
            <li><a href="setting.php">基本设置</a></li>
            <li><a href="readset.php">用户设置</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">安全配置</a></li>
            <li role="separator" class="divider"></li>
            <li class="disabled"><a>扩展菜单</a></li>
          </ul>
        </li>
      </ul>
    </aside>
			
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 main" id="main">
					<h1 class="page-header">修改栏目</h1>
					<form action="" method="post">
						<div class="form-group">
							<label for="category-name">栏目名称</label>
							<input type="text" id="category-name" name="catname" value="<?php echo $row['catname'] ?>" class="form-control" placeholder="在此处输入栏目名称" required autocomplete="off">
							<span class="prompt-text">这将是它在站点上显示的名字。</span> </div>
						<div class="form-group">
							<label for="category-alias">栏目别名</label>
							<input type="text" id="category-alias" name="alias" value="<?php echo $row['alias'] ?>" class="form-control" placeholder="在此处输入栏目别名" required autocomplete="off">
							<span class="prompt-text">“别名”是在URL中使用的别称，它可以令URL更美观。通常使用小写，只能包含字母，数字和连字符（-）。</span> </div>
						<!--<div class="form-group">
							<label for="category-fname">父节点</label>
							<select id="category-fname" class="form-control" name="fid">
								<option value="0" selected>无</option>
								<option value="1">前端技术</option>
								<option value="2">后端程序</option>
								<option value="3">管理系统</option>
								<option value="4">授人以渔</option>
								<option value="5">程序人生</option>
							</select>
							<span class="prompt-text">栏目是有层级关系的，您可以有一个“音乐”分类目录，在这个目录下可以有叫做“流行”和“古典”的子目录。</span> </div>-->
						<div class="form-group">
							<label for="category-keywords">关键字</label>
							<input type="text" id="category-keywords" name="keywords" value="<?php echo $row['keywords'] ?>" class="form-control" placeholder="在此处输入栏目关键字" autocomplete="off">
							<span class="prompt-text">关键字会出现在网页的keywords属性中。</span> </div>
						<div class="form-group">
							<label for="category-describe">描述</label>
							<textarea class="form-control" id="category-describe" name="describe" rows="4" autocomplete="off"><?php echo $row['des'] ?></textarea>
							<span class="prompt-text">描述会出现在网页的description属性中。</span> </div>
						<button class="btn btn-primary" type="submit" name="submit">更新</button>
					</form>
				</div>
			</div>
		</section>
		<!-- 模态框-->
		<?php require_once "./public/modal.php" ?>
		<!--右键菜单列表-->
		<?php require_once "./public/rightClickMenu.php" ?>
	</body>

</html>