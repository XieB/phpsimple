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
		$this->assign('xx','xiexie');
		$this->display('index');
	}
	public function test(){
		D('index')->test();
	}
}