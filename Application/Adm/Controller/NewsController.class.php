<?php
/**
* date:2014-11-05
* author:fupj<fu2000000@163.com> 
* function:产品管理模块
*/
namespace Adm\Controller;
use Think\Controller;
class NewsController extends CheckAuthController {
    public function index(){
         $object = new \Adm\Model\NewsModel();
         
         if(I('post.domain_name')){
            $domain_name = I('post.domain_name');
            $map['domain_name'] = array('like',"{$domain_name}%");;
         }
         if(I('post.isrec')){
            $map['news_recommend'] = I('post.isrec');
         }
         
         $count = $object->where($map)->count();// 查询满足要求的总记录数
         $Page = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
         
         $Page->setConfig('header','个公号');   
         $Page->setConfig('prev',"上一页");   
         $Page->setConfig('next','下一页');   
         $Page->setConfig('first','首页');   
         $Page->setConfig('last','末页');
         $show = $Page->show();// 分页显示输出
         $res = $object->getInfo('',$map,'',$Page->firstRow, $Page->listRows,2);
         

         $this->assign('res',$res);// 赋值数据集
         $this->assign('page',$show);// 赋值分页输出
         
         $this->display();
    }
   
    public function add(){
         $pid = I('get.pid');
         $object = new \Adm\Model\NewsModel();
         if($pid){
            $map['id'] = $pid;
            $res = $object->getInfo('', $map);
            
            $this->assign('res',$res);// 赋值数据集 
            
         }
         $this->assign('zhuceshang',$zhuceshang);
         $this->assign('allcategory',$allcate);// 赋值数据集
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
           $object = new \Adm\Model\NewsModel();
           $res = $object->delInfo($map);
           if($res){
              $this->success('删除成功'); 
           } else {
              $this->error('删除失败'); 
           }
        } else {
            $this->error('操作错误');
        }
        
    }
   
    public function doadd(){
        $data = I('post.'); 
        
        $object = new \Adm\Model\NewsModel();        
        if(!empty($data)){
          if(!empty($data['pid'])){
              $map['id'] = $data['pid'];
              unset($data['pid']);
              $up = $object->updateInfo($map, $data);
              if($up){
                 $this->success('更新成功', U('/adm-news')); 
              } else {
                 $this->error('更新失败', U('/adm-news-add')); 
              }
          } else {  
              $data['news_date'] = date('Y-m-d H:i:s');              
              unset($data['pid']);
              //print_r($data);die;
              $res = $object->addInfo($data);
              if($res){
                 $this->success('添加成功', U('/adm-news')); 
              } else {
                 $this->error('添加失败', U('/adm-news-add')); 
              } 
          }         
        } else {
             $this->success('操作错误', U('/'));
        }
    }
    public function setajax(){
       $adids = I('get.adIds'); 
       $num = I('get.num');
       $object = new \Adm\Model\NewsModel();
       $map['id'] = array("in","{$adids}");
       if($num==1){          
           $res = $object->delInfo($map);
       }
       if($num==2){          
           $data['issale']=2;
           $res = $object->updateInfo($map,$data);
       }
       if($num==3){
           $data['recommend']=1;
           $res = $object->updateInfo($map,$data);
       }
       if($num==4){
           $data['recommend']=2;
           $res = $object->updateInfo($map,$data);
       }
       if($num==5){
           $data['display']=2;
           $res = $object->updateInfo($map,$data);
       }
       if($num==6){
           $data['display']=1;
           $res = $object->updateInfo($map,$data);
       } 
       if($res){
           echo 1;die;
       } else {
           echo 2;die;
       } 
    }
}