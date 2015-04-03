<?php
class RuleModel extends Model {
	
	public function checkHasPower(){
		
		$roleid = session('admin.role');
		if($roleid == 1){
			return true;
		}
		$A = ACTION_NAME;
		$M = MODULE_NAME;
		if($this->checkNoYZ($A)){
			return true;
		}else{
			if($this->checkRuleSalf($A.'/'.$M)){
				return true;
			}else{
				return false;
			}
		}
	}
	/**
	 * 检查是否不需要验证
	 * true 安全的
	 * false 需要查询
	 */
	private function checkNoYZ($A){
		
		$salfModule = C('SALF_MODULE');
		$salfArr = str2arr($salfModule,',');
		if(in_array($A,$salfArr)){
			return true;
		}else{
			return false;
		}
	}
	private function checkRuleSalf($rule){
		
		if($this->where("way like '$rule'" )->find())return true;else return false;
	}
}