<?php
// 本类由系统自动生成，仅供测试用途
class AdminAction extends Action {
	
  public function _initialize(){
  	 
  	  $Admin = D('Admin');
  	  if(!$Admin->checkLogin()){
  	  	
  	  	$this->error("请先登录",U('public/login'));
  	  }else{
  	  	//生成菜单
  	  	  $menueList = $this->buildMenue();
  	  	  $this->assign('menueList',$menueList);
  	  	//生成权限
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
  	
  	$m = MODULE_NAME;
  	$a = ACTION_NAME;
  	
  }

}