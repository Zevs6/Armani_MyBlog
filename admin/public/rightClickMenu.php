<!--右键菜单列表-->
		<div id="rightClickMenu">
			<ul class="list-group rightClickMenuList">
				<li class="list-group-item disabled">欢迎访问张帅个人博客</li>
				<li class="list-group-item"><span>IP：</span><?php echo  get_real_ip() ?></li>
				<li class="list-group-item"><span>地址：</span><?php echo  getCity(get_real_ip()) ?></li>
				<li class="list-group-item"><span>系统：</span><?php echo  get_os()  ?></li>
				<li class="list-group-item"><span>浏览器：</span><?php echo  get_browser_name()  ?></li>
			</ul>
		</div>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/admin-scripts.js"></script>