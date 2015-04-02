<?php
/**
 * 
 * @author clx
 *
 */
class IndexAction extends AdminAction {
	
	public function _initialize(){
		 
		parent::_initialize();
	}
    public function index(){
    	
    	$this->assign('systemInfo',$this->getSystemInfo());
    	$this->display();
    }
    /**
     * 昵称修改
     */
    public function edit_nick(){
    	
    	if(IS_POST){
    		$data['unick'] = I('post.unick','','trim');if(!$data['unick'])$this->error('昵称不能为空');
    		$data['id'] = session('admin.uid');
    		$this->_update($data,'admin');
    	}else{
    		$info = $this->_uinfo();
    		$this->assign('info',$info);
    		$this->display();
    	}
    }
    /**
     * 密码修改
     */
    public function  edit_pass(){
    	
    	if(IS_POST){
            $data['old_pass'] = I('post.old_pass');
            $data['new_pass'] = I('post.new_pass');
            $data['re_new_pass'] = I('post.re_new_pass');
            if($data['new_pass'] !== $data['re_new_pass'])$this->error('您输入的两次密码不一致');
            $Admin = D('Admin');
    		if($Admin->changePass($_POST)){
    			
    			$Admin->logout();
    			$this->success('您修改密码成功，请重新登录');
    		}else{
    			$this->success('您输入的原始密码错误，请重新输入');
    		}
    	}else{
    		$info = $this->_uinfo();
    		$this->assign('info',$info);
    		$this->display();
    	}
    	
    }
    /**
     * 网站优化
     */
    public function web_seo(){
    	if(IS_POST){
    		
    		 $this->_update($_POST,'web');
    		
    	}else{
    		$Web = M('Web');
    		$this->assign('info',$Web ->where('id = 1')->find());
    		$this->display();
    	}
    	
    }
}