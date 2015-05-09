<?php
// 本类由系统自动生成，仅供测试用途
class HomeAction extends Action {
	
  public function _initialize(){
  	$this->_seo();
  }
  protected function _seo(){
  	
  	$Web = M('web');
  	$seo = $Web ->find();
  	$this->assign('seo',$seo);
  }
}