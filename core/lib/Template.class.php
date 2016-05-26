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
<<<<<<< HEAD
		$this->tpl->compile_dir = ROOT_PATH.'/config/Runtime';
		$this->tpl->caching = false;
		$t_prefix = C('T_SUFFIX');
		$t_suffix = C('T_PREFIX');
		!empty($t_prefix)?$this->tpl->left_delimiter = $t_prefix:'';
		!empty($t_prefix)?$this->tpl->right_delimiter = $t_prefix:'';
=======
		$this->tpl->compile_dir = ROOT_PATH.'/view/Runtime';
		$this->tpl->caching = false;
		$this->tpl->left_delimiter = C('T_PREFIX');
		$this->tpl->right_delimiter = C('T_SUFFIX');
>>>>>>> a87288146e8cc7f7edf4b98592696c2fae3495c9
	}
	public function assign($a,$b){
		$this->tpl->assign($a,$b);
	}
	public function display($a){
<<<<<<< HEAD
		$suffix = C('TEMPLATE_SUFFIX');
		!empty($suffix)?$this->tpl->display($a.$suffix):$this->tpl->display($a.'.html');
=======
		$this->tpl->display($a.C('TEMPLATE_SUFFIX'));
>>>>>>> a87288146e8cc7f7edf4b98592696c2fae3495c9
	}
}