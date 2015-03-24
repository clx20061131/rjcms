<?php
// 本类由系统自动生成，仅供测试用途
class PublicAction extends Action {
	

    public function login(){
    	
    	 if(session('admin.uid')){
    	  	
    	  	$this->success('您已成功登录',U('index/index'));
    	  }else{
    	  	 
    	  	 if(IS_POST){
    	  	 	
    	  	 	$Admin = D('Admin');
    	  	 	$uname = I('post.uname','','trim');if(!$uname)$this->error('用户名不能为空');
    	  	 	$upass = I('post.upass','','trim');if(!$upass)$this->error('密码不能为空');
    	  	 	$rst = $Admin->login($uname,$upass);
    	  	 	switch($rst){
    	  	 		case 'PASSERROR':
    	  	 			$this->error('密码错误');
    	  	 			break;
    	  	 	    case 'USERERROR':
    	  	 	    	$this->error('用户名错误');
    	  	 			break;
    	  	 	    default:
    	  	 	    	$uid = intval($rst);
    	  	 	    	if($Admin->make_login_info($uid)){
    	  	 	    		
    	  	 	    		$this->success('登录成功');
    	  	 	    	}else{
    	  	 	    		$this->error('登陆失败');
    	  	 	    	}
    	  	 	}
    	  	 }else{
    	  	 	
    	  	 	$this->display();
    	  	 }  	
    	  } 	
    }
    /**
     * 退出登录
     */
    public function logout(){
    	
    	$Admin = D('Admin');
    	$Admin ->logout();
    	$this->success('成功退出',U('public/login'));
    }
}