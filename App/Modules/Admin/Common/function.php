<?php
function URL($title,$MA,$other=array(),$display=false){
	
	$arr = str2arr('/',$MA);
	$Rule = D('Rule');
	if(isset($other['icon'])){
		$icoHtml = '<i class="icon '.$other['icon'].'-icon">&nbsp;</i>';
	}else{
		$icoHtml = '';
	}
	$parame = isset($other['parame'])?$other['parame']:'';
	$class = isset($other['class'])?$other['class']:"";
	if(is_array($parame)){
		
		if($Rule ->checkHasPower()){
			return '<a href="'. U($MA,$parame).'" class="'.$class.'">'.$icoHtml.$title.'</a>';
		}else{
			if($display){
				return '<a href="javascript:alert(\'您没有权限\');" style="background-color: #989b9e;">'.$icoHtml.$title.'</a>';
			}else{
				return '';
			}
			
		}
		
		
	}else{
		

		if($Rule ->checkHasPower()){ 
			
			return '<a href="'. U($MA.'?'.$parame).'" class="'.$class.'">'.$icoHtml.$title.'</a>';
		}else{
			if($display){
				return '<a href="javascript:alert(\'您没有权限\');" style="background-color: #d8dadc; cursor: no-drop;">'.$icoHtml.$title.'</a>';
			}else{
				return '';
			}
		}
	}
	
}

/**
 *  类别组
 */
function get_sort_group($gid=0){
	
	$groupArr = array(1=>'栏目',2=>'广告');
	if($gid){
		return $groupArr[$gid];
	}else{
		return $groupArr;
	}
	 
	 
}