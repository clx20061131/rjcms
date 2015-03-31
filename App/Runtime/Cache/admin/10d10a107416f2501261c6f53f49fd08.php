<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-cn">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="Content-Language" content="zh-CN" />	
		<title>后台管理系统</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<link href="__CSS__/reset.css" rel="stylesheet" type="text/css" />
		<link href="__CSS__/common.css" rel="stylesheet" type="text/css" />
		<link href="__CSS__/style.css" rel="stylesheet" type="text/css" />	
		<link href="__PUBLIC__/js/validform/Validform.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
	    <script>
	      var webUrl = '__GROUP__/';
	      var webApi = webUrl+'api/'
	    </script>
	</head>
	<body>
	    <div class="wrap">
			<div class="header">
			    <div class="logo fl">
				    <h1>后台管理系统</h1>
				</div>
				<div class="menue fl">
				       <ul class="menue-list">
						  <?php if(is_array($menueList)): $i = 0; $__LIST__ = $menueList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="fl"><a href="<?php echo URL($vo['modul_action']);?>" <?php if($vo['id']==$topId)echo 'class="active"';?> ><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
						
					   </ul>
				</div>
				<div class="top-info fr">
					<ul class="top-info-list">
					     <li><a href="###"><?php echo session("admin.unick");?></a></li>
					    
						 <li><a href="<?php echo URL('Public/logout');?>">退出</a></li>
					</ul>
				</div>
			</div>		
			<div class="content">
			   <div class="cont-left fl">
					<ul class="menue-left-list">
					<?php if(is_array($leftMenue)): $i = 0; $__LIST__ = $leftMenue;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="##" class="side-menue-list"><?php echo ($vo["title"]); ?></a>
					        <ul class="menue-sub-list hide">
					           <?php if(is_array($vo["sub"])): $i = 0; $__LIST__ = $vo["sub"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><li><a href="<?php echo URL($vo2['modul_action']);?>" <?php if($leftId == $vo2['id']) echo 'class="active"';?> ><?php echo ($vo2["title"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
								
							</ul>
					   </li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
			   </div>
			   <div class="cont-right">
			    
			      <p class="position">当前位置：<a href="">首页</a> >><a href="">首页</a></p>
				    <div class="main">
					   
   <div class="main-content">
	    <h3>系统基本信息</h3>
	    <ul style="padding-left:25px;">
	     <li>操作系统：<?php echo ($systemInfo["os"]); ?></li>
	     <li>运行环境：<?php echo ($systemInfo["apacheversion"]); ?></li>
	     <li>上传附件限制：<?php echo ($systemInfo["maxuploadfile"]); ?></li>
	     <li>现在时间：<?php echo date('Y-m-d H:i:s')?></li>
	    </ul>
   </div>			
				    </div>
			</div>
			<div class="footer">
			  <p>制作单位：北大青鸟</p>
			</div>			
		</div>
	      <script type="text/javascript" src="__JS__/admin.js"></script>
	</body>
</html>