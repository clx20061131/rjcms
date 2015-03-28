<?php
// 本类由系统自动生成，仅供测试用途
class AdminAction extends Action {
	
  public function _initialize(){
  	 
  	  $Admin = D('Admin');
  	  if(!$Admin->checkLogin()){
  	  	
  	  	$this->error("请先登录",U('public/login'));
  	  }else{
  	  	//当前菜单
  	      	$m = MODULE_NAME;
		  	$a = ACTION_NAME;
		  	$Menue = D('Menue');
		  	$rst = $Menue -> actionMenue($m,$a);
		  	$topId = $rst['topAction'];
		  	$leftId = $rst['leftAction'];
		  	$this->assign('leftId',$leftId);
  	  	//生成菜单
  	  	  $menueList = $this->buildMenue();
  	  
  	  	  $this->assign('menueList',$menueList);
  	  	  $this->assign('leftMenue',$menueList['top'][$topId]['sub']);
  	  	  
  	  	// dump($menueList['top'][$topId]['sub']);exit;
  	 
  	  }
  	
  }
  /**
   * 生成菜单
   */
  public function buildMenue(){
  	
  	$Menue = D('Menue');
  	return $Menue ->buildMenue();
  }
  /**
   * 根据当前路由判断聚焦的菜单
   */
  private function _actionMenue(){
  	
  
  	$this->assign('topMenue',$rst['topAction']);
  	$this->assign('leftMenue',$rst['leftAction']);
  }

}