<?php
$theme = 'theme01';
return array(
	//'配置项'=>'配置值'
		'DEFAULT_THEME' => $theme,
		'TMPL_ACTION_ERROR'     => "Public/info",
		'TMPL_ACTION_SUCCESS'   => "Public/info",
		'SESSION_AUTO_START'    => true,
		'SESSION_PREFIX'        => 'hm_ss',
		'COOKIE_PREFIX'        => 'hm_ck',
		// 模板变量
		'TMPL_PARSE_STRING' => array(
				'__IMAGES__' => __ROOT__.'/static/'.GROUP_NAME.'/'.$theme.'/images',
				'__JS__'     => __ROOT__.'/static/'.GROUP_NAME.'/'.$theme.'/js',
				'__CSS__'    => __ROOT__.'/static/'.GROUP_NAME.'/'.$theme.'/css',
				'__PUBLIC__' => __ROOT__.'/static/Public',
				'__UPLOAD__' => __ROOT__.'/static/upload',
		),
		'TAGLIB_PRE_LOAD' => 'clx' ,
		'WEB_URL' =>'/rjcms/'
		 
);
?>