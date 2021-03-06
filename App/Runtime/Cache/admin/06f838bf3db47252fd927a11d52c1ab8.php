<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>提示信息 --后台管理系统</title>
<link href="__CSS__/reset.css" rel="stylesheet" type="text/css" />
<link href="__CSS__/common.css" rel="stylesheet" type="text/css" />
 <style>
    .main { 
	    margin:auto;
	    width:960px;
	    margin-top:300px;
	    border:1px solid #3300FF;
	    padding:20px 10px;
	    background-color:#C0C0C0;
	    text-align:center;
    }
    .success{
      color:green;
      font-size:16px;
      font-weight:900;
    }
    .error{
      color:red;
      font-size:16px;
      font-weight:400;
    }
     h1{
      font-size:16px;
    }
    .TipWords li{
       height:24px;
       padding:5px 5px;       
    }
    .ts{
     color:#9d9ca3;
    }
 </style>
</head>
<body>
<div class="container clearfix main">
    <ul class="TipWords">
    	<?php if($message):?><li class="success "><?php echo $message;?> </li><?php endif;?>
       <?php if($error):?> <li class="error "><?php echo $error;?></li><?php endif;?>
        <li class="ts"><a href="javascript:<?php echo $jumpUrl;?>;">将在3秒钟后自动跳转，如果浏览器没有响应，请点击这里。</a></li>
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