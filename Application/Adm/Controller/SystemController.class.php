<?php
 /**
* date:2014-11-05
* author:fupj<fu2000000@163.com> 
* function:网站设置管理模块
*/
namespace Adm\Controller;
use Think\Controller;
class SystemController extends CheckAuthController {
    public function index(){
         $object = new \Adm\Model\SystemModel();
         $res = $object->getSys();
         $this->assign('res',$res);
         $this->display();
    }
    public function add(){
        $data = I('post.');
        $data['sys_tongjicode'] = addslashes($data['sys_tongjicode']);
        
        if(!empty($data)){
          $object = new \Adm\Model\SystemModel();
          
          if(!empty($data['pid'])){
              $data['sys_addtime'] = date('Y-m-d H:i:s');
              $map['id'] = $data['pid'];
              unset($data['pid']);
              //print_r($data);die;
              $up = $object->updateSys($map, $data);
              if($up){
                 $this->success('更新成功', U('/adm-system')); 
              } else {
                 $this->error('更新失败', U('/adm-system')); 
              }
          } else {
              $data['sys_addtime'] = date('Y-m-d H:i:s');
              
              $res = $object->addSys($data);
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