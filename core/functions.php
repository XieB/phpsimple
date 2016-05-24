<?php
function C($a){
	$db = require(ROOT_PATH.'/config/config.php');
	return $db[$a];
}