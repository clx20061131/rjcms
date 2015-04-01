<?php
// 本类由系统自动生成，仅供测试用途
class AdminAction extends Action {
  public  $URL;
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
		  	$this->assign('topId',$topId);
  	  	//生成菜单
  	  	  $menueList = $this->buildMenue();
  	  	  $this->assign('menueList',$menueList);
  	  	  $this->assign('leftMenue',$menueList[$topId]['sub']);
        
  	  }
  	
  }
  public function _befor_list(){
      
  	$this->URL = cookie("__CURL__",__SELF__);
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
/**
 * 获取系统信息
 *
 * @return array
 */
	function getSystemInfo()
	{
		 $systemInfo = array();
		 
		 // 系统
		 $systemInfo['os'] = PHP_OS;
		 
		 // PHP版本
		 $systemInfo['phpversion'] = PHP_VERSION;
		 
		 // Apache版本
		 $systemInfo['apacheversion'] = apache_get_version();
		 
		 // ZEND版本
		 $systemInfo['zendversion'] = zend_version();
		 
		 // GD相关
		 if (function_exists('gd_info'))
		 {
		  $gdInfo = gd_info();
		  $systemInfo['gdsupport'] = true;
		  $systemInfo['gdversion'] = $gdInfo['GD Version'];
		 }
		 else
		 {
		  $systemInfo['gdsupport'] = false;
		  $systemInfo['gdversion'] = '';
		 }
		 
		 // 安全模式
		 $systemInfo['safemode'] = ini_get('safe_mode');
		 
		 // 注册全局变量
		 $systemInfo['registerglobals'] = ini_get('register_globals');
		 
		 // 开启魔术引用
		 $systemInfo['magicquotes'] = (function_exists("get_magic_quotes_gpc") && get_magic_quotes_gpc());
		 
		 // 最大上传文件大小
		 $systemInfo['maxuploadfile'] = ini_get('upload_max_filesize');
		 
		 // 脚本运行占用最大内存
		 $systemInfo['memorylimit'] = get_cfg_var("memory_limit") ? get_cfg_var("memory_limit") : '-';
		 
		 return $systemInfo;
	}
	/**
	 * 添加数据
	 */
	public function add(){
		
		if(IS_POST){
			
			$this->insert($data);
		}else{
					 
			 $this->display();
		}
	}
  protected function _insert($data){
  	
  	$Model = D($this->getActionName());
  	if($Model->create($data)){
  			
  		if($Model->add()){
  			$this->success('添加成功',$this->URL);
  		}else{
  			$this->error('添加失败'.$Model ->getError());
  		}
  			
  	}else{
  		$this->error($Model ->getError());
  	}
  } 
  public function read(){
  	
  	    $Model = M($this->getActionName());
  		$pkVal = I('request.primarykey','0','intval');
  		return $Model->find($pkVal);
  	
  }
  public function edit(){
  	if(IS_POST){
  		
  		$this->_update();
  	}else{
  		
  		$this->assign('info',$this->read());
  		$this->display();
  	}
  	
  }
  protected  function _update(){
  	
  	$Model = D($this->getActionName());
  	if($Model->create()){
  		if($Model->save()!==false){
  	
  			$this->success('更新成功',$this->URL);
  		}else{
  			$this->error('更新失败'.$Model ->getError());
  		}
  	}else{
  		$this->error($Model ->getError());
  	}
  }
  /**
   * 获取最大的值
   */
  protected function _getMaxVal($field){
  	
  	$Model = M($this->getActionName());
  	$val = $Model ->max($field);
  	if($val!==false){
  		return $val;
  	}else{
  		exit('不存在字段'.$field);
  	}
  }
}