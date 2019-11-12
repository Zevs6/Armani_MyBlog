<?php require_once "./public/session.php" ?>
<!doctype html>
<?php require_once "./linklist.php" ?>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>友情链接 - 张帅个人博客管理系统</title>
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
      <form action="/Flink/checkAll" method="post" >
        <h1 class="page-header">操作</h1>
        <ol class="breadcrumb">
          <li><a href="add-flink.php">增加友情链接</a></li>
        </ol>
        <h1 class="page-header">管理 <span class="badge">1</span></h1>
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th><span class="glyphicon glyphicon-th-large"></span> <span class="visible-lg">选择/ID</span></th>
                <th><span class="glyphicon glyphicon-bookmark"></span> <span class="visible-lg">名称</span></th>
                <th><span class="glyphicon glyphicon-link"></span> <span class="visible-lg">URL</span></th>
                <th><span class="glyphicon glyphicon-comment"></span> <span class="visible-lg">描述</span></th>
                <th><span class="glyphicon glyphicon-pencil"></span> <span class="visible-lg">操作</span></th>
                <th><span class="glyphicon glyphicon-pencil"></span> <span class="visible-lg">审核</span></th>
              </tr>
            </thead>
            <tbody>
               <?php foreach($data as $k=>$v){  ?>
              <tr>
                <td><input type="checkbox" class="input-control" name="checkbox[]" value="" /><?php echo $v['link_id']; ?></td>
                <td class="article-title"><?php echo $v['link_name']; ?></td>
                <td><?php echo $v['link_web']; ?></td>
                <td><?php echo $v['link_des']; ?></td>
                <td><a href="linkup.php?link_id=<?php echo $v['link_id']; ?>">修改</a> <a rel="<?php echo $v['link_id']; ?>">删除</a></td>
                <td><a href="udit.php?link_id=<?php echo $v['link_id']; ?>"><?php if($v['udit']==1){ echo "禁用";}else{ echo "待审核";} ?></a></td>
              </tr>
               <?php } ?>
              <!-- <tr>
                <td><input type="checkbox" class="input-control" name="checkbox[]" value="" /></td>
                <td class="article-title">皮皮家园</td>
                <td>http://www.zh66.club</td>
                <td><a href="update-flink.php">修改</a> <a rel="1">删除</a></td>
              </tr> -->
            </tbody>
          </table>
        </div>
        <footer class="message_footer">
          <nav>
            <div class="btn-toolbar operation" role="toolbar">
              <div class="btn-group" role="group"> <a class="btn btn-default" onClick="select()">全选</a> <a class="btn btn-default" onClick="reverse()">反选</a> <a class="btn btn-default" onClick="noselect()">不选</a> </div>
              <div class="btn-group" role="group">
                <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="删除全部选中" name="checkbox_delete">删除</button>
              </div>
            </div>
            <ul class="pagination pagenav">
              <li class="disabled"><a aria-label="Previous"> <span aria-hidden="true">&laquo;</span> </a> </li>
              <li class="active"><a>1</a></li>
              <li class="disabled"><a aria-label="Next"> <span aria-hidden="true">&raquo;</span> </a> </li>
            </ul>
          </nav>
        </footer>
      </form>
    </div>
  </div>
</section>
		<!-- 模态框-->
		<?php require_once "./public/modal.php" ?>
		<!--右键菜单列表-->
		<?php require_once "./public/rightClickMenu.php" ?>
<script>
//是否确认删除
$(function(){   
	$("#main table tbody tr td a").click(function(){
		var name = $(this);
		var id = name.attr("rel"); //对应id  
		if (event.srcElement.outerText == "删除") 
		{
			if(window.confirm("此操作不可逆，是否确认？"))
			{
				$.ajax({
					type: "POST",
					url: "linkdel.php?link_id="+id,
					data: "id=" + id,
					cache: false, //不缓存此页面   
					success: function (data) {
						window.location.reload();
            alert('友链删除成功！');
					}
				});
			};
		};
	});   
});
</script>
</body>
</html>
