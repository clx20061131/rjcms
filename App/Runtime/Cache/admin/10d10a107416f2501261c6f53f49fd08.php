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
	</head>
	<body>
	    <div class="wrap">
			<div class="header">
			    <div class="logo fl">
				    <h1>后台管理系统</h1>
				</div>
				<div class="menue fl">
				       <ul class="menue-list">
						  <?php if(is_array($menueList["top"])): $i = 0; $__LIST__ = $menueList["top"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="fl"><a href="<?php echo U($vo['modul_action']);?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
						
					   </ul>
				</div>
				<div class="top-info fr">
					<ul class="top-info-list">
					     <li><a href="###"><?php echo session("admin.unick");?></a></li>
					    
						 <li><a href="<?php echo U('Public/logout');?>">退出</a></li>
					</ul>
				</div>
			</div>		
			<div class="content">
			   <div class="cont-left fl">
					<ul class="menue-left-list">
					<?php if(is_array($leftMenue)): $i = 0; $__LIST__ = $leftMenue;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="##" class="side-menue-list"><?php echo ($vo["title"]); ?></a>
					        <ul class="menue-sub-list hide">
					           <?php if(is_array($vo["sub"])): $i = 0; $__LIST__ = $vo["sub"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><li><a href="" class="active"><?php echo ($vo2["title"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
								
							</ul>
					   </li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
			   </div>
			   <div class="cont-right">
			      <p class="position">当前位置：<a href="">首页</a> >><a href="">首页</a></p>
				 <!--  <div class="main">
					 <div class="main-title">
					  <form><input type="text" name="" class="input input-200"><input type="submit" value="搜索" class="btn btn-main"></form>
					 </div>
					 <div class="main-content">
					   <table class="table-list">
					   <thead>
							<tr>
							  <td>标题</td>
							  <td>简介</td>
							  <td>操作</td>
							</tr>
						</thead>
						<tbody>
							<tr>
							  <td>12312</td>
							  <td>12312</td>
							  <td>12321</td>
							</tr>
						</tbody>
					   </table>
					   <table class="table-detail">
					   <thead>
							<tr >
							  <td colspan="3">标题</td>
							 
							</tr>
						</thead>
						<tbody>
							<tr>
							  <td>标题</td>
							  <td class="tal"><input type="text" name="title" value="" class="input input-350"><span class="tip-info">请输入密码</span></td>							  
							</tr>
							<tr>
							  <td>多选</td>
							  <td class="tal"><input type="checkbox" name="title" value="" class="input"> A <input type="checkbox" name="title" value="" class="input"> B <span class="tip-info">请输入密码</span></td>							  
							</tr>
							<tr>
							  <td>单选</td>
							  <td class="tal"><input type="radio" name="title" value="" class="input"> A <input type="radio" name="title" value="" class="input"> B <span class="tip-info">请输入密码</span></td>							  
							</tr>
							<tr>
							  <td>下拉框</td>
							  <td class="tal"><select class="select"><option value="">1<option value="">2</select> <span class="tip-info">请输入密码</span></td>							  
							</tr>
							<tr>
							  <td>textarea</td>
							  <td class="tal"><textarea class="textarea"></textarea> <span class="tip-info">请输入密码</span></td>							  
							</tr>
							<tr>
							  <td colspan="2"><input type="submit" class="btn btn-main" value="提交"></td>
							 							  
							</tr>
						</tbody>
					   </table>
					 </div>
				  </div>
			   </div>--> 
			</div>
			<div class="footer">
			  <p>制作单位：北大青鸟</p>
			</div>			
		</div>
	   <script type="text/javascript" src="__PUBLIC__/jS/jquery.min.js"></script>
	   <script type="text/javascript" src="__JS__/admin.js"></script>
	</body>
</html>