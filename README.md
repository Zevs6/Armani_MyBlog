# 开源项目：张帅个人博客

【实战】如何通过html+css+mysql+php来快速的制作动态网页（以制作一个博客网站为列）

为完成学校的期末课程设计，花了将近两个月闲暇之余，制作了一个简单的博客网站。下面我将这几天的操作流程来说一下，在原文末会贴上部分代码，也会给出下载链接。（闲复制代码麻烦的可以到下载地址这里直接下载 )

**GitHub下载:** [点击下载](https://github.com/zevs6)

**码云下载：**[点击下载]()

**codding下载：**[点击下载]()

**百度网盘：**[点击下载]()

**CSDN下载：**[点击下载]()

**我的博客网站地址**：http://myblog.zh66.club

**制作前景：**

想拥有一个自己独自开发的一个小型博客网站，能发布博文管理博文实现前台展示。

> 记住Armani_MyBlog /admin/lib/config.php修改里面数据库配置信息即可运行

### 本博客项目基本概述：

​         本项目使用php编写后台，前台功能基本完善，有顶部菜单和侧栏菜单底部菜单，支持首页展示功能，文章功能，文章包括列表显示和单篇文章显示功能，分页分类显示功能，友链添加功能，用户评论功能，相册功能，关于我页面，留言版功能，支持文章页下评论和已有评论的预览及引入QQ头像显示功能，用户未填写则默认显示，还有慢生活，包括扩展的更多功能，可登录后台，打赏作者，发送邮件功能（邮件可以发送），友情链接的显示，等待扩展功能，拥有后台结构编写完成，文章发布删除添加修改，评论区的删除审核，友链的添加删除审核，系统日志功能记录了每一条SQL语句，后台登录记录，数据库sql脚本文件已经放到根目录文件夹中。





### 主要开发流程简介

了解了动态网站的概念过后，我们作为开发者更多想到的就是如何具体开发一个动态网站应用程序，有那些具体的工作，流程是怎样的？

正常情况下，我们大概会有如下几个阶段：

需求分析：分析我们这个应用程序到底要去做哪些功能，应对哪些业务。

原型设计：根据需求分析的结果规划应用程序的原型，可以理解为“打草稿”。

UI 设计：将“草稿”转换为设计稿，并提供相应的产物（设计稿、静态页面）。

技术选型：根据业务场景分别选择对应的技术栈（数据库技术栈、后端技术栈、前端技术栈），一般考虑的因素：人、业务。

数据库设计：根据需求和原型分析我们有哪些类型的数据需要存，从而得到我们数据库的基本结构。

项目架构设计：俗称搭架构，其中具体的操作主要就是制定项目规范约束、创建基本的项目结构、编写基础的公共模块代码和组织代码。

业务迭代开发：开发者的日常，基于项目架构（条条框框）下完成各项业务功能。

集中测试：将所有功能模块整合到一起过后，集中测试业务功能是否有 BUG，是否满足需求。

部署上线：从开发环境向生产环境转换，就是把应用部署到服务器上。



### **开发环境的搭建**

  **（1）apache+php+mysql环境搭建**

因为要用apache来做服务器，mysql作为数据库来存储数据，php来写代码以此实现网页与数据库的交互数据，所以需要下载上述软件，但上述软件的安装环境、配置很麻烦，所以在这里用了一个功能强大的集成软件WampServer具体的安装方法可见链接（[点击打开链接](https://www.php.cn/xiazai/gongju/90)）



WampServer是Windos Apache Mysql PHP集成安装环境，即在window下的apache、php和mysql的服务器软件。PHP扩展、Apache模块，开启/关闭鼠标点点就搞定，再也不用亲自去修改配置文件了，WAMP它会去做。再也不用到处询问php的安装问题了，WAMP一切都搞定了。

![](https://cdn.jsdelivr.net/gh/Zevs6/blogimg2/img/58a16cd9bedf4239.png)

 当然，也有可能启动Apache时候出现错误，这里给出链接（[点击打开链接](https://www.zh66.club/2019/09/09/WampServer/)），如果apache启动有错误可以参考上面这个链接来解决问题。



**（2）数据库客户端软件Navicat **

直接在cmd命令控制台操作数据库并不方便，不够直白，当然也可以直接用phpmyadmin来操作（上述WampServer软件包安装之后在浏览器输入localhost/phpmyadmin/即可打开），但是phpmyadmin来操作也不方便，这里便采用Oracle公司出品的数据库客户端Navicat，这里还是给出链接（[点击打开链接](http://www.ddooo.com/softdown/20238.htm)），按照教程中的要求下载即可。

![](https://cdn.jsdelivr.net/gh/Zevs6/blogimg2/img/20191111193212.png)

  点击连接，输入连接名root，主机名和端口号都不用变，这里的用户名和密码。如果是你用的是WampServer，那么用户名是root，密码为空；如果不是用的是WampServer安装的，按照你设置的用户名和密码登录即可。填写完毕之后点击连接测试，没有问题直接确定即可连接好数据库。

![](https://cdn.jsdelivr.net/gh/Zevs6/blogimg2/img/20191111193625.png)

链接测试完成后，新建数据库名称为你的项目名称，最后要在admin配置文件中修改数据库连接名。上图10张表是博客后台数据存放的文章评论分类等内容，用户可以根据自己需求添加修改，里面有部分测试数据。



此外你要是想掌握数据库，简单来讲你想对数据库的任何操作，都必须操作sql语句，总的来说分为四个操作：增删改查。               

```
①增：向数据库写入数据

语句：insert into users (`username`,`password`) values ('name','passwd')

（ps新手一定要注意这离users这个数据表后面的``这个符号是在tab键上方的引号，而values后面的就是个单引号）

②删：删除已有数据

语句：delete from users WHERE id='3'

③改：修改数据

语句：update set users username='新值', password='新值' WHERE id=3

④查：从数据库读取数据

语句：select * from users where id>1 order by id desc limit 0,2

如果你想进一步深入的了解mysql语句的话，看一下这里的连接，（点击打开链接）连接给出了这四个操作的具体参数的详解，要想用数据库一定要掌握这四个操作。
```

 **（3）HTML+PHP网页的编写工具Visual Studio Code**

Visual studio code 版是一款免费开源的现代化轻量级代码编辑器，支持语法高亮、智能代码补全、自定义热键、括号匹配、代码片段、代码对比 Diff、GIT 等特性，Visual studio code针对网页开发和云端应用开发做了优化。

官网下载地址：[点击下载](https://code.visualstudio.com/)

![](https://cdn.jsdelivr.net/gh/Zevs6/blogimg2/img/1637794-35e1c24aee2e65c1.webp)

Visual Studio Code编辑器也集成了所有一款现代编辑器所应该具备的特性，包括语法高亮（syntax hight lighting），可定制的热键绑定（customizable keyboard bindings），括号匹配（bracket matching）以及代码片段收集（snippets）。Somasegar 也告诉笔者这款编辑器也拥有对 Git 的开箱即用的支持。运行非常快速。

Visual Studio Code 的快捷键设置是统一管理的，所以你只需要修改一个文件就可以了。我们先来看看 Visual Studio Code 的常用快捷键。



下面开发环境和开发软件，及数据库已准备完毕，我们就进入了博客的开发环节



### **博客网站的书写**

**1.总体框架**

首先在这里我先介绍一下我的总体框架，讲解一下，让大家先熟悉一下配置文件，好根据需求进行相关修改。

![](https://cdn.jsdelivr.net/gh/Zevs6/blogimg2/img/20191111195059.png)



- Armani_MyBlog 是项目的名字
- admin文件夹里面存储的是后台界面配置文件  
- bootstrap文件夹里面存储的是bootstrap框架
- css文件夹存储网页的样式文件  
- font文件夹是存储字体的相关文件
- images文件夹存放了网站中的图片
- js文件夹存储网站中的所以js引用文件
- log文件夹存储网站运行过程中的日志信息
- public文件夹里放着以下网页的公共部分代码
- Uploads文件夹是存储从本地上传到服务器的图片信息
- index.php文件是网站的首页
- about.php文件是关于我的个人介绍
- article.php文件是文章的浏览页面
- gbook.php文件是留言页面尚未开发
- info.php文件是慢生活页面讲述了
- link.php文件是友情链接展示页面
- list.php文件是文章的分类展示页面
- share.php文件是好图分享页面
- login.php文件是前台登录页面



后台页面将另行介绍，下面介绍一下博客中用到的几张数据库表

 数据库表中的设计在这里我给出如下代码，方便大家参考学习！



user这个表示用来存储后台管理员注册和登录的数据，即账户和密码：

```
CREATE TABLE `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `name` char(20) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '用户密码',
  `email` char(30) NOT NULL DEFAULT '' COMMENT '邮箱',
  `nick` char(20) NOT NULL DEFAULT '' COMMENT '昵称',
  `cal` char(11) NOT NULL DEFAULT '' COMMENT '电话',
  `created_at` datetime DEFAULT NULL COMMENT '注册时间',
  `updated_at` varchar(10) DEFAULT NULL COMMENT '最后一次登录时间',
  `login_ip` varchar(20) DEFAULT NULL COMMENT '最后登录的ip地址',
  `login_times` int(6) DEFAULT '0' COMMENT '登录次数',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
```

tag这个表示用来存放文章中的标签字段：

```
DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '标签id',
  `art_id` varchar(10) DEFAULT NULL COMMENT '文章id',
  `tag` varchar(10) DEFAULT NULL COMMENT '标签名称',
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
```

log这个表主要用来记录后台管理员的登录记录，登录时间，ip,用户名等信息

```
CREATE TABLE `log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '日志id',
  `user_name` varchar(15) DEFAULT NULL COMMENT '用户名' ,
  `ip` varchar(255) DEFAULT NULL COMMENT 'ip地址',
  `time` varchar(255) DEFAULT NULL COMMENT '登录时间',
  `browser` varchar(255) DEFAULT NULL COMMENT '浏览器型号',
  `os` varchar(255) DEFAULT NULL COMMENT '登陆系统',
  `adress` varchar(255) DEFAULT NULL COMMENT '登录地址',
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;
```

link这个表用于存放友情链接的字段信息

```
CREATE TABLE `link` (
  `link_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '友链id',
  `link_name` varchar(255) NOT NULL COMMENT '友链名称',
  `link_web` varchar(255) NOT NULL COMMENT '友链URL地址',
  `link_img` varchar(255) DEFAULT NULL COMMENT '友链头像',
  `link_des` varchar(255) DEFAULT NULL COMMENT '友链描述',
  `udit` int(1) DEFAULT '0',
  PRIMARY KEY (`link_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
```

comment这个表用于存放文章中的评论内容

```
CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '评论ID',
  `art_id` int(11) DEFAULT NULL COMMENT '文章id',
  `comm` varchar(255) DEFAULT NULL COMMENT '评论内容',
  `time` varchar(30) DEFAULT NULL COMMENT '评论时间',
  `ip` varchar(255) DEFAULT NULL COMMENT '评论ip',
  `author` varchar(255) DEFAULT NULL COMMENT '评论用户名',
  `email` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `qq` varchar(255) DEFAULT '3202025856' COMMENT '评论网址',
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
```

cat这个表用于存放文章的分类字段

```
CREATE TABLE `cat` (
  `cat_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `alias` varchar(10) DEFAULT NULL COMMENT '分类别名',
  `catname` char(30) NOT NULL DEFAULT '' COMMENT '分类名称',
  `num` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '文章数量',
  `keywords` varchar(50) DEFAULT NULL COMMENT '关键字',
  `des` varchar(50) DEFAULT NULL COMMENT '描述',
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
```

art这个表存放文章的内容描述图片标题

```
CREATE TABLE `art` (
  `art_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `cat_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文章分类id（cat表主键id）',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '文章标题',
  `contents` longtext COMMENT '文章内容',
  `tags` varchar(10) DEFAULT NULL COMMENT '标签',
  `keywords` varchar(255) DEFAULT NULL COMMENT '文章关键字',
  `des` varchar(255) DEFAULT NULL COMMENT '文章描述',
  `pv` int(10) NOT NULL DEFAULT '0' COMMENT '文章浏览量',
  `add_time` varchar(10) NOT NULL COMMENT '发表时间',
  `pic` varchar(255) DEFAULT NULL COMMENT '文章封面图片',
  PRIMARY KEY (`art_id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COMMENT='文章表';
```



 **2.网站后台admin的书写**

前面介绍了前台页面的总体框架，这里将详细介绍一下后台页面的总体框架

![](https://cdn.jsdelivr.net/gh/Zevs6/blogimg2/img/20191111201740.png)

其他文件和前台相同功能，这里我就不一一介绍了，主要讲一下lib文件夹中的数据库配置文件

![](https://cdn.jsdelivr.net/gh/Zevs6/blogimg2/img/20191111202048.png)

打开lib文件夹，我们可以看到这些文件，上述三个文件夹存放着文本编辑器的配置文件，下面介绍一下数据库文件配置内容，首先拿到项目，数据库文件导入数据库，服务器成功启动，这一步就是要修改config中的数据库连接命令了。文件存放路径：Armani_MyBlog /admin/lib/config.php

config.php

```
<?php 

return array(
	'host'=>'localhost',
	'user'=>'root',   //用户名
	'pwd'=>'DxzTEgf1NYOHsXsu',   //数据库连接密码
	'db'=>'zhangshuai',   //数据库名称
	'charset'=>'utf8',    //编码字符
	'salt' => 'bcd'
	);

?>

```



### 主要代码展示

（1）登录界面（login.php）**

![](https://cdn.jsdelivr.net/gh/Zevs6/blogimg2/img/20191111202909.png)

登录界面地址：[https://myblog.zh66.club/admin/login.php](https://myblog.zh66.club/admin/login.php)

主要代码如下：

login.php

```
<!doctype html>
<html>

	<head>
		<meta charset="utf-8">
		<title>张帅个人博客后台登录</title>
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet" />
		<link href="css/login.css" rel="stylesheet" />
	</head>

	<style>

	</style>

	<body id="body">
		<nav class="bg-canvas blur"><iframe name="htm" src="./a5.html" ></iframe></nav>
		<section class="cont">
			<section>
				<nav class="cont_left">
					<p><h1>博客后台管理系统登陆</h1></p>
				</nav>
				<form class="cont_right" action="login_check.php" method="post">
					<h2 align="center">平台登陆</h2>
					<div class="form-group">
						<p><i class="fa fa-user"></i><input type="text" class="form-control" id="inputEmail3" name="name" placeholder="请输入用户名"></p>
						<p><i class="fa fa-key"></i>
							<input type="password" class="form-control" id="exampleInputPassword3" name="password" placeholder="请输入密码">
							<input type="text" class="form-control" id="exampleInputPassword3" name="pwd" placeholder="请输入密码" style="display: none;">
							<a class="eye"><i class="fa fa-eye-slash"></i></a>
						</p>
					</div>
					<button type="submit" class="btn btn-primary btn-lg btn-block" >登陆</button>
				</form>
			</section>
		</section>
	</body>

	<script src="js/jquery-2.1.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		$(function() {

			$("#body").height($(window).height());

		})

		$(".eye").mouseover(function() {

			$("input[name=pwd]").val($("input[name=password]").val());

			$("input[name=password]").hide();

			$("input[name=pwd]").show().focus();

			$(".eye i").removeClass("fa-eye-slash");

			$(".eye i").addClass("fa-eye");

		});

		$(".eye").mouseout(function() {

			$("input[name=password]").val($("input[name=pwd]").val());

			$("input[name=password]").show().focus();

			$("input[name=pwd]").hide();

			$(".eye i").removeClass("fa-eye");

			$(".eye i").addClass("fa-eye-slash");

		})
	</script>
</html>


```

登录验证login_check.php

```
<?php
/**
 * 
 * 登录数据处理
 * 
 */
header("content-type:text/html;charset=utf-8");


require_once "./lib/init.php";



if(empty($_POST)){
    require_once "./login.php";
}else{
    //1-接收登录信息
    $name = trim($_POST['name']);
    $password = trim($_POST['password']);
    $sql = "select * from user where name='" . $name  . "' and password='" . $password . "'";
    $res= mGetRow($sql); 
    //判断用户名密码是否正确
    if(!$res){
        echo "<script>alert('用户名或密码错误，请重新输入！');window.location.href='login.php'</script>";
    }else{

        //登录记录log
        $ip=get_real_ip();
        $time=time();
        $browser=get_browser_name();
        $os=get_os();
        $adress=getCity($ip);
        $sql="insert into log (user_name,ip,time,browser,os,adress) values ('$name','$ip','$time','$browser','$os','$adress')";
        mQuery($sql);

        //记录用户表中的登录时间，IP，登录次数登
        $sql="update user set updated_at='$time',login_ip='$ip',login_times=login_times+1 where name='$name'";
        echo $sql;
        mQuery($sql);


        //设置cookie值
        setcookie('name' , $res['name'],time()+3600*2);
        header('Location:index.php');
    }

}

?>

```

