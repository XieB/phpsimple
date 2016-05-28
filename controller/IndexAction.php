<?php
/**
* 
*/
class IndexAction extends CommonAction
{
	function __construct()
	{
		parent::__construct();
	}
	public function index(){
		$re = M('ip_info')->field('ip')->select();
		print_r($re);
		$this->assign('xx','xiexie');
		$this->display('index');
	}
}