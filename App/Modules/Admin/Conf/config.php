<?php
$theme = 'theme02';
return array(
	//'配置项'=>'配置值'
		'DEFAULT_THEME' => $theme,
		//'TMPL_ACTION_ERROR'     => APP_PATH . "Modules/Home/Tpl/PagePublic/success.html",
		//'TMPL_ACTION_SUCCESS'   => APP_PATH . "Modules/Home/Tpl/PagePublic/success.html",
		'SESSION_AUTO_START'    => true,
		'SESSION_PREFIX'        => 'ad_ss',
		'COOKIE_PREFIX'        => 'ad_ck',
		// 模板变量
		'TMPL_PARSE_STRING' => array(
				'__IMAGES__' => __ROOT__.'/static/'.GROUP_NAME.'/'.$theme.'/images',
				'__JS__'     => __ROOT__.'/static/'.GROUP_NAME.'/'.$theme.'/js',
				'__CSS__'    => __ROOT__.'/static/'.GROUP_NAME.'/'.$theme.'/css',
				'__PUBLIC__' => __ROOT__.'/static/Public',
				'__UPLOAD__' => __ROOT__.'/static/upload',
		),
		
);
?>