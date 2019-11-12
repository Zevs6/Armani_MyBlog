<?php
/**
 * 数据库访问类
 */
class Db{
	private $where = array();
	private $field = '*';
	private $order = '';
	private $limit = 0;
	private $pdo = null;

	public function __construct(){
		$dsn = 'mysql:host=localhost;dbname=myblog';   //数据库名
		$username = 'root';     //用户名
		$pwd = '';         //密码
		$this->pdo = new PDO($dsn,$username,$pwd);
	}

	// 指定表名称
	public function table($table){
		$this->table = $table;
		return $this;
	}

	// 指定查询字段
	public function field($field){
		$this->field = $field;
		return $this;
	}

	// 指定排序条件
	public function order($order){
		$this->order = $order;
		return $this;
	}

	// 指定查询数量
	public function limit($limit){
		$this->limit = $limit;
		return $this;
	}

	// 指定where条件
	public function where($where){
		$this->where = $where;
		return $this;
	}

	// 返回一条数据记录
	public function item(){
		$sql = $this->_build_sql('select').' limit 1';
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return isset($res[0]) ? $res[0] : false;
	}

	// 返回多条数据记录
	public function lists(){
		$sql = $this->_build_sql('select');
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	// 查询数据总数
	public function count(){
		$sql = $this->_build_sql('count');
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		$total = $stmt->fetchColumn(0);
		return $total;
	}

	// 分页
	public function pages($page,$pageSize = 10,$path = '/'){
		$count = $this->count();
		$this->limit = ($page - 1) * $pageSize .','.$pageSize;
		$data = $this->lists();
		$pages = $this->_subPages($page,$pageSize,$count,$path);
		return array('total'=>$count,'data'=>$data,'pages'=>$pages);
	}

	// 生成分页html(bootstrap风格)；cur_page：当前第几页，pageSize:每页大小，total:数据总数
	private function _subPages($cur_page,$pageSize,$total,$path){
		$symbol = '?';
		$index = strpos($path,'?');
		if($index!==false && $index>0){
			$symbol = '&';
		}

		// 分页数，向上取整
		$html = '';
		$page_count = ceil($total/$pageSize);
		// 生成首页,生成上一页
		if($cur_page>1){
			$html .= "<li><a href='{$path}{$symbol}page=1'>首页</a></li>";
			$pre_page = $cur_page -1;
			$html .= "<li><a href='{$path}{$symbol}page={$pre_page}'>上一页</a></li>";
		}

		// 生成数字页
		$start = $cur_page > ($page_count - 6) ? ($page_count - 6) :$cur_page;
		$start = $start - 2;
		$start = $start<=0?1:$start;
		$end = ($cur_page+6) > $page_count ? $page_count : ($cur_page+6);
		$end = $end-2;
		if($cur_page+2>=$end && $page_count>6){
			$start = $start + 2;
			$end = $end+2;
		}

		for($i=$start;$i<=$end;$i++){
			$html .= $i==$cur_page?"<li class='active'><a>{$i}</a></li>" : "<li><a href='{$path}{$symbol}page={$i}'>{$i}</a></li>";
		}
		// 生成下一页,生成尾页
		if($cur_page<$page_count){
			$after_page = $cur_page+1;
			$html .= "<li><a href='{$path}{$symbol}page={$after_page}'>下一页</a></li>";
			$html .= "<li><a href='{$path}{$symbol}page={$page_count}'>尾页</a></li>";
		}

		$html = '<nav aria-label="Page navigation"><ul class="pagination">'.$html.'</ul></nav>';
		
		/*$num = 6;
		$start=$cur_page-(int)($num/2);
		$start = $start>0 ? $start : 1;
		if($start>$page_count-$num+1){
			$start= $page_count-$num+1;
		} 
		for ($i=1; $i <= min($page_count, $num); $i++) { 
 			$html .= "<li ".($start==$cur_page ? 'class="active"':'').'><a '.($start==$cur_page ? :"href='{$path}{$symbol}page={$start}'").">{$start}</a></li>";
 			$start++;
		}
		// 生成下一页,生成尾页
		if($cur_page<$page_count){
			$after_page = $cur_page+1;
			$html .= "<li><a href='{$path}{$symbol}page={$after_page}'>下一页</a></li>";
			$html .= "<li><a href='{$path}{$symbol}page={$page_count}'>尾页</a></li>";
		}

		$html = '<nav aria-label="Page navigation"><ul class="pagination">'.$html.'</ul></nav>';
		*/
		return $html;
	}

	// 添加数据
	public function insert($data){
		$sql = $this->_build_sql('insert',$data);
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		return $this->pdo->lastInsertId();
	}

	// 删除数据并返回受影响的行数
	public function delete(){
		$sql = $this->_build_sql('delete');
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		return $stmt->rowCount();
	}

	// 更新数据
	public function update($data){
		//$sql = "update article set title='数据库更新' where id=21"
		$sql = $this->_build_sql('update',$data);
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		return $stmt->rowCount();
	}

	// 构造sql语句
	private function _build_sql($type,$data=null){
		$sql = '';
		// 查询
		if($type=='select'){
			$where = $this->_build_where();
			$sql = "select {$this->field} from {$this->table} {$where}";
			if($this->order){
				$sql .= " order by {$this->order}";
			}
			if($this->limit){
				$sql .=" limit {$this->limit}";
			}
		}
		// count
		if($type == 'count'){
			$where = $this->_build_where();
			$field_list = explode(',',$this->field);
			$field = count($field_list)>1 ? '*' : $this->field;
			$sql = "select count({$field}) from {$this->table} {$where}";
		}

		// 添加
		if($type=='insert'){
			//$sql = "insert into article(uid,cid,title,pv)values(2,3,'数据库添加',8)";
			$sql = "insert into {$this->table}";
			$fields = $values = [];
			foreach ($data as $key => $val) {
				$fields[] = $key;
				$values[] = is_string($val) ? "'".$val."'" : $val;
			}
			$sql .= "(".implode(',', $fields).")values(".implode(',', $values).")";
		}
		// 删除
		if($type == 'delete'){
			$where = $this->_build_where();
			$sql = "delete from {$this->table} {$where}";
		}
		// 更新
		if($type == 'update'){
			// 生成where条件
			$where = $this->_build_where();
			// 生成set
			$str = '';
			foreach ($data as $key => $val) {
				$val = is_string($val) ? "'".$val."'" : $val;
				$str .= "{$key}={$val},";
			}
			$str = rtrim($str,',');
			$str = $str?" set {$str}":'';
			$sql = "update {$this->table} {$str} {$where}";
		}
		return $sql;
	}

	// 组装where条件字符串
	private function _build_where(){
		$where = '';
		if(is_array($this->where)){	// 数组方式
			foreach ($this->where as $key => $value) {
				// value如果是字符串，给value两边加'','value'
				$value = is_string($value) ? "'".$value."'" : $value;
				$where .= "`{$key}`={$value} and ";
			}
		}else{	// 字符串方式
			$where = $this->where;
		}
		$where = rtrim($where,'and ');
		$where = $where==''?'':"where {$where}";
		return $where;
	}
}