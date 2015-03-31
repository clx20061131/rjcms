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
	 	$tempArr = $this->where('level = 1 and disabled = 0')->order('listorder asc')->select();
	 	foreach($tempArr as $k =>$v){
	 		$returnArr[$v['id']] = $v;
	 		$tempArr[$k]['sub'] = $this->where('level = 2 and disabled = 0 and parent = '.$v['id'])->order('listorder asc')->select();
	 	
	 		foreach($tempArr[$k]['sub'] as $k2 =>$v2){
	 			$returnArr[$v['id']]['sub'][$v2['id']] = $v2;
	 			$returnArr[$v['id']]['sub'][$v2['id']]['sub'] = $tempArr['top'][$k]['sub']['sub'] = $this->where('level = 3 and disabled = 0 and parent = '.$v2['id'])->order('listorder asc')->select();
	 		}
	 	}
	 	return  $returnArr;
	 }
	 /**
	  * 
	  */
	 public function getSubMenue($pid=0){
	 	
	   return 	$this->where('parent = '.$pid)->select();
	 
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
     /**
      * 获取父级id序列
      */
     public function getParentIds($topId,$leftTopId){
     	
     	if($topId){
     		if($leftTopId){     			
     			$data['parent_ids'] = $topId.','.$leftTopId;
     			$data['level'] = 3;
     			$data['parent'] = $leftTopId;
     		}else{
     		
     			$data['parent_ids'] = $topId;
     			$data['level'] = 2;
     			$data['parent'] = $topId;
     		}
     		
     	}else{
     		
     		$id = $this->max('id')+1;   
     		$data['parent_ids'] = $id;
     		$data['level'] = 1;
     		$data['parent'] = 0;
     	}
     	return $data;
     }
}