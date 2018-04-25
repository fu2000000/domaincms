<?php
/**
* date:2014-11-05
* author:fupj<fu2000000@163.com> 
* function:登陆模块
*/
namespace Adm\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
         $data = I('post.');
         if($data){
             $masterObj = new \Adm\Model\MasterModel();
             $map['username'] = $data['username'];
             $map['password'] = md5($data['password']);
             $res = $masterObj->getMaster('', $map);
             if($res){
                 $masterObj->login($res['id']);
                 $this->go(U('/adm-system'));
             } else {
                 $this->error('账号或者密码错误，请重新登陆');
             }
         } else {
             $this->display();
         }
    }
    public function out(){
        $masterObj = new \Adm\Model\MasterModel();
        $res = $masterObj->logout();
        $this->go(U('/adm-login'));
        
    }
}