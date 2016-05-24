<?php
/**
* author:xx
*/
class Db
{
	private $sql = array(
		'field'	=>	'',
		'where'	=>	'',
		'order'	=>	'',
		'limit'	=>	'',
		'group'	=>	'',
		'having'=>	'',
		'set'	=>	'',
		'table'	=>	'',
	);

	function __construct($a)
	{
		$rhis->con = @mysql_connect(C('DB_ADDR'),C('DB_USER'),C('DB_PASS')) or die('无法连接数据库');
		mysql_select_db(C('DB_NAME'),$con);
		mysql_set_charset('utf8');
		$this->sql['table'] = $a;	
	}

	public function __call($m,$a){
		$m = strtolower($m);
		if (array_key_exists($m, $this->sql)) {
			$this->sql[$m] = strtoupper($m).' '.$a;
			return $this;
		}else{
			return "调用类".get_class($this)."中的方法".$m."()不存在";
		}
	}

	public function select(){
		$sql = "SELECT ".{$this->sql['field']}." FROM ".$this->sql['table']." ".$this->sql['where']." ".$this->sql['order']." ".$this->sql['limit']." ".$this->sql['group']." ".$this->sql['having'];
		return $this->mysql_q($sql);
	}

	public function insert($data){
		if (is_array($data)) {
			foreach ($data as $k=>$v){
				$key[] = '`'.$k.'`';
				$val[] = '"'.$v.'"';
			}
			$key = implode(',',$key);
			$val = implode(',',$val);
			$sql = "INSERT INTO `".$this->sql['table']."`($key) VALUES ($val)";
			return $this->mysql_q($sql,'insert');
		}else{
			return 'INSERT 参数非数组';
		}
	}

	public function update(){
		$sql = "UPDATE ".$this->sql['table']." ".$this->sql['where']." ".$this->sql['order']." ".$this->sql['limit'];
		return $this->mysql_q($sql,'update');
	}

	public function del(){
		$sql = "DELETE FROM ".$this->sql['table']." ".$this->sql['where']." ".$this->sql['order']." ".$this->sql['limit'];
		return $this->mysql_q($sql,'del');
	}

	public function mysql_q($sql,$type = 'SELECT'){
		$re = mysql_query($sql);
		if ($type == 'SELECT') {
			if (mysql_fetch_array($re)) {
				return false;
			}else{
				mysql_data_seek($re,0);
			}
			while ($row=mysql_fetch_array($re)) {
				$data[] = $row;
			}
			return $data;
		}else{
			return $re;
		}
		
	}

}