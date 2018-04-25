<?php
/**
* date:2014-11-05
* author:fupj<fu2000000@163.com> 
* function:产品管理模块
*/
namespace Adm\Controller;
use Think\Controller;
class FriendController extends CheckAuthController {
    public function index(){
         $object = new \Adm\Model\FriendModel();
         
         $count = $object->where($map)->count();// 查询满足要求的总记录数
         $Page = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
         
         $Page->setConfig('header','个公号');   
         $Page->setConfig('prev',"上一页");   
         $Page->setConfig('next','下一页');   
         $Page->setConfig('first','首页');   
         $Page->setConfig('last','末页');
         $show = $Page->show();// 分页显示输出
         $res = $object->getFriend('','','',$Page->firstRow, $Page->listRows,2);
         $this->assign('res',$res);// 赋值数据集
         $this->assign('page',$show);// 赋值分页输出
         $this->display();
    }
    /**
    * Function 未审核产品
    */
    public function noverify(){
         $object = new \Adm\Model\ProductsModel();
         $labelObject = new \Adm\Model\LabelModel();
         $map['verify'] = 1;
         $count = $object->where($map)->count();// 查询满足要求的总记录数
         $Page = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
         
         $Page->setConfig('header','个公号');   
         $Page->setConfig('prev',"上一页");   
         $Page->setConfig('next','下一页');   
         $Page->setConfig('first','首页');   
         $Page->setConfig('last','末页');
         $show = $Page->show();// 分页显示输出
         $res = $object->getProduct('',$map,'',$Page->firstRow, $Page->listRows,2);
         foreach($res as $k=>$v){
             $map['id'] = $v['weixin_province'];
             //print_r($map);die;
              $label = $labelObject->getLabel('label_name',$map);
              $res[$k]['area'] = $label['label_name'];
         }
         $this->assign('res',$res);// 赋值数据集
         $this->assign('page',$show);// 赋值分页输出
         $this->display();
    }
    public function addFriend(){
         $pid = I('get.pid');
         $object = new \Adm\Model\FriendModel();
         
         if($pid){
            $map['id'] = $pid;
            $res = $object->getFriend('', $map);
            
            $this->assign('res',$res);// 赋值数据集 
            
         }
         
         /*$userobject = new \Pa\Model\UserModel();
         $field = array('weiba_user.username');
         $map['weiba_user.status'] = 1;
         $userRes = $userobject->lists($map, '', $field);
         print_r($userRes);die;
         $this->assign('userRes',$userRes);// 赋值数据集*/
         $this->display();
    }
    public function del(){
        $data = I('get.pid');
        if($data){
           $map['id'] = $data;
           $object = new \Adm\Model\FriendModel();
           $res = $object->del($map);
           if($res){
              $this->success('删除成功'); 
           } else {
              $this->error('删除失败'); 
           }
        } else {
            $this->error('操作错误');
        }
        
    }
    
    public function add(){
        $data = I('post.');
        $object = new \Adm\Model\FriendModel();
        
        if(!empty($data)){
          if(!empty($data['pid'])){
              $data['friend_uptime'] = date('Y-m-d H:i:s');
              $map['id'] = $data['pid'];
              unset($data['pid']);
              //print_r($data);die;
              $up = $object->updateFriend($map, $data);
              if($up){
                 $this->success('更新成功', U('/adm-friend')); 
              } else {
                 $this->error('更新失败', U('/adm-friend-addfriend')); 
              }
          } else {
              $data['friend_addtime'] = date('Y-m-d H:i:s');

              $res = $object->addFriend($data);
              if($res){
                 $this->success('添加成功', U('/adm-friend')); 
              } else {
                 $this->error('添加失败', U('/adm-friend-addfriend')); 
              } 
          }
          
        } else {
             $this->success('操作错误', U('/'));
        }
    }
}