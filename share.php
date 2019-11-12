<?php
	require_once "./admin/lib/init.php";
 ?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>图片分享_张帅个人博客 - 一个站在web前后端设计之路的小萌新原创个人博客网站 - 关注web前端技术分享与生活的原创个人网站</title>
  <?php require_once "./public/head.php"; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/base.css" rel="stylesheet">
  <link href="css/index.css" rel="stylesheet">
  <link href="css/m.css" rel="stylesheet">
<!--<script src="js/modernizr.js"></script>-->

<script>
window.onload = function ()
{
	var oH2 = document.getElementsByTagName("h2")[0];
	var oUl = document.getElementsByTagName("ul")[0];
	oH2.onclick = function ()
	{
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
  <h1 class="t_nav"><span>好咖啡要和朋友一起品尝，好“图片”也要和同样喜欢它的人一起分享。 </span><a href="index.php" class="n1">网站首页</a><a href="#" class="n2">图片分享</a></h1>
  <div class="picbox">
    <ul>
      <li><a href="/"><i><img src="images/b01.jpg"></i>
        <div class="picinfo">
          <h3>个人博客图片《早安》</h3>
          <span>好咖啡要和朋友一起品尝，好“图片”也要和同样喜欢它的人一起分享。</span> </div>
        </a></li>
      <li><a href="/"><i><img src="images/t03.jpg"></i>
        <div class="picinfo">
          <h3>个人博客图片《早安》</h3>
          <span>好咖啡要和朋友一起品尝，好“图片”也要和同样喜欢它的人一起分享。</span> </div>
        </a></li>
      <li><a href="/"><i><img src="images/b04.jpg"></i>
        <div class="picinfo">
          <h3>个人博客图片《早安》</h3>
          <span>好咖啡要和朋友一起品尝，好“图片”也要和同样喜欢它的人一起分享。</span> </div>
        </a></li>
      <li><a href="/"><i><img src="images/v1.jpg"></i>
        <div class="picinfo">
          <h3>个人博客图片《早安》</h3>
          <span>好咖啡要和朋友一起品尝，好“图片”也要和同样喜欢它的人一起分享。</span> </div>
        </a></li>
      <li><a href="/"><i><img src="images/mb02.jpg"></i>
        <div class="picinfo">
          <h3>个人博客图片《早安》</h3>
          <span>好咖啡要和朋友一起品尝，好“图片”也要和同样喜欢它的人一起分享。</span> </div>
        </a></li>
      <li><a href="/"><i><img src="images/text01.jpg"></i>
        <div class="picinfo">
          <h3>个人博客图片《早安》</h3>
          <span>好咖啡要和朋友一起品尝，好“图片”也要和同样喜欢它的人一起分享。</span> </div>
        </a></li>
      <li><a href="/"><i><img src="images/v2.jpg"></i>
        <div class="picinfo">
          <h3>个人博客图片《早安》</h3>
          <span>好咖啡要和朋友一起品尝，好“图片”也要和同样喜欢它的人一起分享。</span> </div>
        </a></li>
      <li><a href="/"><i><img src="images/b06.jpg"></i>
        <div class="picinfo">
          <h3>个人博客图片《早安》</h3>
          <span>好咖啡要和朋友一起品尝，好“图片”也要和同样喜欢它的人一起分享。</span> </div>
        </a></li>
    </ul>
    <ul>
      <li><a href="/"><i><img src="images/zd01.jpg"></i>
        <div class="picinfo">
          <h3>个人博客图片《早安》</h3>
          <span>好咖啡要和朋友一起品尝，好“图片”也要和同样喜欢它的人一起分享。</span> </div>
        </a></li>
      <li><a href="/"><i><img src="images/b03.jpg"></i>
        <div class="picinfo">
          <h3>个人博客图片《早安》</h3>
          <span>好咖啡要和朋友一起品尝，好“图片”也要和同样喜欢它的人一起分享。</span> </div>
        </a></li>
      <li><a href="/"><i><img src="images/text02.jpg"></i>
        <div class="picinfo">
          <h3>个人博客图片《早安》</h3>
          <span>好咖啡要和朋友一起品尝，好“图片”也要和同样喜欢它的人一起分享。</span> </div>
        </a></li>
      <li><a href="/"><i><img src="images/v1.jpg"></i>
        <div class="picinfo">
          <h3>个人博客图片《早安》</h3>
          <span>好咖啡要和朋友一起品尝，好“图片”也要和同样喜欢它的人一起分享。</span> </div>
        </a></li>
      <li><a href="/"><i><img src="images/mb02.jpg"></i>
        <div class="picinfo">
          <h3>个人博客图片《早安》</h3>
          <span>好咖啡要和朋友一起品尝，好“图片”也要和同样喜欢它的人一起分享。</span> </div>
        </a></li>
      <li><a href="/"><i><img src="images/t01.jpg"></i>
        <div class="picinfo">
          <h3>个人博客图片《早安》</h3>
          <span>好咖啡要和朋友一起品尝，好“图片”也要和同样喜欢它的人一起分享。</span> </div>
        </a></li>
      <li><a href="/"><i><img src="images/mb05.jpg"></i>
        <div class="picinfo">
          <h3>个人博客图片《早安》</h3>
          <span>好咖啡要和朋友一起品尝，好“图片”也要和同样喜欢它的人一起分享。</span> </div>
        </a></li>
      <li><a href="/"><i><img src="images/b05.jpg"></i>
        <div class="picinfo">
          <h3>个人博客图片《早安》</h3>
          <span>好咖啡要和朋友一起品尝，好“图片”也要和同样喜欢它的人一起分享。</span> </div>
        </a></li>
    </ul>
    <ul>
      <li><a href="/"><i><img src="images/b02.jpg"></i>
        <div class="picinfo">
          <h3>个人博客图片《早安》</h3>
          <span>好咖啡要和朋友一起品尝，好“图片”也要和同样喜欢它的人一起分享。</span> </div>
        </a></li>
      <li><a href="/"><i><img src="images/text02.jpg"></i>
        <div class="picinfo">
          <h3>个人博客图片《早安》</h3>
          <span>好咖啡要和朋友一起品尝，好“图片”也要和同样喜欢它的人一起分享。</span> </div>
        </a></li>
      <li><a href="/"><i><img src="images/v1.jpg"></i>
        <div class="picinfo">
          <h3>个人博客图片《早安》</h3>
          <span>好咖啡要和朋友一起品尝，好“图片”也要和同样喜欢它的人一起分享。</span> </div>
        </a></li>
      <li><a href="/"><i><img src="images/mb02.jpg"></i>
        <div class="picinfo">
          <h3>个人博客图片《早安》</h3>
          <span>好咖啡要和朋友一起品尝，好“图片”也要和同样喜欢它的人一起分享。</span> </div>
        </a></li>
      <li><a href="/"><i><img src="images/text01.jpg"></i>
        <div class="picinfo">
          <h3>个人博客图片《早安》</h3>
          <span>好咖啡要和朋友一起品尝，好“图片”也要和同样喜欢它的人一起分享。</span> </div>
        </a></li>
      <li><a href="/"><i><img src="images/b01.jpg"></i>
        <div class="picinfo">
          <h3>个人博客图片《早安》</h3>
          <span>好咖啡要和朋友一起品尝，好“图片”也要和同样喜欢它的人一起分享。</span> </div>
        </a></li>
      <li><a href="/"><i><img src="images/t03.jpg"></i>
        <div class="picinfo">
          <h3>个人博客图片《早安》</h3>
          <span>好咖啡要和朋友一起品尝，好“图片”也要和同样喜欢它的人一起分享。</span> </div>
        </a></li>
      <li><a href="/"><i><img src="images/b04.jpg"></i>
        <div class="picinfo">
          <h3>个人博客图片《早安》</h3>
          <span>好咖啡要和朋友一起品尝，好“图片”也要和同样喜欢它的人一起分享。</span> </div>
        </a></li>
    </ul>
    <div class="blank"></div>
    <div class="pagelist"><a title="Total record">&nbsp;<b>首页</b> </a>&nbsp;&nbsp<a href="/download/index_2.php">上一页</a>&nbsp;<b>1</b>&nbsp;<a href="/download/index_2.php">2</a>&nbsp;<a href="/download/index_2.php">下一页</a>&nbsp;<a href="/download/index_2.php">尾页</a></div>
  </div>
 	<?php require_once "./public/sidebar.php" ?>
</article>
<?php require_once "./public/footer.php"; ?>
<?php require_once "./public/scrollTop.php"; ?>
<script src="js/nav.js"></script>
</body>
</html>
