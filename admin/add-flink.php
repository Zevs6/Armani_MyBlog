<?php require_once "./public/session.php" ?>
<!doctype html>
<?php require_once "./linkadd.php" ?>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>增加友情链接 - 张帅个人博客管理系统</title>
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
        <li><a href="article.php">文章</a></li>
        <li><a href="notice.php">公告</a></li>
        <li><a href="comment.php">评论</a></li>
        <li><a data-toggle="tooltip" data-placement="top" title="网站暂无留言功能">留言</a></li>
      </ul>
      <ul class="nav nav-sidebar">
        <li><a href="category.php">栏目</a></li>
        <li class="active"><a class="dropdown-toggle" id="otherMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">其他</a>
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
      <div class="row">
        <form action="" method="post" class="add-flink-form" autocomplete="off" draggable="false">
          <div class="col-md-9">
            <h1 class="page-header">增加友情链接</h1>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>名称</span></h2>
              <div class="add-article-box-content">
                <input type="text" id="flink-name" name="name" class="form-control" placeholder="在此处输入名称" required autofocus autocomplete="off">
                <span class="prompt-text">例如：张帅个人技术博客</span> </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>WEB地址</span></h2>
              <div class="add-article-box-content">
                <input type="text" id="flink-url" name="url" class="form-control" placeholder="在此处输入URL地址" required autocomplete="off">
                <span class="prompt-text">例子：<code>http://www.zh66.club/</code>——不要忘了<code>http://</code></span> </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>图像地址</span></h2>
              <div class="add-article-box-content">
                <input type="text" id="flink-imgurl" name="imgurl" class="form-control" placeholder="在此处输入图像地址" required autocomplete="off">
                <span class="prompt-text">图像地址是可选的，可以为网站LOGO地址等</span> </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>描述</span></h2>
              <div class="add-article-box-content">
                <textarea class="form-control" name="describe" autocomplete="off"></textarea>
                <span class="prompt-text">描述是可选的手工创建的内容总结</span> </div>
            </div>
          </div>
          <div class="col-md-3">
            <h1 class="page-header">操作</h1>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>保存</span></h2>
              <div class="add-article-box-content">
                <p>
                  <label>状态：</label>
                  <span class="article-status-display">未增加</span></p>
                <p><label>target：</label><input type="radio" name="target" value="0" checked />_blank&nbsp;&nbsp;<input type="radio" name="target" value="1" />_self&nbsp;&nbsp;<input type="radio" name="target" value="2" />_top</p>
                <p><label>rel：</label><input type="radio" name="rel" value="0" checked />nofollow&nbsp;&nbsp;<input type="radio" name="rel" value="1"/>none</p>
                <p>
                  <label>增加于：</label>
                  <span class="article-time-display">
                  <input style="border: none;" type="datetime" name="time" value="<?php echo date("Y-m-d H:i:s") ?>" />
                  </span></p>
              </div>
              <div class="add-article-box-footer">
                <button class="btn btn-primary" type="submit" name="submit">增加</button>
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