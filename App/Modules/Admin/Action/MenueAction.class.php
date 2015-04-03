<?php
/**
 * 
 * @author clx
 *
 */
class MenueAction extends AdminAction {
	
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
    	   $Menue = D('Menue');
    	   $data['title'] = I('post.title','','trim');
    	   $data['parame'] = I('post.parame','','trim');
    	   $topId = I('post.menueLevelTop','','intval');
    	   $leftTopId = I('post.menueLevel2','','intval');
    	   $data['modul_action'] = ucfirst(I('post.modul_action','','trim'));  
    	   $data['listorder'] = $this->_getMaxVal('listorder')+1;
    	   $data = array_merge($data,$Menue->getParentIds($topId,$leftTopId));     	
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
    		$data['modul_action'] = ucfirst(I('post.modul_action','','trim'));
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
    	if($Menue->canDel($id)){
    		 $Menue->delete($id);
    		 $this->success('删除成功');
    	}else{
    		$this->error('此菜单下面有子菜单,请删除子菜单后再执行此操作');
    	}
    }
}