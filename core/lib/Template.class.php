<?php
/**
* auther:xx
*/
class Template
{
	protected $tpl;
	function __construct(){
		$this->tpl = new Smarty();
		$this->tpl->template_dir = ROOT_PATH.'/view';
		$this->tpl->compile_dir = ROOT_PATH.'/config/Runtime';
		$this->tpl->caching = false;
		$t_prefix = C('T_SUFFIX');
		$t_suffix = C('T_PREFIX');
		!empty($t_prefix)?$this->tpl->left_delimiter = $t_prefix:'';
		!empty($t_prefix)?$this->tpl->right_delimiter = $t_prefix:'';
	}
	public function assign($a,$b){
		$this->tpl->assign($a,$b);
	}
	public function display($a){
		$suffix = C('TEMPLATE_SUFFIX');
		!empty($suffix)?$this->tpl->display($a.$suffix):$this->tpl->display($a.'.html');
	}
}