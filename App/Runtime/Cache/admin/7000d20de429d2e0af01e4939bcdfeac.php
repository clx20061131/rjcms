<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>提示信息 --后台管理系统</title>
<link rel="stylesheet" type="text/css" href="__CSS__/common.css"/>
 <link rel="stylesheet" type="text/css" href="__CSS__/main.css"/>
 <style>
    .main { 
	    margin:auto;
	    width:960px;
	    margin-top:300px;
	    border:1px solid #3300FF;
	    padding:20px 10px;
	    background-color:#C0C0C0;
    }
    .success{
      color:green;
      font-size:16px;
    }
    .error{
      color:red;
      font-size:16px;
    }
     h1{
      font-size:16px;
    }
    .TipWords li{
       height:24px;
       padding:5px 5px;       
    }
 </style>
</head>
<body>
<div class="container clearfix main">
    <h1 class="tc">友情提示</h1>
    <ul class="TipWords">
    	<li class="success tc"> <?php if($message)echo $message;?> </li>
        <li class="error tc"><?php if($error)echo $error;?></li>
        <li class="tc"><a href="javascript:<?php echo $jumpUrl;?>;">将在3秒钟后自动跳转，如果浏览器没有响应，请点击这里。</a></li>
    </ul>
  <p class="jump tc">
	页面自动 <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?></b>
	</p>
</div>
<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time <= 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>
</body>
</html>