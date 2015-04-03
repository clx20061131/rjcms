<?php
/**
 * 
 * @author clx
 *
 */
class SortAction extends AdminAction {

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
    	$this->assign('groupArr',get_sort_group());
   		$this->_list('sort');
    	$this->display();
    }
    /**
     * 
     * 增加
     */
    
   public function add(){
    	if(IS_POST){  
    	   $data= $_POST;
    	   $data['listorder'] = $this->_getMaxVal('listorder')+1;
    	   $this->_insert($data);
    	   
    	}else{   				
    		$this->assign('groupArr',get_sort_group());
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
    		
    		$info = $this->read();
    		$this->assign('groupArr',get_sort_group());
    		$this->assign('info',$info);
    		$this->display();
    	}
    }
    
    /**
     * 删除
     */
    public function del(){
    	
    	$this->_delAll();
    	
    }
}