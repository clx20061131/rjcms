<?php
$server = include('server.php');
return $server + array(
	//'配置项'=>'配置值'
		'DEFAULT_MODULE'     => 'Index', //默认模块
		'URL_MODEL'          => '2', //URL模式
		'SESSION_AUTO_START' => true, //是否开启session
		'APP_GROUP_MODE'        =>  1,  // 分组模式 0 普通分组 1 独立分组
		'APP_GROUP_LIST' => 'Home,Admin,Api,User', //项目分组设定
		'DEFAULT_GROUP'  => 'Home', //默认分组
		'URL_CASE_INSENSITIVE'=>true,//不区分大小写
);
?>