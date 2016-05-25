<?php
define(ROOT_PATH, dirname(dirname(__FILE__)));
require(ROOT_PATH.'/core/functions.php');
require(ROOT_PATH.'/core/extend/Smarty/Smarty.class.php');
require(ROOT_PATH.'/core/lib/Template.class.php');
// require(ROOT_PATH.'/core/lib/Db.class.php');
$url = URL_PATH();
$url_length = count($url);
if ($url_length == '0') {
	init('index');
}elseif($url_length == '1'){
	init($url[0]);
}elseif ($url_length == '2') {
	init($url[0],$url[1]);
}else{
	init($url[0],$url[1]);
	for ($i=2; $i <$url_length ; $i+2) { 
		$_GET[$url[$i]] = $url[$i+1];
	}
}