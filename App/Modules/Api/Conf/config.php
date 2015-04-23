<?php
return array(
	//'配置项'=>'配置值'
		'TMPL_ACTION_ERROR'     => "Public/info",
		'TMPL_ACTION_SUCCESS'   => "Public/info",
		'SESSION_AUTO_START'    => true,
		'SESSION_PREFIX'        => 'ad_ss',
		'COOKIE_PREFIX'        => 'ad_ck',
		// 模板变量
		'TMPL_PARSE_STRING' => array(
		
				'__PUBLIC__' => __ROOT__.'/static/Public',
				'__UPLOAD__' => __ROOT__.'/static/upload',
		),
		
);
?>