<?php
/**
* date:2014-11-05
* author:fupj<fu2000000@163.com> 
* function:分类管理模块
*/
namespace Adm\Controller;
use Think\Controller;
class CategoryController extends CheckAuthController {
    public function index(){
        $obj = new \Adm\Model\CategoryModel();
        $cate = $obj->getCategory($map);
        $this->assign('cate',$cate);
        $this->display();
    }
    
    public function newCate(){
        $cobj = new \Adm\Model\CategoryModel();
        $allcate = $cobj->getCate('','','',2);
        $this->assign('allcate',$allcate);
        if(I('get.id')){
            
            $res = $cobj->getOneCate(I('get.id'));
            //print_r($res);die;
            $this->assign('res',$res);
            $this->display();
        } else {
            $this->display();
        }
        /*$userInfos = session('user_auth');
        $this->display();*/
    }
    public function showhiden(){ 
        $user = session('user_auth');
        
        $get = I("get.");
        $obj = new \Adm\Model\CategoryModel();
        if($get['cstatus'] == 1){
            $data['category_status'] = 2;
        }
        if($get['cstatus'] == 2){
            $data['category_status'] = 1;
        }
        $map['id'] = $get['cid'];
        $res = $obj->updateCate($map,$data);
        if($res){
           $this->go($_SERVER['HTTP_REFERER']); 
        }
    }
    public function addCate(){
        $data = I('post.');

        $content['category_name'] = $data['category_name'];
        $content['category_order'] = $data['category_order'];
        $content['category_title'] = $data['category_title'];
        $content['category_keywords'] = $data['category_keywords'];
        $content['category_description'] = $data['category_description'];
        $content['category_content'] = $_POST['category_content'];
        $content['category_node'] = $_POST['category_node'];
        $content['cateid'] = $data['cateid'];

        if($data['cateid']){
           $content['category_update'] = date("Y-m-d H:i:s"); 
           $content['category_status'] = 1;
        } else {
           $content['category_date'] = date("Y-m-d H:i:s");
           $content['category_status'] = 2;
        }
        
        //print_r($content);die;
        $object = new \Adm\Model\CategoryModel();
        if($data['cateid']){
            $map['id'] = $data['cateid'];
            unset($content['cateid']);
            $res = $object->updateCate($map,$content);
        } else {
            $res = $object->addCate($content);
        }
        
        if($res){
            $this->success('添加成功');
        } else {
            $this->error('添加失败');
        }
    }
    public function delcate(){
        $object = new \Adm\Model\CategoryModel();
        $map['id'] = I('get.cid');
        $res = $object->del($map);
        if($res){
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
    }
}