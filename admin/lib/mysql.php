<?php 

/**
 * mysql.php mysql命令操作函数封装
 * @author zhangshuai
 * @since 2019.10.31
 */


/**
*连接数据库
*
*@return $link 连接好数据库的通道
*/

function mConn(){
	static $link = null;
	if($link == null){
		$cfg = require PATH.'/lib/config.php';
		$link = mysqli_connect($cfg['host'],$cfg['user'],$cfg['pwd'],$cfg['db']);
		mysqli_query($link,'set names '.$cfg['charset']);
	}
	return $link;
}

/**
*执行sql语句
*
*@param $sql 待执行的sql语句
*@return $res mixed 执行添加或删除或修改的时候,成功返回true,执行查询语句时,成功返回(结果型)对象,
*失败统一返回false
*/

function mQuery($sql){
	//return $res = mysqli_query(mConn(),$sql);
	$link = mConn();
	$res = mysqli_query($link,$sql);
	if(!$res){
		mLog($sql."\n".mysqli_error($link));
		return false;
	}else{
		mLog($sql);
		return $res;
	}
}

/**
*记录日志
*
*@param $sql 带记录的sql语句
*/
function mLog($sql){
	$filename = PATH.'/log/'.date('Ymd').'.txt';
	$data = '-----------------------------------'."\n".date('Y-m-d H:i:s')."\n".
	$sql."\n".'-----------------------------------'."\n\n\n";
	file_put_contents($filename, $data,FILE_APPEND);
}

/**
*取出所有行(数据)
*
*@param $sql 待执行的查询(sql)语句
*@return $data mixed array  二维数组.存储了某张表里所有的数据
*/

function mGetAll($sql){
	$res = mQuery($sql);
	if(!$res){
		return false;
	}
	$data = array();
	while($row = mysqli_fetch_assoc($res)){
		$data[] = $row;
	}
	return $data;
}





/**
*取出一行数据
*
*@param $sql 待执行的查询语句
*@return mixed $row 执行成功返回以为数组,失败返回false
*/
function mGetRow($sql){
	$res = mQuery($sql);
	return $row = $res?mysqli_fetch_assoc($res):false;
}

/**
*获取一行数据的第一个单元
*
*@param $sql 待执行的sql语句
*@return mixed 一行数据的第一个单元
*/
function mGetOne($sql){
	$res = mQuery($sql);
	return $row = $res?mysqli_fetch_row($res)[0]:false;
}

/**
*执行添加和修改操作
*
*@param $act 添加或修改操作,默认是添加
*@param $table 待操作的表名
*@param $data  array 字段名(列名)作为键,添加(修改)的值作为数组的值
*@param $where 修改的限制条件,默认值为0
*@return bool 成功返回true,失败返回false
*/
function mExec($table,$data,$act='insert',$where=0){
	if($act == 'insert'){
		$sql="insert into $table (";
		$sql.=implode(',',array_keys($data)).") values ('";
		$sql .=implode("','", array_values($data))."')";
		$res = mQuery($sql);
		return $res;
	}else if($act == 'update'){
		$sql = "update $table set ";
		foreach ($data as $k => $v) {
			$sql .= $k."='".$v."',";			
		}
		$sql = rtrim($sql,',').' where '.$where;
		$res = mQuery($sql);
		return $res;
	}
}


/**
 * 取得上一步insert操作产生的主键id
 */



?>
