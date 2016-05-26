<?php
function C($a){
	$db = require(ROOT_PATH.'/config/config.php');
	return $db[$a];
}

function URL_PATH(){
	$re = explode('/',$_SERVER['PATH_INFO']);
	foreach ($re as $k => $v) {
		if (!empty($v)) {
			$data[] = $v;
		}
	}
	return $data;
}

function xxautoload($classname){
	$classpath = ROOT_PATH.'/controller/'.$classname.'.php';
	$modelpath = ROOT_PATH.'/model/'.$classname.'.php';
	if (file_exists($classpath)) {
		require_once($classpath);
	}elseif (file_exists($modelpath)) {
		require_once($modelpath);
	}else{
		echo '无法实例化需要的类';
		return false;
	}
}

function init($controller = 'index',$method = 'index'){
	$con = strtolower($controller);
	$method = strtolower($method);
	$con = ucwords($con);
	$con = $con.'Action';
	$init = new $con();
	$init->$method();
}

function M($a){
	return new Db($a);
}
function D($a){
	$m = strtolower($a);
	$m = ucwords($m);
	$m = $m.'Model';
	return new $m;
}