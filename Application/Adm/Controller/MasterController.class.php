<?php
 /**
* date:2014-11-05
* author:fupj<fu2000000@163.com> 
* function:网站设置管理模块
*/
namespace Adm\Controller;
use Think\Controller;
class MasterController extends CheckAuthController {
    public function index(){
         $master = session('master_auth');
         $map['id'] = $master['masterid'];
         $object = new \Adm\Model\MasterModel();
         $res = $object->getMaster('',$map['id']);
         $this->assign('res',$res);
         $this->display();
    }
    public function add(){
        $data = I('post.');
        
        if(empty($data['password'])){
            unset($data['password']);
        } else {
            $data['password'] = md5($data['password']);
        }
        if(!empty($data)){
          $object = new \Adm\Model\MasterModel();
          
          if(!empty($data['pid'])){
              
              $map['id'] = $data['pid'];
              unset($data['pid']);
              //print_r($data);die;
              $up = $object->updateUser($map, $data);
              if($up){
                 $this->success('更新成功', U('/adm-system')); 
              } else {
                 $this->error('更新失败', U('/adm-system')); 
              }
          } else {
              
              $res = $object->addUser($data);
              if($res){
                 $this->success('添加成功', U('/adm-system')); 
              } else {
                 $this->error('添加失败', U('/adm-system')); 
              } 
          }
          
        } else {
             $this->success('操作错误', U('/'));
        }
    }
}