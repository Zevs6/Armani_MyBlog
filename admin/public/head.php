<header>
				<nav class="navbar navbar-default navbar-fixed-top">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">切换导航</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
							<a class="navbar-brand" href="index.php">zhangshuai</a>
						</div>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
								<li>
									<a href="">消息 <span class="badge">1</span></a>
								</li>
								<li class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">admin <span class="caret"></span></a>
									<ul class="dropdown-menu dropdown-menu-left">
										<li>
											<a title="查看或修改个人信息" data-toggle="modal" data-target="#seeUserInfo">个人信息</a>
										</li>
										<li>
											<a title="查看您的登录记录" data-toggle="modal" data-target="#seeUserLoginlog">登录记录</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="loginout.php" onClick="if(!confirm('是否确认退出？'))return false; ">退出登录</a>
								</li>
								<li>
									<a data-toggle="modal" data-target="#WeChat">帮助</a>
								</li>
							</ul>
							<form action="" method="post" class="navbar-form navbar-right" role="search">
								<div class="input-group">
									<input type="text" class="form-control" autocomplete="off" placeholder="键入关键字搜索" maxlength="15">
									<span class="input-group-btn">
									<button class="btn btn-default" type="submit">搜索</button>
									</span> 
								</div>
							</form>
						</div>
					</div>
				</nav>
			</header>