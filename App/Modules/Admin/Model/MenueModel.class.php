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
	 		
	 	    $returnArr = $this->getMenueList();
	 		session('menue',$returnArr);
	 		return  $returnArr;
	 //	}
	 	
	 }
	 public function getMenueList($topId=0){
	 	
	 	$tempArr = $returnArr = array();
	 	$tempArr['top'] = $this->where('level = 1 and disabled = 0')->order('listorder asc')->select();
	 	foreach($tempArr['top'] as $k =>$v){
	 		$returnArr['top'][$v['id']] = $v;
	 		$tempArr['top'][$k]['sub'] = $this->where('level = 2 and disabled = 0 and parent = '.$v['id'])->order('listorder asc')->select();
	 	
	 		foreach($tempArr['top'][$k]['sub'] as $k2 =>$v2){
	 			$returnArr['top'][$v['id']]['sub'][$v2['id']] = $v2;
	 			$returnArr['top'][$v['id']]['sub'][$v2['id']]['sub'] = $tempArr['top'][$k]['sub']['sub'] = $this->where('level = 3 and disabled = 0 and parent = '.$v2['id'])->order('listorder asc')->select();
	 		}
	 	}
	 	return  $returnArr;
	 }
	 /**
	  * 生成权限
	  */
	 public  function buildPower(){
	 	
	 	if(session('power')){
	 		
	 	}else{
	 		$ARULE = M('admin_rule');
	 		$AROLE = M('admin_role');
	 		$roleid = session('admin.role');
	 		$roleList = $AROLE ->where('role_id = '.$roleid)->getField('role_power');
	 		$powerList = $ARULE -> where("disabled = 0 and id in($roleList)")->field('way,id')->select();
	 		session('power',$powerList);
	 	}	 
	 }
	 /**
	  *  当前的menue action
	  */
     public function actionMenue($m,$a){

     	   $where['modul_action'] = $m.'/'.$a;
     	   $rst = $this->where($where)->find();
     	   if($rst){
     	    	$arr['leftAction'] = $rst['id'];
     	    	$topids = explode(',', $rst['parent_ids']);
     	    	$topid = $topids[0];
     	    	$arr['topAction'] = $topid;
     	   }else{
     	   	    $rst2 = $this->where("modul_action like '%$m%' and level =3 and disabled =0")->find();
     	   	    $arr['leftAction'] = $rst2['id'];
     	   	    $topids = explode(',', $rst2['parent_ids']);
     	   	    $topid = $topids[0];
     	   	    $arr['topAction'] = $topid;
     	   }
     	   return $arr;    	   
     }
}