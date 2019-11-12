<?php 
	require_once "./admin/lib/init.php" ;

	//接受文章ID
	$art_id=$_GET['art_id'];

	//每刷新一次浏览量+1
	$sql="update art set pv=pv+1 where art_id=$art_id ";
	$res = mQuery($sql);

	//查询文章
	$sql = "select title,des,tags,add_time,pv,contents from art where art_id=$art_id";
	$art=mGetRow($sql);

	
	//如果地址栏输入一个没有的文章号， 跳转到首页
	if(empty($art)){
		header ('Location:index.php');
		exit;
	}

	//查询所有的留言
	$sql="select * from comment where art_id=$art_id"." order by time desc";
	$comms=mGetAll($sql);

	//统计评论数
	$sql="select count(*) as count from comment where art_id=$art_id";
	$count=mGetOne($sql)+3;

	//post 非空 代表有留言
	if (!empty($_POST)){
		$cotent=$_POST['text'];
		$name=$_POST['author'];
		$email=$_POST['mail'];
		$qq=$_POST['qq'];
		if(empty($qq))
		{$qq=3202025856;}
		$time=time();
		$ip=$_SERVER['REMOTE_ADDR'];
		$sql="insert into comment (art_id,comm,time,ip,author,email,qq) values ('$art_id','$cotent','$time','$ip','$name','$email','$qq')";
		$res=mQuery($sql);
		if($res){
			//跳转到上个页面
			$ref=$_SERVER['HTTP_REFERER'];
			header("Location: $ref");
		}
	}

?>
<!doctype html>
<html>

	<head>
		<meta charset="utf-8">
		<title><?php echo $art['title'] ?>~张帅个人博客 - 一个站在web前后端设计之路的小萌新原创个人博客网站-关注web前端技术分享与生活的原创个人网站</title>
		<meta name="keywords" content="个人博客,张帅个人博客" />
		<meta name="description" content="<?php echo $art['des'] ?>" />
		<link rel="icon" href="../images/favicon.ico">
		<link href="font/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/base.css" rel="stylesheet">
		<link href="css/index.css" rel="stylesheet">
		<link href="css/m.css" rel="stylesheet">
		<link href="css/comment.css" rel="stylesheet">
		<script src="js/jquery-2.1.1.min.js"></script>

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
		<?php require_once "./public/nav.php"; ?>
		<article>
			<h1 class="t_nav"><span>您现在的位置是：首页 > 学无止境> 程序人生</span><a href="index.php" class="n1">网站首页</a><a href="#" class="n2">慢生活</a></h1>
			<div class="infos">
				<div class="newsview">
					<h3 class="news_title"><?php echo $art['title'] ?></h3>
						 <div class="news_author"><span class="au01"><a href="mailto:2602138376@qq.com">张帅</a></span><span class="au02"><?php echo date('Y-m-d',$art['add_time']); ?></span><span class="au03">共<b><!--<script src="/e/public/ViewClick/?classid=5&amp;id=816&amp;addclick=1"></script> --> <?php echo $art['pv'] ?></b>人围观</span></div>
					<div class="tags">
						<a href="/e/tags/?tagname=%B8%F6%C8%CB%B2%A9%BF%CD&amp;tempid=13" target="_blank"><?php echo $art['tags'] ?></a> &nbsp;
						<a href="/e/tags/?tagname=%D0%A1%CA%C0%BD%E7&amp;tempid=13" target="_blank">小世界</a>
					</div>
					<div class="news_about"><strong>简介</strong> <?php echo $art['des'] ?></div>
					<div class="news_infos"> 
                         <?php echo $art['contents'] ?>
                    </div>
				</div>
				<div class="share"> </div>
				<!-- <div class="nextinfo">
					<p>上一篇：
						<a href="/news/life/2018-03-13/804.php">作为一个设计师,如果遭到质疑你是否能恪守自己的原则?</a>
					</p>
					<p>下一篇：
						<a href="/news/life/">返回列表</a>
					</p>
				</div> -->
				<!-- <div class="otherlink">
					<h2>相关文章</h2>
					<ul>
						<li>
							<a href="/download/div/2018-04-22/815.php" title="php5个人博客模板《黑色格调》">php5个人博客模板《黑色格调》</a>
						</li>
						<li>
							<a href="/download/div/2018-04-18/814.php" title="php5个人博客模板主题《清雅》">php5个人博客模板主题《清雅》</a>
						</li>
					</ul>
				</div> -->
				<div class="news_pl">
					<h2>文章评论</h2>
					<ul>
						<div class="gbko"> 
										<div class="comment fadein" style="">
												
										<div class="comment-form">
										<!-- 判断设置是否允许对当前文章进行评论 -->
										<div id="respond-post-111" class="respond">
										<h3 class="comment-title">已有 <?php echo $count ?> 条评论		</h3>
										<div class="comment-container">
																<div class="comment-list">
																<?php foreach($comms as $c) { ?>
																<div id="li-comment-10" class="comment-body comment-parent comment-even">
																			<div class="comment-body-inner">
																			<div class="comment-author-avatar">
																				<img class="avatar" src="http://q2.qlogo.cn/headimg_dl?dst_uin=<?php echo $c['qq'] ?>&spec=100" alt="TheBaiRuo" width="100" height="100">      </div>
																			<div class="comment-main comment-author-info">
																				<div class="comment-content bubble">
																				<p><?php echo $c['comm'] ?></p>	    </div>
																				<p class="comment-meta">
																				<span class="comment-author"><a href="https://www.zh66.club" rel="external nofollow" target="_blank"><?php echo $c['author'] ?></a></span>
																				<span class="comment-date"><?php echo date('Y-m-d H:i:s',$c['time']);  ?></span>
																				</p>
																			</div>
																			</div>
																	<?php } ?>

																	<div id="li-comment-10" class="comment-body comment-parent comment-even">
																			<div class="comment-body-inner">
																			<div class="comment-author-avatar">
																				<img class="avatar" src="https://cdn.jsdelivr.net/gh/Zevs6/CDN@3.0/img/avatar.jpg" alt="TheBaiRuo" width="100" height="100">      </div>
																			<div class="comment-main comment-author-info">
																				<div class="comment-content bubble">
																				<p>名称：妙笔生花<br>
																				简介：一生很长，会遇见很多出现在你生命中的过客！<br>
																				网址: https://blog.zh66.club<br>
																				LOGO:http://blog.zh66.club/usr/themes/Miracles/favicon.ico</p>	    </div>
																				<p class="comment-meta">
																				<span class="comment-author"><a href="http://blog.zh66.club" rel="external nofollow" target="_blank">妙笔生花</a></span>
																				<span class="comment-date">2019-11-01 14:44</span>
																				</p>
																			</div>
																			</div>

																	<div id="li-comment-9" class="comment-body comment-parent comment-even">
																		<div class="comment-body-inner">
																		<div class="comment-author-avatar">
																			<img class="avatar" src="http://blog.zh66.club/usr/themes/Miracles/favicon.ico" alt="TheBaiRuo" width="100" height="100">      </div>
																		<div class="comment-main comment-author-info">
																			<div class="comment-content bubble">
																			<p>名称：皮皮家园<br>
																			简介：要让平凡的每一天，变得不再平凡！<br>
																			网址: https://www.zh66.club<br>
																			LOGO:https://cdn.jsdelivr.net/gh/Zevs6/CDN@3.0/img/avatar.jpg</p>	    </div>
																			<p class="comment-meta">
																			<span class="comment-author"><a href="https://www.zh66.club" rel="external nofollow" target="_blank">皮皮家园</a></span>
																			<span class="comment-date">2019-11-01 20:44</span>
																			</p>
																		</div>
																		</div>
																	<div id="li-comment-8" class="comment-body comment-parent comment-odd comment-by-author">
																		<div class="comment-body-inner">
																		<div class="comment-author-avatar">
																			<img class="avatar" src="http://www.gravatar.com/avatar/ba32af2e75378d40acdd4e6f97ff183a?s=100&amp;r=G&amp;d=" alt="admin" width="100" height="100">      </div>
																		<div class="comment-main comment-author-info">
																			<div class="comment-content bubble">
																			<span class="comment-reply">
																				<a href="http://blog.zh66.club/index.php/link.html?replyTo=8#respond-page-6" rel="nofollow" onclick="return TypechoComment.reply('comment-8', 8);"><i class="iconfont icon-return"></i></a>		  </span>
																			<p>小伙伴们快来评论留言吧！</p>	    </div>
																			<p class="comment-meta">
																			<span class="comment-author"><a href="http://blog.zh66.club" rel="external nofollow" target="_blank">admin</a></span>
																			<span class="comment-date">2019-11-01 11:15 </span>
																			</p>
																		</div>
																		</div>
																	</div>
																	</div>
																</div>
										<h3 id="response">添加新评论</h3>
								<!-- 输入表单开始 -->
										<form method="post" action="" id="comment-form" role="form">
								<!-- 输入要回复的内容 -->
											<div class="container-fluid"><div class="row">
											<p class="col-md-12">
												<textarea rows="8" cols="50" name="text" id="textarea" class="OwO-textarea comment-textarea textarea" required=""></textarea>
											</p>
											</div></div>
								<!-- 如果当前用户已经登录 -->
											<!-- 要求输入名字、邮箱、网址 -->
											<div class="container-fluid comment-input"><div class="row">
											<p class="col-md-4">
												<label for="author" class="required">称呼</label>
												<input type="text" name="author" id="author" class="text" placeholder="称呼" value="" required="">
											</p>
											<p class="col-md-4">
												<label for="mail" class="required"> Email</label>
												<input type="email" name="mail" id="mail" class="text" placeholder="邮箱" value="" required="">
											</p>
											<p class="col-md-4">
												<label for="qq"> qq</label>
												<input type="qq" name="qq" id="qq" class="text" placeholder="请输入您的QQ否则无法显示头像" value="">
											</p>
											</div>
											<p></p>
											<p class="comment-submit col-md-12">
												<button type="submit" class="submit">提交评论</button>
											</p>
											</div></div>
										</form>
									</div>
								<!-- 若当前文章不允许进行评论 -->
											</div>
									</div>
						</div>
					</ul>
				</div>
			</div>
			<?php require_once "./public/sidebar.php" ?>
		</article>
		<?php require_once "./public/footer.php"; ?>
		<?php require_once "./public/scrollTop.php"; ?>
	</body>

</html>