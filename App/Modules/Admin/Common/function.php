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
	if( isset($other['attr']) && is_array($other['attr']) ){
		$attr ='';
		foreach($other['attr'] as $k => $v){
			$attr.= $k.'="'.$v.'" ';
		}
	}else{
		$attr = '';
	}
	
	if(is_array($parame)){
		
		if($Rule ->checkHasPower()){
			return '<a href="'. U($MA,$parame).'" class="'.$class.'"'.$attr.'>'.$icoHtml.$title.'</a>';
		}else{
			if($display){
				return '<a href="javascript:alert(\'您没有权限\');" style="background-color: #989b9e;">'.$icoHtml.$title.'</a>';
			}else{
				return '';
			}
			
		}
		
		
	}else{
		

		if($Rule ->checkHasPower()){ 
			
			return '<a href="'. U($MA.'?'.$parame).'" class="'.$class.'"'.$attr.'>'.$icoHtml.$title.'</a>';
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
/**
 * 判断是否有图
 * @param unknown $url
 * @return string
 */
function hasImage($url){
	
	if($url){
		return '<font color="green" style="padding:0px 5px;font-size:12px;">图</font>';
	}
	return '';
}
/**
 * 判断是否可用
 * @param unknown $usable
 * @return string
 */
function usable($usable){
	
	if(!$usable){
		return '<font color="red"  style="padding:0px 5px;font-size:12px;">不可用</font>';
	}else{
		return '';
	}
}