<?php
class AdminModel extends Model {
	
	protected $_validate = array(

			array('uname', 'require', '用户名不能为空'),
			array('upass', 'require', '用户密码不能为空'),
		
	);
	//protected $_model;
	protected $_auto = array(
			array('create_time', 'time', self::MODEL_INSERT, 'function'), // 对create_time字段在增加的时候写入当前时间戳
	);
	/**
	 * 获取当前管理员信息
	 * 
	 * @param string $uid
	 */
	public function checkLogin(){
			   	
		$uid = session('admin.uid'); //当前用户信息
		if($uid){
			return $uid;
		}else{
			return false;
		}						
	}
	public function login($uname,$upass){
		
		 $condition['statsu'] = 1;
		 $condition['uname'] = $uname;
		 $rst = $this->where($condition)->find();
		 if($rst){
		 	 if($rst['upass'] != md5($upass)){
		 	 	  return 'PASSERROR';
		 	 }else{
		 	 	  return  $rst['id'];
		 	 }
		 }else{
		 	   return 'USERERROR';
		 }		
	}
	public function make_login_info($uid){
		
		 $info = $this->find($uid);
		 if($info){
		 	  $arr = array(
		 	  		'uid' => $info['id'],
		 	  		'uname' => $info['uname'],
		 	  		'unick' => $info['unick'],
		 	  		'role'  => $info['roleid'] 
		 	  );
		 	  session('admin',$arr);
		 	  $data['last_login_time'] = time();
		 	  $data['last_login_ip'] = get_client_ip();
		 	  $data['total_login_num'] = array('exp','total_login_num + 1');
		 	  $this->where('id = '.$uid)->save($data); //更新登录记录
		 	  return true;
		 }else{
		 	return false;
		 }		 
	}
	public function changePass($data){
		$data2['upass'] = md5($data['new_pass']);
		$where['upass'] = md5($data['old_pass']);
		$data2['id'] = $where['id'] =  session('admin.uid');
		if($this->where($where)->find()){
			$this->save($data2);
			return true;
		}else{
			return false;
		}
	}
	/**
	 * 退出登录
	 */
	public function logout(){
		
		session(null);
	}

}