<?php 
    //栏目列表
  	$sql="select catname,cat_id from cat";
    $cats=mGetAll($sql);

    //点击排行
    $sql="select art_id,title,pic,des from art order by pv desc LIMIT 3 ";
    $dian=mGetAll($sql);

    //最新发布
    $sql="select art_id,title,pic,des from art order by add_time desc LIMIT 3 ";
    $xin=mGetAll($sql);
?>
 <div class="sidebar">
   <div class="search">
      <form action="/e/search/index.php" method="post" name="searchform" id="searchform">
        <input name="keyboard" id="keyboard" class="input_text" value="请输入关键字" style="color: rgb(153, 153, 153);" onfocus="if(value=='请输入关键字'){this.style.color='#000';value=''}" onblur="if(value==''){this.style.color='#999';value='请输入关键字'}" type="text">
        <input name="show" value="title" type="hidden">
        <input name="tempid" value="1" type="hidden">
        <input name="tbname" value="news" type="hidden">
        <input name="Submit" class="input_submit" value="搜索" type="submit">
      </form>
    </div>
    <div class="lmnav">
      <h2 class="hometitle">栏目导航</h2>
      <ul class="navbor">
        <li><a href="about.php">关于我</a></li>
        <li><a href="share.php">图片赏析</a></li>
        <li><a href="#">博客栏目</a>
          <ul>
            <?php  foreach($cats as $c) { ?>
            <li><a href="list.php?cat_id=<?php echo $c['cat_id'] ?>"><?php echo $c['catname'] ?></a></li>
            <?php } ?>
          </ul>
        </li>
        <li><a href="list.php">学无止境</a></li>
        <li><a href="info.php">慢生活</a></li>
         <li><a href="https://www.zh66.club" >皮皮家园</a></li>
		<li><a href="http://blog.zh66.club">妙笔生花</a></li>
      </ul>
    </div>
   
   <div class="cloud">
      <h2 class="hometitle">标签云</h2>
      <ul>
        <a href="/">陌上花开</a> <a href="/">校园生活</a> <a href="/">php5</a> <a href="/">SumSung</a> <a href="/">青春</a> <a href="/">温暖</a> <a href="/">阳光</a> <a href="/">三星</a><a href="/">索尼</a> <a href="/">华维荣耀</a> <a href="/">三星</a> <a href="/">索尼</a><a href="/">校园生活</a> <a href="/">php5</a> <a href="/">SumSung</a> <a href="/">青春</a> <a href="/">温暖</a> <a href="/">阳光</a> <a href="/">三星</a><a href="/">索尼</a> <a href="/">华维荣耀</a> <a href="/">三星</a> <a href="/">索尼</a>
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
      <ul>
        <img src="images/wx.jpg">
      </ul>
    </div>
  </div>

