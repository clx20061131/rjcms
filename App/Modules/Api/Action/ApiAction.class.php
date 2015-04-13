<?php
class ApiAction extends Action{
	
	public function weixin(){
		ob_get_clean();
		$WX =  D('Weixin');		
		
		// 验证消息真实性
		//if($rst = $WX->valid()){
			//exit($rst);
		//}
		
		//接受消息
		$WX->responseMsg();
	}
	
	
}