<?php
/**
* date:2014-11-05
* author:fupj<fu2000000@163.com> 
* function:产品管理模块
*/
namespace Home\Controller;
use Think\Controller;
class NewsController extends Controller {
    
    //系统首页
    public function index(){
        //网站信息
        $sysobject = new \Adm\Model\SystemModel();
        $sysinfo = $sysobject->getSys();
        $this->theme($sysinfo['sys_template']);
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
        

        //获取域名
        //$mapb['news_recommend']=2;
        
        $object = new \Adm\Model\NewsModel();
        $count = $object->where($mapb)->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page->setConfig('header','个公号');   
         $Page->setConfig('prev',"上一页");   
         $Page->setConfig('next','下一页');   
         $Page->setConfig('first','首页');   
         $Page->setConfig('last','末页');
         $show = $Page->show();// 分页显示输出
         $res = $object->getInfo('',$mapb,'',$Page->firstRow, $Page->listRows,2);
         //print_r($res);die;
        //$remproduct = $object->getProduct('',$mapb,'','','',2);
        $this->assign('res',$res);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出

        $this->display();
    }
    
    public function view(){
        //网站信息
        $sysobject = new \Adm\Model\SystemModel();
        $sysinfo = $sysobject->getSys();
        $this->theme($sysinfo['sys_template']);
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
        
        //$mapb['display']=1;
        $mapb['id']=$vid;
        $object = new \Adm\Model\NewsModel();
        $res = $object->getInfo(true,$mapb);
        $res['news_content'] = htmlspecialchars_decode($res['news_content']); 
        $this->assign('res',$res);// 赋值数据集
        //推荐文章
        $recmap['news_recommend']=1;
        $recres = $object->getInfo('',$recmap,'',$Page->firstRow, $Page->listRows,2);
        
        $this->assign('recres',$recres);
        $this->display();
        
    }
    
    
}