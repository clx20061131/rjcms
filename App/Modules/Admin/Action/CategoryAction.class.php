<?php
/**
 * 
 * @author clx
 *
 */
class CategoryAction extends AdminAction {
	
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
    	
       $Category = M('Category');
       $list = $Category ->order("listorder desc")->select();
       $tree = list_to_tree($list,'catid'); 	
       $list = tree_to_list($tree);
       $this->assign('dataList',$list);
       $this->display();
    }
    /**
     * 
     * 增加
     */
    
   public function add(){
    	if(IS_POST){    	
    		$data= I('post.');
    		$data['listorder'] = $this->_getMaxVal()+1;  		
    	    $this->_insert($data);
    		
       
    	}else{   		
    		
    	   $Category = M('Category');
	       $list = $Category ->order("listorder desc")->select();
	       $tree = list_to_tree($list,'catid'); 	
	       $list = tree_to_list($tree);
	       $this->assign('cateList',$list);	       
	       $this->assign('modelList',M('model') ->select()); //模型列表
    	   $this->display('edit');
    	}  
    }
    /**
     * 编辑
     */
    
    public function edit(){
    	
    	if(IS_POST){
    		$data = $_POST;
    		$_POST['update_time'] = time();
    		$this->_update($data);
    	}else{
    		    		 
	    	 $Category = M('Category');
	    	 $list = $Category ->order("listorder desc")->select();
	    	 $tree = list_to_tree($list,'catid');
	    	 $list = tree_to_list($tree);
	    	 $this->assign('cateList',$list);
    		
    	     $this->assign('info',$this->read());    	     
    	     
    	     $this->assign('modelList',M('model') ->select()); //模型列表
    		 $this->display('edit');   		
    	}
    }
    
    /**
     * 删除
     */
    public function del(){
    	
    	
    	$this->_delAll();
    }
}