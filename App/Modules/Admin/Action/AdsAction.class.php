<?php
/**
 * 
 * @author clx
 *
 */
class AdsAction extends AdminAction {
	public $groupId = 2;
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
    	
    	$where = '1= 1';
    	$sortId = I('get.sortid',0,'intval');
    	if($sortId){
    		$where .='sort_id = '.$sortId;
    	}
    	$this->_list('ads',$where);
    	$sortList = M('sort')->where('group_id = '.$this->groupId)->select();
    	
    	$this->assign('sortList',$sortList);
    	$this->display();
    }
    /**
     * 
     * 增加
     */
    
   public function add(){
    	if(IS_POST){    	
    		$_POST['listorder'] = $this->_getMaxVal()+1;
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
    		$_POST['update_time'] = time();
    		$this->_update($data);
    	}else{
    		    		 
    	     $Sort = M('sort');
    	     $sortList = $Sort ->where('group_id = 2')->order('listorder desc')->select();
    	     $this->assign('sortList',$sortList);
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