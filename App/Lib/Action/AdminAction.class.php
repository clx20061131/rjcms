<?php
// 本类由系统自动生成，仅供测试用途
class AdminAction extends Action {
	
  public function _initialize(){
  	 
  	  $Admin = D('Admin');
  	  if(!$Admin->checkLogin()){
  	  	
  	  	$this->error("请先登录",U('public/login'));
  	  }
  	
  }
 
  
}