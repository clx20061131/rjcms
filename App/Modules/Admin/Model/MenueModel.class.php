<?php
class MenueModel extends Model {
	
	protected $_validate = array(

			array('uname', 'require', '用户名不能为空'),
			array('upass', 'require', '用户密码不能为空'),
		
	);
	//protected $_model;
	protected $_auto = array(
			array('disabled', '0', self::MODEL_INSERT)
	);
	  /**
	   * 生成菜单
	   */
	 public function buildMenue(){
	 	
	 	//if(session('menue')){
	 		
	 		//return session('menue');
	 		
	 	//}else{
	 		
	 		$tempArr = array();
	 		$tempArr['top'] = $this->where('level = 1 and disabled = 0')->order('listorder asc')->select();
	 		foreach($tempArr['top'] as $k =>$v){
	 		
	 			$tempArr['top'][$k]['sub'] = $this->where('level = 2 and disabled = 0 and parent = '.$v['id'])->order('listorder asc')->select();
	 		
	 			foreach($tempArr['top'][$k]['sub'] as $k2 =>$v2){
	 				$tempArr['top'][$k]['sub']['sub'] = $this->where('level = 3 and disabled = 0 and parent = '.$v2['id'])->order('listorder asc')->select();
	 			}
	 		}
	 		session('menue',$tempArr);
	 		return $tempArr;
	 //	}
	 	
	 }
	 /**
	  * 生成权限
	  */
	 public  function buildPower(){
	 	
	 }
  
}