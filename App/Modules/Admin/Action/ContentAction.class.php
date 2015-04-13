<?php
/**
 * 
 * @author clx
 *
 */
class ContentAction extends AdminAction {
	
	public function _initialize(){
		if(ACTION_NAME!=='index'){
			$Category = M('Category');
			$list = $Category ->order("listorder desc")->select();
			$tree = list_to_tree($list,'catid');
			$list = tree_to_list($tree);
			$this->assign('categoryList',$list);
		}
		parent::_initialize();
	}
    public function index(){
    	
    	$this->assign('systemInfo',$this->getSystemInfo());
    	$this->display('Index/index');
    }
    public function lis(){
    	
        $catid = I('get.catid',0,'intval');
        $mtable = $this->getModelInfo($catid);
        if($mtable == 'page'){
        	$Page = M('page');
        	$primarykey = $Page ->where('catid = '.$catid)->getField('id');
        	$this->redirect('content/edit',array('catid'=>$catid,'primarykey'=>$primarykey));
        }
        $where = "catid = $catid";
        $keyword = I('get.keyword','','trim');
        if($keyword){
        	$where .=" and title like '%$keyword%'";
        	$this->assign('keyword',$keyword);
        }
        $this->_list($mtable,$where);
        $this->assign('catid',$catid);
       
        $this->display();	
    }
    /**
     * 
     * 增加
     */
    
   public function add(){
    	if(IS_POST){    	
    		$table = I('post.mtable');
    		$_POST['listorder'] = M($table)->max('listorder')+1;
    		$_POST['create_time'] = $_POST['update_time'] =time();
    		
    		unset($_POST['mtable']);
    	    $this->_insert($_POST,$table);
    	}else{   	
    			
    		 $catid = I('get.catid',0,'intval');
    		 $this->assign('catid',$catid);
    	//获取有相同模型的栏目
    	     $Cate = M('Category');
    	     $catInfo = $Cate ->where('catid = '.$catid)->find();
    	     $alikeCate = $Cate ->where('mid = '.$catInfo['mid'])->order('listorder desc')->select(); 
    	     $tree = list_to_tree($alikeCate,'catid');
    	     $cateList = tree_to_list($tree);
    	//获取模型table
    	     $Model = M('Model');
    	     $mtable = $Model ->where('mid = '.$catInfo['mid'])->getField('mtable');
    	     $this->assign('cateList',$cateList);
    	     $this->assign('mtable',$mtable);
    	    
    		 $this->display($mtable.'_edit');
    	}  
    }
    /**
     * 编辑
     */
    
    public function edit(){
    	
    	if(IS_POST){
    		$data = $_POST;
    		$table = I('post.mtable');
    		unset($_POST['mtable']);
    		$_POST['update_time'] =time();
    		$this->_update($_POST,$table);
    	}else{
    		
    		$catid = I('get.catid',0,'intval');
    		//获取有相同模型的栏目
    		$Cate = M('Category');
    		$catInfo = $Cate ->where('catid = '.$catid)->find();
    		$alikeCate = $Cate ->where('mid = '.$catInfo['mid'])->order('listorder desc')->select();
    		$tree = list_to_tree($alikeCate,'catid');
    		$cateList = tree_to_list($tree);
    		//获取模型table
    		$Model = M('Model');
    		$mtable = $Model ->where('mid = '.$catInfo['mid'])->getField('mtable');
    		$this->assign('cateList',$cateList);
    		$this->assign('mtable',$mtable);
    		   		
    	    $this->assign('info',$this->read($mtable));    	     
    		$this->display($mtable.'_edit');   		
    	}
    }

    /**
     * 删除
     */
    public function del(){
    	
    	$catid = I('get.catid',0,'intval');
    	$table = $this->getModelInfo($catid);
    	$this->_delAll('',$table);
    	 
    }
    /**
     * 更改排序
     */
    public function listorder(){	
    
           if(IS_POST){
	    		$catid = I('get.catid',0,'intval');
	    		$table = $this->getModelInfo($catid);
	    		
	    		$Model = M($table);
	    		$listorderArr = I('post.listorder',array());
	    		$pk = $Model->getPk();
	    		foreach($listorderArr as $k=>$v){
	    			$Model->where("$pk = $k")->save(array('listorder'=>$v));
	    
	    		}
	    		
	    		$this->success('更新排序完成');
           }
    }
    private function getModelInfo($catid,$field="mtable"){
    	
    	$Cate = M('Category c');
    	$rst = $Cate ->field('c.*,m.mtable')->join('rj_model m on c.mid = m.mid')->where('c.catid = '.$catid)->find();
    	if($field == 'mtable'){
    		return $rst[$field]; 
    	}else{
    		return $rst;
    	}
    }
}