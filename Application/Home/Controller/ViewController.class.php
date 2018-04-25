<?php
/**
* date:2014-11-05
* author:fupj<fu2000000@163.com> 
* function:域名详情页模块
*/
namespace Home\Controller;
use Think\Controller;
class ViewController extends Controller {
    
    //系统首页
    public function index(){
        //网站信息
        $sysobject = new \Adm\Model\SystemModel();
        $sysinfo = $sysobject->getSys();
        $this->assign('sysinfo',$sysinfo);
        //分类导航
        $obj = new \Adm\Model\CategoryModel();
        $map['category_status'] = 1;
        $cate = $obj->getCategory($map);
        $this->assign('cate',$cate);
        //友情链接
        $friendobject = new \Adm\Model\FriendModel();
        $allfriend = $friendobject->getFriend('','','','','',2);
        //print_r($allfriend);die;
        $this->assign('allfriend',$allfriend);
        $vid = I('get.vid');
        //获取域名
        
        $mapb['display']=1;
        $mapb['id']=$vid;
        $object = new \Adm\Model\ProductsModel();
        $res = $object->getProduct(true,$mapb);
        $this->assign('res',$res);// 赋值数据集
        $this->display();
    }
}