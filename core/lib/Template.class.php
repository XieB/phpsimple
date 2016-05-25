<?php
/**
* auther:xx
*/
class Template
{
	protected $tpl;
	function __construct(){
		$this->tpl = new Smarty();
		$this->tpl->templates = ROOT_PATH.'/view';
		$this->tpl->templates_c = ROOT_PATH.'/view/Runtime';
		$this->tpl->caching = false;
		$this->tpl->left_delimiter = C('T_PREFIX');
		$this->tpl->right_delimiter = C('T_SUFFIX');
	}
	public function assign($a,$b){
		$this->tpl->assign($a,$b);
	}
	public function display($a){
		$this->tpl->display($a.C('TEMPLATE_SUFFIX'));
	}
}