<?php 

// /**
// *提示成功函数
// */
// function succ($str='成功'){
// 	$sign = 'succ';
// 	require PATH.'/view/admin/info.html';
// 	exit();
// }
// /**
// *提示失败函数
// */
// function error($str='失败'){
// 	$sign = 'error';
// 	require PATH.'/view/admin/info.html';
// 	exit();
// }

/**
*获取用户ip
*
*@return $ip 获取到的用户ip
*/

//获取客户端的真实IP地址.
function get_real_ip() {
	static $realip = NULL;
	if ($realip !== NULL) {
		return $realip;
	}
	if (isset($_SERVER)) {
		if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
			/* 取X-Forwarded-For中第一个非unknown的有效IP字符串 */
			foreach ($arr AS $ip) {
				$ip = trim($ip);
 
				if ($ip != 'unknown') {
					$realip = $ip;
 
					break;
				}
			}
		} elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
			$realip = $_SERVER['HTTP_CLIENT_IP'];
		} else {
			if (isset($_SERVER['REMOTE_ADDR'])) {
				$realip = $_SERVER['REMOTE_ADDR'];
			} else {
				$realip = '0.0.0.0';
			}
		}
	} else {
		if (getenv('HTTP_X_FORWARDED_FOR')) {
			$realip = getenv('HTTP_X_FORWARDED_FOR');
		} elseif (getenv('HTTP_CLIENT_IP')) {
			$realip = getenv('HTTP_CLIENT_IP');
		} else {
			$realip = getenv('REMOTE_ADDR');
		}
	}
	// 使用正则验证IP地址的有效性，防止伪造IP地址进行SQL注入攻击
	preg_match("/[\d\.]{7,15}/", $realip, $onlineip);
	$realip = !empty($onlineip[0]) ? $onlineip[0] : '0.0.0.0';
	return $realip;
 }
 
/**
*古之立大志，不惟有超世之才亦必有坚韧不拔之至！
*通过腾讯或者新浪提供的接口来获取(新浪和腾讯类似)
*获取ip地址所在的地理位置的实现
*
*@return $city 获取ip地址所在的地理位置的实现city
*/

function getCity($ip)
{
   $url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
//   print_r(file_get_contents($url));
   $ipinfo=json_decode(file_get_contents($url)); 
   if($ipinfo->code=='1'){
       return false;
   }
   $city = $ipinfo->data->region.$ipinfo->data->city;
   return $city; 
}


/**
*古之立大志，不惟有超世之才亦必有坚韧不拔之至！
*通过淘宝提供的接口获取ip地址所在的地理位置的实现
*
*@return $city 获取ip地址所在的地理位置的实现city
*/



/**
*获取客户端的操作系统类型
*
*@return $os 获取客户端的操作系统类型os
*/

function get_os(){
    $agent = $_SERVER['HTTP_USER_AGENT'];
        $os = false;
     
        if (preg_match('/win/i', $agent) && strpos($agent, '95'))
        {
          $os = 'Windows 95';
        }
        else if (preg_match('/win 9x/i', $agent) && strpos($agent, '4.90'))
        {
          $os = 'Windows ME';
        }
        else if (preg_match('/win/i', $agent) && preg_match('/98/i', $agent))
        {
          $os = 'Windows 98';
        }
        else if (preg_match('/win/i', $agent) && preg_match('/nt 6.0/i', $agent))
        {
          $os = 'Windows Vista';
        }
        else if (preg_match('/win/i', $agent) && preg_match('/nt 6.1/i', $agent))
        {
          $os = 'Windows 7';
        }
    	  else if (preg_match('/win/i', $agent) && preg_match('/nt 6.2/i', $agent))
        {
          $os = 'Windows 8';
        }else if(preg_match('/win/i', $agent) && preg_match('/nt 10.0/i', $agent))
        {
          $os = 'Windows 10';#添加win10判断
        }else if (preg_match('/win/i', $agent) && preg_match('/nt 5.1/i', $agent))
        {
          $os = 'Windows XP';
        }
        else if (preg_match('/win/i', $agent) && preg_match('/nt 5/i', $agent))
        {
          $os = 'Windows 2000';
        }
        else if (preg_match('/win/i', $agent) && preg_match('/nt/i', $agent))
        {
          $os = 'Windows NT';
        }
        else if (preg_match('/win/i', $agent) && preg_match('/32/i', $agent))
        {
          $os = 'Windows 32';
        }
        else if (preg_match('/linux/i', $agent))
        {
          $os = 'Linux';
        }
        else if (preg_match('/unix/i', $agent))
        {
          $os = 'Unix';
        }
        else if (preg_match('/sun/i', $agent) && preg_match('/os/i', $agent))
        {
          $os = 'SunOS';
        }
        else if (preg_match('/ibm/i', $agent) && preg_match('/os/i', $agent))
        {
          $os = 'IBM OS/2';
        }
        else if (preg_match('/Mac/i', $agent) && preg_match('/PC/i', $agent))
        {
          $os = 'Macintosh';
        }
        else if (preg_match('/PowerPC/i', $agent))
        {
          $os = 'PowerPC';
        }
        else if (preg_match('/AIX/i', $agent))
        {
          $os = 'AIX';
        }
        else if (preg_match('/HPUX/i', $agent))
        {
          $os = 'HPUX';
        }
        else if (preg_match('/NetBSD/i', $agent))
        {
          $os = 'NetBSD';
        }
        else if (preg_match('/BSD/i', $agent))
        {
          $os = 'BSD';
        }
        else if (preg_match('/OSF1/i', $agent))
        {
          $os = 'OSF1';
        }
        else if (preg_match('/IRIX/i', $agent))
        {
          $os = 'IRIX';
        }
        else if (preg_match('/FreeBSD/i', $agent))
        {
          $os = 'FreeBSD';
        }
        else if (preg_match('/teleport/i', $agent))
        {
          $os = 'teleport';
        }
        else if (preg_match('/flashget/i', $agent))
        {
          $os = 'flashget';
        }
        else if (preg_match('/webzip/i', $agent))
        {
          $os = 'webzip';
        }
        else if (preg_match('/offline/i', $agent))
        {
          $os = 'offline';
        }
        else
        {
          $os = 'Unknown';
        }
        return $os;  
    }

/**
*获取浏览器型号
*
*@return $browser 获取到的浏览器型号
*/

function get_browser_name(){
	// 函数:获取浏览器信息
	// 返回:浏览器名称
	if(empty($_SERVER['HTTP_USER_AGENT'])){
	 return 'robot！';
	}
	if( (false == strpos($_SERVER['HTTP_USER_AGENT'],'MSIE')) && (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident')!==FALSE) ){
	 return 'Internet Explorer 11.0';
	}
	if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 10.0')){
	 return 'Internet Explorer 10.0';
	}
	if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 9.0')){
	 return 'Internet Explorer 9.0';
	}
	if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 8.0')){
	 return 'Internet Explorer 8.0';
	}
	if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 7.0')){
	 return 'Internet Explorer 7.0';
	}
	if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 6.0')){
	 return 'Internet Explorer 6.0';
	}
	if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'Edge')){
	 return 'Edge';
	}
	if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'Firefox')){
	 return 'Firefox';
	}
	if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'QQBrowser')){
	 return 'QQBrowser';
	}
	if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'Chrome')){
	 return 'Chrome';
	}
	if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'Safari')){
	 return 'Safari';
	}
	if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'Opera')){
	 return 'Opera';
	}
	if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'360SE')){
	 return '360SE';
	}
	 //微信浏览器
	if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'MicroMessage')){
	 return 'MicroMessage';
	}
	
	//其他未知的 返回HTTP_USER_AGENT
	return $_SERVER['HTTP_USER_AGENT'];
	}


/**
*获取页码数,固定显示5个页码数
*
*@param $num 总文章数
*@param $cnt 每页显示几篇文章
*@param $curr  当前页面的页码数
*@return array $pages  获取到的页码数
*/

function getPage($num,$curr,$cnt=5){
	//总页码数
	$pagenum = ceil($num/$cnt);
	//最左边的页码数
	$left = max($curr-2,1);
	//最右边的页码数
	$right = min($left+4,$pagenum);
	//最左边的页码数
	$left = max($right-4,1);
	
	for ($i=$left; $i<=$right ; $i++) { 
		//$page[] = $i;
		$_GET['page'] = $i;
		$page[$i] = http_build_query($_GET);
		//$page = array(1=>'page=1')
	}
	return $page;
}

/**
*生成随机字符串
*
*@param  $length 随机字符串的长度
*@return $str 生成的随机字符串
*/

function randStr($length=6){
	$str = 'abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ23456789';
	$str = str_shuffle($str);
	return substr($str, 0,$length);
}


/**
*获取文件后缀(带点的)
*
*@param $filename 待截取的文件名
*@return $ext 获取到的文件后缀
*/

function getExt($filename){
	return $ext = strrchr($filename,'.');
}

/**
*按日期创建存储目录
*
*@return $path 创建好的存储目录
*/

function createDir(){
	$path = '/upload/'.date('Y/md');
	$abspath = PATH.$path;
	if(is_dir($abspath)||mkdir($abspath,0777,true)){
		return $path;
	}else{
		return false;
	}
}


/**
*生成缩略图
*
*@param $opath 原图的路径
*@param $swidth 缩略图的宽
*@param $sheight 缩略图的高
*@return $spath  缩略图的路径(相对)
*/

function makeThumb($opath,$swidth=200,$sheight=200){
	//缩略图的路径(相对)
	$spath = dirname($opath).'/'.randStr().getExt($opath);

	//获取原图的有效路径(绝对路径)
	$oabs = PATH.$opath;
	//获取目标图的有效路径(绝对路径)
	$dabs = PATH.$spath;

	//获取原图信息
	if(!list($owidth,$oheight,$otype) = getimagesize($oabs)){
		return 1 ;
	}
	$type = array(
		1=>'imagecreatefromgif',
		2=>'imagecreatefromjpeg',
		3=>'imagecreatefrompng',
		);
	if(!$func = $type[$otype]){
		return 2;
	}
	//获取大图资源
	$big = $func($oabs);
	//创建空白画布
	$bu = imagecreatetruecolor($swidth, $sheight);
	//创建画布底色
	$white = imagecolorallocate($bu, 255, 255, 255);
	//底色填充
	imagefill($bu, 1, 1, $white);

	//计算缩略比
	$rate = min($swidth/$owidth,$sheight/$oheight);

	//真正粘贴在小花布上的宽和高
	$rwidth = $owidth*$rate;
	$rheight = $oheight*$rate;

	imagecopyresampled($bu, $big, ($swidth-$rwidth)/2, ($sheight-$rheight)/2, 0, 0, 
		$rwidth, $rheight, $owidth, $oheight);

	//保存缩略图
	imagepng($bu,$dabs);

	//销毁画布资源
	imagedestroy($bu);
	imagedestroy($big);

	//返回缩略图的相对路径
	return $spath;

}


/**
*检测是否登录成功
*
*@return bool 成功返回true,失败false
*/

function checkCookie(){
	//return isset($_COOKIE['name']);
	//检测两个cookie是否都存在
	if(!isset($_COOKIE['name']) || !isset($_COOKIE['ccode'])){
		return false;
	}

	return ccode($_COOKIE['name']) === $_COOKIE['ccode']?true:false;
}


/**
*过滤非法字符
*
*@param $arr 要转义的数组
*@return $arr 转义之后的数组
*/

function _addslashes($arr){
	foreach ($arr as $k => $v) {
		if(is_string($v)){
			$arr[$k] = addslashes($v);
		}else if(is_array($v)){
			$arr[$k] = _addslashes($v);
		}
	}
	return $arr;
}


/**
*加密字符
*
*@param $str 要加密的字符
*@return $str 加密过后的字符
*/

function ccode($str){
	$cfg = require PATH.'/lib/config.php';
	return $str = md5($cfg['salt'].$str);
}



?>
<!-- 著作权归作者所有。
商业转载请联系作者获得授权，非商业转载请注明出处。
Mr.Zhang
链接：https://zh66.club
来源：さくら荘そのMr.Zhang

/***                              _
 *  _._ _..._ .-',     _.._(`))
 * '-. `     '  /-._.-'    ',/
 *    )         \            '.
 *   / _    _    |             \
 *  |  a    a    /              |
 *  \   .-.                     ;
 *   '-('' ).-'       ,'       ;
 *      '-;           |      .'
 *         \           \    /
 *         | 7  .__  _.-\   \
 *         | |  |  ``/  /`  /
 *        /,_|  |   /,_/   /
 *           /,_/      '`-'
 */ -->
