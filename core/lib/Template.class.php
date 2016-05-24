<?php
/**
* auther:xx
*/
class Template
{
	protected $tpl;
	public function assign($a,$b){
		$this->tpl = new Smarty();

		$this->tpl->assign($a,$b);
	}
	public function display($a){
		$this->tpl->display($a.C('TEMPLATE_SUFFIX'));
	}
}