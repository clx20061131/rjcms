<?php
// 本类由系统自动生成，仅供测试用途
class EmptyAction extends HomeAction {
	
    public function index(){
      $m =  strtolower(MODULE_NAME);
      $a =  strtolower(ACTION_NAME);
      // 栏目列表
      	$keywords = $m.'/'.$a;
      	$Cate = M('category');
      	$cateInfo = $Cate ->where("keywords = '$keywords' ")->find();//dump($cateInfo);exit;
      	if($cateInfo){
      		$this->title = $cateInfo['catname'];
      		$this->assign('cateInfo',$cateInfo);
      		if($cateInfo['mid'] == 1){
      			//page 模型
      			$Model = M('page');
      			$info = $Model->where('catid = '.$cateInfo['catid'])->find();
      			$this->assign('info',$info);
      		}
      		$this->display('Content/list_'.$cateInfo['tpl_list']);
      	}else{
      		$this->redirect('/html/404');
      	}
     
      
     
    }
    public function show(){
    	$catid = I('get.catid',0,'intval');
    	$id = I('get.id',0,'intval');
    	$Cate = M('category');
    	$cateInfo = getModelByCatId($catid);
    	 
    	if($cateInfo){
    		$mtable = $cateInfo['mtable'];
    		$Model = M($mtable);
    		$info = $Model ->where("id = $id")->find();
    		//dump($info);exit;
    		if($info){
    			$this->title = $info['title'];
    			$this->assign('info',$info);
    			$this->display('Content/show_'.$cateInfo['tpl_show']);
    		}else{
    			$this->redirect('/html/404');
    		}
    	}else{
    		$this->redirect('/html/404');
    	}
    }
    
}