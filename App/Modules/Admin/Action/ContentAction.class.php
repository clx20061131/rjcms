<?php
/**
 * 
 * @author clx
 *
 */
class ContentAction extends AdminAction {
	
	public function _initialize(){
		 
		parent::_initialize();
	}
    public function index(){
    	
    	$this->assign('systemInfo',$this->getSystemInfo());
    	$this->display('Index/index');
    }
}