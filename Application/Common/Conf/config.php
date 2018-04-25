<?php
return array(
	//'配置项'=>'配置值'
    'MODULE_ALLOW_LIST'    =>    array('Home','Adm'),  //可访问模块
    'DEFAULT_MODULE'=> 'Home',
    'URL_HTML_SUFFIX'=>'.html',
    'URL_PATHINFO_DEPR'=>'-',
    'URL_CASE_INSENSITIVE' =>true,
    //url访问模式为rewrite模式
    'URL_MODEL'=>'2',
    'SESSION_AUTO_START' => true, //是否开启session
    /* 数据库配置 */
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => '127.0.0.1', // 服务器地址
    'DB_NAME'   => 'domaincms', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => 'root',  // 密码
    'DB_PORT'   => '3306', // 端口
    'DB_PREFIX' => 'yuming_', // 数据库表前缀
);