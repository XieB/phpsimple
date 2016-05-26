<?php
/**
* 
*/
class TestAction extends CommonAction
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function index(){
		$this->assign('a','xx');
	}
}