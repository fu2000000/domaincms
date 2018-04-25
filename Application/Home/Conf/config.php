<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

/**
 * 安装程序配置文件
 */

define('INSTALL_APP_PATH', realpath('./') . '/');

return array(  
    
    'ORIGINAL_TABLE_PREFIX' => 'yuming_', //默认表前缀

	//多模板配置
    'TMPL_SWITCH_ON' => true, // 启用多模版支持
    'TMPL_DETECT_THEME' => true, // 自动侦测模板主题
    'DEFAULT_THEME' => 'default',
    /* 模板相关配置 */
    'TMPL_PARSE_STRING' => array(
        '__COMMON__' => __ROOT__ . '/Public/common',
        '__ADDONS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/Addons',
        '__IMG__'    => __ROOT__ . '/Public/' . MODULE_NAME . '/images',
        '__CSS__'    => __ROOT__ . '/Public/' . MODULE_NAME . '/css',
        '__JS__'     => __ROOT__ . '/Public/' . MODULE_NAME . '/js',
    ),

    /* 用户中心微信截图图片上传相关配置 */
    'WXJIETU_UPLOAD' => array(
        'mimes'    => '', //允许上传的文件MiMe类型
        'maxSize'  => 0, //上传的文件大小限制 (0-不做限制)
        'exts'     => array('jpg', 'gif', 'png', 'jpeg'), //允许上传的文件后缀
        'autoSub'  => true, //自动子目录保存文件
        'subName'  => array('date', 'Y-m-d'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
        //'rootPath' => './Public/Uploads/', //保存根路径
        'savePath' => 'weixinjietu/', //保存路径
        'saveName' => array('uniqid', ''), //上传文件命名规则，[0]-函数名，[1]-参数，多个参数使用数组
        'saveExt'  => 'jpg', //文件保存后缀，空则使用原后缀
        
    ),
);