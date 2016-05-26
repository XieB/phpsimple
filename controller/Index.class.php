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
		echo 'i am index method1';
		exit;
	}
}