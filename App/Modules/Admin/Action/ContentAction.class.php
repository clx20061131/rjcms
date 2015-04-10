<?php
/**
 * 
 * @author clx
 *
 */
class ContentAction extends AdminAction {
	
	public function _initialize(){
		
		$Category = M('Category');
		$list = $Category ->order("listorder desc")->select();
		$tree = list_to_tree($list,'catid');
		$list = tree_to_list($tree);
		$this->assign('cateList',$list);
		 
		parent::_initialize();
	}
    public function index(){
    	
    	$this->assign('systemInfo',$this->getSystemInfo());
    	$this->display('Index/index');
    }
    public function lis(){
    	
    	$Cate = M('Category');    	
    	$list = $Cate ->order("listorder desc")->select();
    	$tree = list_to_tree($list,'catid');
    	$list = tree_to_list($tree);
    	$this->assign('categoryList',$list);
        $this->display();	
    }
}