<?php
class WeixinModel extends Model {
	
	const WX_TOKEN = '11111';
	const YH_TOKEN = 'user111';
	const WX_APPID = '111111';
	const WX_APPSECRET = '1111111';
	/* 验证微信
	 * 
	 */
	public function valid(){
	
		$echoStr = $_GET["echostr"];
		//valid signature , option
		if($this->checkSignature()){
			
			return  $echoStr;
		}else{
			return false;
		}
	}
	/* 验证 TOKEN
	 * 
	 */
	
	private function checkSignature()
	{
		$signature = $_GET["signature"];
		$timestamp = $_GET["timestamp"];
		$nonce = $_GET["nonce"];
	
		$token = self::WX_TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
		// use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
	
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
	/* 用户绑定 验证 
	 *
	 */
	
	public  function checkSignatureUser()
	{
		$signature = $_GET["signature"];
		$timestamp = $_GET["timestamp"];
		$nonce = $_GET["nonce"];
	
		$token = self::YH_TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
		// use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}

	/*  接收访客微信消息，根据关键词判断推送信息
	 * 
	 */ 
	public function responseMsg(){
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
		
		if (!empty($postStr)){
			$postObj = simplexml_load_string($postStr,'SimpleXMLElement',LIBXML_NOCDATA);
			$RX_TYPE = trim($postObj->MsgType);
			$actionName = 'response_'.$RX_TYPE;
			
			$resultStr = $this->$actionName($postObj);
			
		}else {
			echo "";
			exit;
		}
	}
	public function log($str){
		
		file_put_contents('wx_log.txt',$str);
	}
	/*
	 * 自动回复_文本
	*/
	public function response_text($postObj){
		$FromUserName = $postObj->FromUserName;
		$ToUserName = $postObj->ToUserName;
		$MsgId = $postObj->MsgId;
		$keyword = trim($postObj->Content);		
		if(!empty($keyword)){
			switch($keyword){
				
				case'你好':
					$content = '你也好！';
					break;
				case'天气':
					$content = '武汉有雨';
					break;
				default:
					$content = '请问您需要什么帮助吗？';
			}
		   $this->sent_text($ToUserName,$FromUserName,$content);
		
			
        }else{
        	
        	echo "";
        	exit;
        }
	}
	/*
	 * 自动回复_图片
	 */
	public function response_image($postObj){
		$FromUserName = $postObj->FromUserName;
		$ToUserName = $postObj->ToUserName;
		$PicUrl = $postObj->PicUrl;
		$MediaId = $postObj->MediaId;
		
		if(!empty($PicUrl)){
	
			$this->sent_image($ToUserName,$FromUserName,$MediaId);
			
		}else{
			 
			echo "";
			exit;
		}
	}
	/*
	 * 自动回复_事件 
	*/
	public function response_event($postObj){
		$FromUserName = $postObj->FromUserName;		
		$ToUserName = $postObj->ToUserName;		
		
		switch ($postObj->Event){
            case "subscribe":
            	if(!$this->guanzhu($ToUserName,$FromUserName))
            		echo '';
                break;
                
            case 'SCAN':
            	$Data = "哈哈,你早就是我的粉丝了！";
            	$this->sent_text($ToUserName,$FromUserName,$Data,0);
			case "unsubscribe":
				  echo '';
				break;
			case 'VIEW':
				//echo $postObj->EventKey;
				
				//$this->guanzhu($ToUserName,$FromUserName);
				break;
			case 'CLICK':
	
				switch($postObj->EventKey){
					case 'MYUSERCENTER':
						$Data ='test';
						$this->sent_text($ToUserName,$FromUserName,$Data);
						break;
				}
				
				break;
            default:
				echo '';
                break;
        }
    }
	public function guanzhu($FromUserName,$ToUserName){
		
		$Table = M('guanzhu','wx_');
		$info = $Table ->find();
		if($info){
			
			if($info['reply_key']){				
				$returnInfo = $this->findKey($info['reply_key']);
				if( !$returnInfo ){
					
					$returnInfo = $this->findKey($info['default_key']);
				}
						
			}else{
				
				  $returnInfo = $this->findKey($info['default_key']);
			}
			if( $returnInfo ){
				switch($returnInfo['sortid']){
					case 1:
						$Data = $returnInfo['info'];
						$this->sent_text($FromUserName,$ToUserName,$Data,0);
						break;
					case 2:
						$Data = array();
						$Data[0]['Title'] = $returnInfo['title'];
						$Data[0]['Description'] = $returnInfo['info'];
						$Data[0]['PicUrl'] = '/public'.$returnInfo['image'];
						$Data[0]['Url'] = $returnInfo['link'];
						$morenews = $returnInfo['morenews'];
						if($morenews){
							$Data2 = $this->moreNews($morenews);
							foreach($Data2 as $val){
									
								$tempArr['Title'] = $val['title'];
								$tempArr['Description'] = $val['info'];
								$tempArr['PicUrl'] = '/public'.$val['image'];
								$tempArr['Url'] = $val['link'];
								$Data[] = $tempArr;
							}
						}						
						$this->sent_news($FromUserName,$ToUserName,$Data);
						break;
				}
				return true;
				 
			}else{
				return false;
			}
		    
		}else{
			return false;
		}
	}

	/*
	 * 推送消息_文本
	*/
	public function sent_text($FromUserName,$ToUserName,$Data,$Flag=0){
		if (!empty($Data)){
			$msgType = 'text';
			$time = NOW_TIME;
			$textTpl = $this->getTextTpl($msgType);			
			$resultStr = sprintf($textTpl,$ToUserName,$FromUserName,$time,$Data,$Flag);
			echo $resultStr;
			exit;
		}else{
			echo '';
			exit;
		}
	}
	/*
	 * 推送消息_图文
	*/
	public function sent_news($FromUserName,$ToUserName,$Data){
		if (!empty($Data)){
			$msgType = 'news';
			$time = NOW_TIME;
			$textTpl = $this->getTextTpl($msgType);
			//处理图文数据
			$newsCount = count($Data);
			$contentStr = '';
			foreach ($Data as $key => $value){
				$contentStr .='<item>';
				$contentStr .= '<Title>'.$Data[$key]['Title'].'</Title>';
				$contentStr .= '<Description>'.$Data[$key]['Description'].'</Description>';
				$contentStr .= '<PicUrl>'.$Data[$key]['PicUrl'].'</PicUrl>';
				$contentStr .= '<Url>'.$Data[$key]['Url'].'</Url>';
				$contentStr .= '</item>';
			}
			$resultStr = sprintf($textTpl,$ToUserName,$FromUserName,$time,$newsCount,$contentStr);
			
			echo $resultStr;exit;
		}else{
			echo '';
		}
	}	
	/*
	 * 推送消息_图片
	 */
	public function sent_image($FromUserName,$ToUserName,$MediaId){
		
		if (!empty($MediaId)){
			$msgType = 'image';
			$time = NOW_TIME;
			$imgTpl = $this->getTextTpl($msgType);
			
			$resultStr = sprintf($imgTpl,$ToUserName,$FromUserName,$time,$MediaId);
			//$this->log($resultStr);
			echo $resultStr;exit;
		}else{
			echo '';
		}
		
	}
	//获取推送信息模版
	public function getTextTpl($msgtype='text'){
		//文本消息
		$textTpl = "<xml>
			<ToUserName><![CDATA[%s]]></ToUserName>
			<FromUserName><![CDATA[%s]]></FromUserName>
			<CreateTime>%s</CreateTime>
			<MsgType><![CDATA[text]]></MsgType>
			<Content><![CDATA[%s]]></Content>
			<FuncFlag>%s</FuncFlag>
			</xml>";
		//图文消息
		$newsTpl = "<xml>
			<ToUserName><![CDATA[%s]]></ToUserName>
			<FromUserName><![CDATA[%s]]></FromUserName>
			<CreateTime>%s</CreateTime>
			<MsgType><![CDATA[news]]></MsgType>
			<ArticleCount>%s</ArticleCount>
			<Articles>%s</Articles>
			</xml>";
		 //图片消息
		  $imgTpl ="
		  		<xml>
					<ToUserName><![CDATA[%s]]></ToUserName>
					<FromUserName><![CDATA[%s]]></FromUserName>
					<CreateTime>%s</CreateTime>
					<MsgType><![CDATA[image]]></MsgType>
					<Image>
					<MediaId><![CDATA[%s]]></MediaId>
					</Image>
				</xml>
		  		";
		  
		switch ($msgtype){
            case "text":
				$resultStr = $textTpl;
                break;
			case "news":
				$resultStr = $newsTpl;
                break;
            case "image":
                $resultStr = $imgTpl;
                break;
            default:
				$resultStr = '';
                break;
        }
		return $resultStr;
	}
	/**
	 * 检查是否绑定
	 */
	private function checkHaveBD($openId){
		
		$User = M('User','test_');
		$where['openid'] = $openId;
		return $User ->where($where)->find();
	}
	public  function login(){
		
		
	}
	/**
	 * 生成验证消息
	 */
	private function buildYZ(){
		
		$return['timestamp'] = time();
		$return['nonce'] = rand(100,999);
		$token = self::YH_TOKEN;
		$tmpArr = array($token, $return['timestamp'],$return['nonce']);
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$return['signature'] = sha1( $tmpStr );
		return $return;
	}
	// 获取微信服务器地址
	public function getWeixin_ip(){
		$url = 'https://api.weixin.qq.com/cgi-bin/getcallbackip';
		$data['access_token'] = WX_TOKEN;
		$result = file_get_contents($url);
		return $result;
	}
	// 获取access token
	public function getWeixin_token(){
		$accessToken = cache('access_token');
		//var_dump($accessToken);exit;
		if(!$accessToken){
			
			$url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.self::WX_APPID.'&secret='.self::WX_APPSECRET;
			$accessToken = file_get_contents($url);
			cache('access_token',$accessToken,3600);
		}
		
		return $accessToken;
	}
	
}