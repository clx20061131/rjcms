<?php 

class Yeepay{
	
	function read_pay($orderid,$goods_name,$money){
		
		require_once('yeepayCommon.php');
		$yb = new yeebao();
		$reqURL_onLine = $yb->reqURL_onLine;
		$p0_Cmd = $yb->p0_Cmd;
		$p1_MerId = $yb->p1_MerId;
		$p9_SAF =  $yb->p9_SAF;
		#	商户接收支付成功数据的地址,支付成功后易宝支付会向该地址发送两次成功通知.
		$p8_Url						= $yb->return_url;
		#	商家设置用户购买商品的支付信息.
		##易宝支付平台统一使用GBK/GB2312编码方式,参数如用到中文，请注意转码
		
		#	商户订单号,选填.
		##若不为""，提交的订单号必须在自身账户交易中唯一;为""时，易宝支付会自动生成随机的商户订单号.
		$p2_Order					= $orderid;
		
		#	支付金额,必填.
		##单位:元，精确到分.
		$p3_Amt						= $money;
		
		#	交易币种,固定值"CNY".
		$p4_Cur						= "CNY";
		
		#	商品名称
		##用于支付时显示在易宝支付网关左侧的订单产品信息.
		$p5_Pid						= $goods_name;
		
		#	商品种类
		$p6_Pcat					= $goods_name;
		
		#	商品描述
		$p7_Pdesc					= $goods_name;
		
		#	商户扩展信息
		##商户可以任意填写1K 的字符串,支付成功时将原样返回.
		$pa_MP						= '';
		
		#	支付通道编码
		##默认为""，到易宝支付网关.若不需显示易宝支付的页面，直接跳转到各银行、神州行支付、骏网一卡通等支付页面，该字段可依照附录:银行列表设置参数值.
		$pd_FrpId					= $_REQUEST['pd_FrpId'];
		
		#	应答机制
##默认为"1": 需要应答机制;
		$pr_NeedResponse	= "1";
		
		#调用签名函数生成签名串
		$hmac = $yb->getReqHmacString($p2_Order,$p3_Amt,$p4_Cur,$p5_Pid,$p6_Pcat,$p7_Pdesc,$p8_Url,$pa_MP,$pd_FrpId,$pr_NeedResponse);
  $html=<<<EF
  <html>
<head>
<title>To YeePay Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
</head>
<body onLoad="document.yeepay.submit();">
<form name='yeepay' action='{$reqURL_onLine}' method='post'>
<input type='hidden' name='p0_Cmd'					value='{$p0_Cmd}'>
<input type='hidden' name='p1_MerId'				value='{$p1_MerId}'>
<input type='hidden' name='p2_Order'				value='{$p2_Order}'>
<input type='hidden' name='p3_Amt'					value='{$p3_Amt}'>
<input type='hidden' name='p4_Cur'					value='{$p4_Cur}'>
<input type='hidden' name='p5_Pid'					value='{$p5_Pid}'>
<input type='hidden' name='p6_Pcat'					value='{$p6_Pcat}'>
<input type='hidden' name='p7_Pdesc'				value='{$p7_Pdesc}'>
<input type='hidden' name='p8_Url'					value='{$p8_Url}'>
<input type='hidden' name='p9_SAF'					value='{$p9_SAF}'>
<input type='hidden' name='pa_MP'						value='{$pa_MP}'>
<input type='hidden' name='pd_FrpId'				value='{$pd_FrpId}'>
<input type='hidden' name='pr_NeedResponse'	value='{$pr_NeedResponse}'>
<input type='hidden' name='hmac'						value='{$hmac}'>
</form>
</body>
</html>
EF;
  echo $html;
	}
	function pay_notice(){

	
	}
	function pay_return(){
		require_once('yeepayCommon.php');
		$yb = new yeebao();
		
		//	只有支付成功时易宝支付才会通知商户.
		////支付成功回调有两次，都会通知到在线支付请求参数中的p8_Url上：浏览器重定向;服务器点对点通讯.
		
		//	解析返回参数.
		$return = $yb -> getCallBackValue($r0_Cmd,$r1_Code,$r2_TrxId,$r3_Amt,$r4_Cur,$r5_Pid,$r6_Order,$r7_Uid,$r8_MP,$r9_BType,$hmac);
		
		//	判断返回签名是否正确（True/False）
		$bRet = $yb -> CheckHmac($r0_Cmd,$r1_Code,$r2_TrxId,$r3_Amt,$r4_Cur,$r5_Pid,$r6_Order,$r7_Uid,$r8_MP,$r9_BType,$hmac);
		//	以上代码和变量不需要修改.
		 
		//	校验码正确.
		if($bRet){
			if($r1_Code=="1"){
					
				//	需要比较返回的金额与商家数据库中订单的金额是否相等，只有相等的情况下才认为是交易成功.
				//	并且需要对返回的处理进行事务控制，进行记录的排它性处理，在接收到支付结果通知后，判断是否进行过业务逻辑处理，不要重复进行业务逻辑处理，防止对同一条交易重复发货的情况发生.
				// 网站自身逻辑-----------修改订单记录
				if($r9_BType=="1"){
					echo "交易成功";
					echo  "<br />在线支付页面返回";
					header('Location: ');
				}elseif($r9_BType=="2"){
					//如果需要应答机制则必须回写流,以success开头,大小写不敏感.
					echo "success";
					echo "<br />交易成功";
					echo  "<br />在线支付服务器返回";
					header('Location: ');
				}
			}
		
		}else{
			echo "交易信息被篡改";exit;
		}
		
	}
}