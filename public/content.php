
			<div class="blogs">

				<?php foreach($data as $k=>$c){  ?>
				<li> <span class="blogpic"><a href="article.php?art_id=<?php echo $c['art_id'] ?>"><img src="<?php echo $c['pic'] ?>"></a></span>
					<h3 class="blogtitle"><a href="article.php?art_id=<?php echo $c['art_id'] ?>"><?php echo $c['title'] ?></a></h3>
					<div class="bloginfo">
						<p><?php echo $c['des'] ?></p>
					</div>
					<div class="autor"><span class="lm"><a href="article.php?art_id=<?php echo $c['art_id'] ?>" title="<?php echo $c['tags'] ?>" target="_blank" class="classname"><?php echo $c['tags'] ?></a></span><span class="dtime"><?php echo date('Y-m-d',$c['add_time']); ?></span><span class="viewnum">浏览（<a href="/"><?php echo $c['pv'] ?></a>）</span><span class="readmore"><a href="article.php?art_id=<?php echo $c['art_id'] ?>">阅读原文</a></span></div>
				</li>
				<?php } ?>

				