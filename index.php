<?php 
	require_once "./admin/lib/init.php" ;

	

	//分页代码
	$sql="select count(*) from art";  //获取总的文章数
	$num=mGetOne($sql);  //总的文章数
	$curr=isset($_GET['page'])?$_GET['page']:1;  //当前页码数
	$cnt=8;  //每页显示条数
	$page=getPage($num,$curr,$cnt);

	//上一页，下一页
	$prepage=($curr<>1)?$curr-1:$curr;
	$nextpage=($curr<>ceil($num/$cnt))?$curr+1:$curr;

	//文章列表
	$sql = "select art_id,pic,title,des,tags,add_time,pv from art"." order by add_time desc LIMIT ".($curr-1)*$cnt.",".$cnt;

	$data=mGetAll($sql);
	

	//点击排行
	$sql="select art_id,title,pic,des from art order by pv desc LIMIT 3 ";
	$dian=mGetAll($sql);

	//最新发布
	$sql="select art_id,title,pic,des from art order by add_time desc LIMIT 3 ";
	$xin=mGetAll($sql);




?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>首页_张帅个人博客 - 一个站在web前后端设计之路的小萌新原创个人博客网站 - 关注web前端技术分享与生活的原创个人网站</title>
		<?php require_once "./public/head.php"; ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/base.css" rel="stylesheet">
		<link href="css/index.css" rel="stylesheet">
		<link href="css/m.css" rel="stylesheet">

		<script>
			window.onload = function() {
				var oH2 = document.getElementsByTagName("h2")[0];
				var oUl = document.getElementsByTagName("ul")[0];
				oH2.onclick = function() {
					var style = oUl.style;
					style.display = style.display == "block" ? "none" : "block";
					oH2.className = style.display == "block" ? "open" : ""
				}
			}
		</script>
	</head>

	<body>
		<img src="https://cdn.jsdelivr.net/gh/Zevs6/blogimg2/img/1572944814982571.jpg" style="display: none;">
		<?php require_once "./public/nav.php"; ?>
		<div class="picshow">
			<ul>
				<li>
					<a href="/"><i><img src="images/b01.jpg"></i>
						<div class="font">
							<h3>你今天必须做别人不愿做的事，好让你明天可以拥有别人不能拥有的东西。</h3>
						</div>
					</a>
				</li>
				<li>
					<a href="/"><i><img src="images/b02.jpg"></i>
						<div class="font">
							<h3>生活酸甜苦辣尽藏其中。幸福是一种感受，只是，不是所有的感受都幸福。</h3>
						</div>
					</a>
				</li>
				<li>
					<a href="/"><i><img src="images/b03.jpg"></i>
						<div class="font">
							<h3>如果你在努力奋斗，你有可能会失败，但是，如果你不奋斗你就已经输了。</h3>
						</div>
					</a>
				</li>
				<li>
					<a href="/"><i><img src="images/b04.jpg"></i>
						<div class="font">
							<h3>有时候，我们并非走出了生活给的伤痛，不过是学会了带着伤痛继续生活。</h3>
						</div>
					</a>
				</li>
				<li>
					<a href="/"><i><img src="images/b05.jpg"></i>
						<div class="font">
							<h3>生不过一场旅行，你路过我，我路过你，分别离去，各自修行，各自向前。</h3>
						</div>
					</a>
				</li>
			</ul>
		</div>
		<article>
			
			<?php require_once "./public/content.php" ?>
				<div class="pagelist">
					<?php if ($curr==1) {?>
					<a  href="javascript:" class="disabled" >&nbsp;<b>首页</b> </a>&nbsp;&nbsp;
					<a href="javascript:" class="disabled">上一页</a>&nbsp;
					<?php }else { ?>
					<a  href="?page=1" >&nbsp;<b>首页</b> </a>&nbsp;&nbsp;
					<a href="?page=<?php echo $prepage ?>">上一页</a>&nbsp;
					<?php } ?>
					<?php foreach($page as $k=>$v) { ?>
						<?php if ($k==$curr) {?>
							<a href="javascript:" class="active"><?php echo $k ?></a>&nbsp;
						<?php }else{?>
							<a href="index.php?<?php echo $v ?>" ><?php echo $k ?></a>&nbsp;
						<?php }?>
					<?php } ?>

					<?php if ($curr==ceil($num/$cnt)) {?>
						<a href="?page=<?php echo $nextpage ?>"  class="disabled">下一页</a>&nbsp;
						<a href="?page=<?php echo ceil($num/$cnt) ?>"  class="disabled"><b>末页</b></a>
					<?php }else { ?>
						<a href="?page=<?php echo $nextpage ?>">下一页</a>&nbsp;
						<a href="?page=<?php echo ceil($num/$cnt) ?>"><b>末页</b></a>
					<?php } ?>
					
				</div>
			</div>
			
			<div class="sidebar">
				<div class="about">
					<div class="avatar"> <img src="images/1285.gif" alt=""> </div>
					<p class="abname">Zevs | 张帅</p>
					<p class="abposition">一位在web网页前后端学习中的小萌新</p>
					<div class="abtext"> 一个90后大二学生！高中时接触计算机专业。一直学习编程方面知识，后进入大学计算机应用技术，从事web方向学习中，一发不可收拾。 </div>
				</div>
				
				<div class="search">
					<form action="/e/search/index.php" method="post" name="searchform" id="searchform">
						<input name="keyboard" id="keyboard" class="input_text" value="请输入关键字" style="color: rgb(153, 153, 153);" onfocus="if(value=='请输入关键字'){this.style.color='#000';value=''}" onblur="if(value==''){this.style.color='#999';value='请输入关键字'}" type="text">
						<input name="show" value="title" type="hidden">
						<input name="tempid" value="1" type="hidden">
						<input name="tbname" value="news" type="hidden">
						<input name="Submit" class="input_submit" value="搜索" type="submit">
					</form>
				</div>
				
				<div class="cloud">
					<h2 class="hometitle">标签云</h2>
					<ul>
						<a href="/">安装教程</a>
						<a href="/">校园生活</a>
						<a href="/">php5</a>
						<a href="/">随笔</a>
						<a href="/">青春</a>
						<a href="/">温暖</a>
						<a href="/">阳光</a>
						<a href="/">技术介绍</a>
						<a href="/">建站技术</a>
						<a href="/">后端技术</a>
						<a href="/">前端技术</a>
						<a href="/">读书</a>
					</ul>
				</div>
				
				<div class="links">
					<h2 class="hometitle">友情链接</h2>
					<ul>
						<li>
							<a href="http://zh66.club" title="张帅个人博客" target="_blank">皮皮家园</a>
						</li>
						<li>
							<a href="http://www.zhsh666.xyz" title="张帅个人博客" target="_blank">皮皮猪乐园</a>
						</li>
						<li>
							<a href="http://img.zh66.club" title="张帅个人博客" target="_blank">图床</a>
						</li>
					</ul>
				</div>
				
				<div class="paihang">
					<h2 class="hometitle">点击排行</h2>
					<ul>
						<?php foreach($dian as $v) {  ?>
						<li><b><a href="article.php?art_id=<?php echo $v['art_id'] ?>" target="_blank"><?php echo $v['title'] ?></a></b>
							<p><i><img src="<?php echo $v['pic'] ?>"></i><?php echo $v['des'] ?></p>
						</li>
						<?php } ?>
					</ul>
				</div>
				
				
				<div class="paihang">
					<h2 class="hometitle">最新发布</h2>
					<ul>
						<?php foreach($xin as $v) {  ?>
						<li><b><a href="article.php?art_id=<?php echo $v['art_id'] ?>" target="_blank"><?php echo $v['title'] ?></a></b>
							<p><i><img src="<?php echo $v['pic'] ?>"></i><?php echo $v['des'] ?></p>
						</li>
						<?php } ?>
					</ul>
				</div>
				
				
				<div class="weixin">
					<h2 class="hometitle">官方微信</h2>
					<ul><img src="images/wx.jpg"></ul>
				</div>
				
			</div>
		</article>
		<div class="blank"></div>
		
		<?php require_once "./public/footer.php"; ?>
		<?php require_once "./public/scrollTop.php"; ?>
		<?php require_once "./public/onService.php"; ?>
		<script src="js/nav.js"></script>
	</body>
</html>


