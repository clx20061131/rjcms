<?php
/**
 * 
 * @author clx
 *
 */
class AdsAction extends AdminAction {
	
	public function _initialize(){
		parent::_initialize();
	}
    public function index(){
       
    	$this->redirect('lis');
    }
   /**
    * 列表
    */
    public function lis(){
    	
    	$Menue = D('Menue');
    	$list = $Menue ->getMenueList();
    	$this->assign('dataList',$list);
    	$this->display();
    }
    /**
     * 
     * 增加
     */
    
   public function add(){
    	if(IS_POST){    	
    	   $this->_insert($data);
    	}else{   		
    		
    		$Menue = D('Menue');
    		$topMenue = $Menue ->getMenueList(0);
    		$this->assign('topList',$topMenue);
    		$this->display();
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
    		
    		$info = $this->read();
    		$Menue = D('Menue');
    		$info['parentArr'] = $Menue->getPList($info['parent_ids']);
    		$this->assign('info',$info);
    		$this->display();
    	}
    }
    
    /**
     * 删除
     */
    public function del(){
    	
    	$Menue = D('Menue');
    	$id = I('get.primarykey');
    	
    }
}