<?php
/**
* 
*/
class Index extends Template
{
	function __construct()
	{
		parent::__construct();
	}
	public function index(){
		$this->assign('xx','xiexie');
		$this->display('index');
	}
}