<?php
/**
* author:xx
*/
class Db
{
	public $con;
	public $where;
	public $set;
	public $table;
	public $limit;
	function __construct($a)
	{
		$rhis->con = @mysql_connect(C('DB_ADDR'),C('DB_USER'),C('DB_PASS')) or die('无法连接数据库');
		mysql_select_db(C('DB_NAME'),$con);
		mysql_set_charset('utf8');
		$this->table = $a;	
	}
	
	public function where($a){
		$this->where = $a;
		return $this;
	}

	public function set($a){
		$this->set = $a;
		return $this;
	}

	public function limit($a){
		$this->limit = "limit ".$a;
		return $this;
	}

	public function select($a == ''){
		if ($a == '') {
			$field = "*";
		}else{
			$field = $a;
		}
		$sql = "SELECT ".$field." FROM ".$this->table." ".$this->where." ".$this->limit;
		return mysql_q($sql);
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