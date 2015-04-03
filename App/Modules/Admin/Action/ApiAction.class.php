<?php
/**
 * 
 * @author clx
 *
 */
class ApiAction extends AdminAction {
	
	public function _initialize(){
		 
		parent::_initialize();
	}
    public function getMenueList(){
    	
    	$pid = I('get.pid',0,'intval');
    	$Menue = D('Menue');
    	$data = $Menue->getSubMenue($pid);
    	echo $Menue->getDbError();
    	$this->ajaxReturn($data,'data','1');
    }
}