<?php
/**
 * 
 * @author clx
 *
 */
class ModulesAction extends AdminAction {
	
	public function _initialize(){
		 
		parent::_initialize();
	}
    public function index(){
    	
    	$this->assign('systemInfo',$this->getSystemInfo());
    	$this->display('Index/index');
    }
}