<?php
/**
* date:2014-11-05
* author:fupj<fu2000000@163.com> 
* function:登录权限验证模块
*/
namespace Adm\Controller;
use Think\Controller;

/**
 * 前台公共控制器
 * 为防止多分组Controller名称冲突，公共Controller名称统一使用分组名称
 */
class CheckAuthController extends Controller {

    /* 空操作，用于输出404页面 */
    // public function _empty(){
    //     echo 404; //TODO:完成404页面
    // }
    // TODO: 为了调试方便，暂时注释

    protected function _initialize(){
        /* 读取站点配置 */
      /*  $config = api('Config/lists');
        C($config); //添加配置*/
        self::login();
        /*if(!C('WEB_SITE_CLOSE')){
            $this->error('站点已经关闭，请稍后访问~');
        }*/
    }

    /* 用户登录检测 */
    protected function login(){
        /* 用户登录检测 */
        if(!session('master_auth')){
            $this->error('请登陆！',U('/adm/login','','.html'));
        } 
    }

}
