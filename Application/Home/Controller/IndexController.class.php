<?php
/**
* date:2014-11-05
* author:fupj<fu2000000@163.com> 
* function:产品管理模块
*/
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        //网站信息
        $sysobject = new \Adm\Model\SystemModel();
        $sysinfo = $sysobject->getSys();
        $this->theme($sysinfo['sys_template']);
        $this->assign(['url'=>$sysinfo['sys_template'].'/public/header']);
        //print_r($sysinfo);DIE;
        $this->assign('sysinfo',$sysinfo);
        //分类导航
        $obj = new \Adm\Model\CategoryModel();
        $map['category_status'] = 1;
        $cate = $obj->getCategory($map);
        $this->assign('cate',$cate);
        $object = new \Adm\Model\ProductsModel();
        if($sysinfo['sys_template']=='default'){
            //推荐域名           
            $mapb['issale']=1;
            $mapb['recommend']=1;
            $mapb['display']=1;
            $remproduct = $object->getProduct('',$mapb,'','','',2);
            $this->assign('remproduct',$remproduct);
            //已出售的域名
            $mapa['issale']=2;
            $mapa['display']=1;
            $saleroduct = $object->getProduct('',$mapa,'','','',2);
            $this->assign('saleroduct',$saleroduct);
        }
        if($sysinfo['sys_template']=='bao'){
            $cid = I('get.cid');
            if($cid){
                $mapb['display']=1;
                $mapb['domain_category']=$cid;
                $remproduct = $object->getProduct('',$mapb,'','','',2);
                $this->assign('remproduct',$remproduct);
                //获取分类信息
                $catemap['id']=$cid;
                $cateinfo = $obj->getCate('',$catemap);
                $this->assign('cateinfo',$cateinfo);
                $this->assign('cid',$cid);
            } else {
                foreach($cate as $ck=>$cv){
                    $mapcb['display']=1;
                    $mapcb['domain_category']=$cv['id'];
                    $remproduct = $object->getProduct('',$mapcb,'','','',2);
                    $cate[$ck]['domains'] = $remproduct;
                }
                $this->assign('catedomain',$cate);
            }
            
        }
        //友情链接
        $friendobject = new \Adm\Model\FriendModel();
        $allfriend = $friendobject->getFriend('','','','','',2);
        //print_r($allfriend);die;
        $this->assign('allfriend',$allfriend);
        $this->display();
    }
}