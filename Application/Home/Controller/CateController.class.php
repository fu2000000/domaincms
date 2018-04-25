<?php
/**
* date:2014-11-05
* author:fupj<fu2000000@163.com> 
* function:产品管理模块
*/
namespace Home\Controller;
use Think\Controller;
class CateController extends Controller {
    
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
        $cid = I('get.cid');
        //获取分类信息
        $catemap['id']=$cid;
        $cateinfo = $obj->getCate('',$catemap);
        $this->assign('cateinfo',$cateinfo);
        //获取域名
        $mapb['issale']=1;
        $mapb['display']=1;
        $mapb['domain_category']=$cid;
        $object = new \Adm\Model\ProductsModel();
        $count = $object->where($mapb)->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page->setConfig('header','个公号');   
         $Page->setConfig('prev',"上一页");   
         $Page->setConfig('next','下一页');   
         $Page->setConfig('first','首页');   
         $Page->setConfig('last','末页');
         $show = $Page->show();// 分页显示输出
         $res = $object->getProduct('',$mapb,'',$Page->firstRow, $Page->listRows,2);
        // print_r($res);die;
        //$remproduct = $object->getProduct('',$mapb,'','','',2);
        $this->assign('res',$res);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出

        $this->display();
    }
    
    public function search(){
        $searchName = I('get.q');
        $obj = new \Vmiba\Model\ProductsModel();
        $map['verify'] = 2;
        $map['weixin_name'] = array('like',"%".$searchName."%");
        //print_r($map);die;
        $product = $obj->getAllWeixin($map,1,20);
        $labelObj = new \Vmiba\Model\LabelModel();
        foreach($product['list'] as $k=>$v){
           $categoryName = $labelObj->getLabelName($v['weixin_category']);
           $proviceName = $labelObj->getLabelName($v['weixin_province']);
           $product['list'][$k]['category_name'] = $categoryName['label_name'];
           $product['list'][$k]['provice_name'] = $proviceName['label_name']; 
        }
        $this->assign('product',$product['list']);
        $this->assign('page',$product['page']);
        $this->assign('count',$product['count']);
        //获取省份
        $allProvince = $labelObj->getLables(1);
        //获取公号分类
        $allWeixinCate = $labelObj->getLables(2);
        $this->assign('allProvince',$allProvince);
        $this->assign('allWeixinCate',$allWeixinCate);
        $this->display("Cate:index");
        
    }
    
    
}