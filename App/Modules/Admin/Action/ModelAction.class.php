<?php
/**
 * 
 * @author clx
 *
 */
class ModelAction extends AdminAction {
	
	public function _initialize(){
		 
		parent::_initialize();
	}
    public function index(){
    	
    	$this->redirect('lis');
    }
    public function lis(){
    	
    	$this->_list('model','1=1','mid desc');
    	$this->display();    	
    }
    /**
     *
     * 增加
     */
    
    public function add(){
    	if(IS_POST){
    		$_POST['create_time'] = $_POST['update_time'] = time();
    		$this->_insert($data);
    	}else{
    
    		$Sort = M('sort');
    		$sortList = $Sort ->where('group_id = 2')->order('listorder desc')->select();
    		$this->assign('sortList',$sortList);
    		$this->display('edit');
    	}
    }
    /**
     * 编辑
     */
    
    public function edit(){
    	 
    	if(IS_POST){
    		$data = $_POST;
    		$this->_update($data);
    	}else{
    		 
    		$this->assign('info',$this->read());
    		$this->display('edit');
    	}
    }
    
    /**
     * 删除
     */
    public function del(){
    	 
    	$Menue = D('ads');
    	$id = I('get.primarykey');
    	 
    }
}