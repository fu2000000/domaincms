<?php
/**
* date:2014-11-05
* author:fupj<fu2000000@163.com> 
* function:产品管理模块
*/
namespace Adm\Controller;
use Think\Controller;
class ProductController extends CheckAuthController {
    public function index(){
         $labelObject = new \Adm\Model\LabelModel();
         $zhuceshang = $labelObject->getLables(5);
         $this->assign('zhuceshang',$zhuceshang);
         $cateObject = new \Adm\Model\CategoryModel();
         $maps['category_status']=1;
         $allcate = $cateObject->getCate('',$maps,'',2);

         $this->assign('allcategory',$allcate);// 赋值数据集
         $object = new \Adm\Model\ProductsModel();
         $labelObject = new \Adm\Model\LabelModel();
         if(I('post.domain_name')){
            $map['domain_name'] = I('post.domain_name');
         }
         if(I('post.domain_category')){
            $map['domain_category'] = I('post.domain_category');
         }
         if(I('post.domain_zhuceshang')){
            $map['domain_zhuceshang'] = I('post.domain_zhuceshang');
         }
         if(I('post.isrec')){
            $map['recommend'] = I('post.isrec');
         }
         
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
             $map['id'] = $v['hangye'];
              $label = $labelObject->getLabel('label_name',$map);
              $res[$k]['area'] = $label['label_name'];
         }

         $this->assign('res',$res);// 赋值数据集
         $this->assign('page',$show);// 赋值分页输出
         
         $this->display();
    }
   
    public function addProduct(){
         $pid = I('get.pid');
         $object = new \Adm\Model\ProductsModel();
         $labelObject = new \Adm\Model\LabelModel();
         $category = $labelObject->getLables(2);
         $zhuceshang = $labelObject->getLables(5);
         $cateObject = new \Adm\Model\CategoryModel();
         $map['category_status']=1;
         $allcate = $cateObject->getCate('',$map,'',2);
         if($pid){
            $map['id'] = $pid;
            $res = $object->getProduct('', $map);
            $res['photoalbumarray'] = explode('|',$res['weixin_jietu']);
            $labelmap['id'] = $res['weixin_province'];
            $catemap['id'] = $res['weixin_category'];
            $label = $labelObject->getLabel('label_name',$labelmap);
            $clabel = $labelObject->getLabel('label_name',$catemap);
            $res['area'] = $label['label_name'];
            $res['category'] = $clabel['label_name'];
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
           $object = new \Adm\Model\ProductsModel();
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
        $object = new \Adm\Model\ProductsModel();
        
        if(!empty($data)){
          
          
          if(!empty($data['pid'])){
              $data['update_time'] = date('Y-m-d H:i:s');
              $map['id'] = $data['pid'];
              unset($data['pid']);
              $up = $object->updateProduct($map, $data);
              if($up){
                 $this->success('更新成功', U('/adm-product')); 
              } else {
                 $this->error('更新失败', U('/adm-product-addproduct')); 
              }
          } else {
              $data['add_time'] = date('Y-m-d H:i:s');

              $res = $object->addProduct($data);
              if($res){
                 $this->success('添加成功', U('/adm-product')); 
              } else {
                 $this->error('添加失败', U('/adm-product-addproduct')); 
              } 
          }
          
        } else {
             $this->success('操作错误', U('/'));
        }
    }
    public function setajax(){
       $adids = I('get.adIds'); 
       $num = I('get.num');
       $object = new \Adm\Model\ProductsModel();
       $map['id'] = array("in","{$adids}");
       if($num==1){          
           $res = $object->del($map);
       }
       if($num==2){          
           $data['issale']=2;
           $res = $object->updateProduct($map,$data);
       }
       if($num==3){
           $data['recommend']=1;
           $res = $object->updateProduct($map,$data);
       }
       if($num==4){
           $data['recommend']=2;
           $res = $object->updateProduct($map,$data);
       }
       if($num==5){
           $data['display']=2;
           $res = $object->updateProduct($map,$data);
       }
       if($num==6){
           $data['display']=1;
           $res = $object->updateProduct($map,$data);
       } 
       if($res){
           echo 1;die;
       } else {
           echo 2;die;
       } 
    }
    
    public function importdomain(){
       $this->display(); 
    }
    public function doimport(){ 
        header("Content-type: text/html; charset=utf-8");   
        if($_FILES["file"]){
           $object = new \Adm\Model\ProductsModel();
            Vendor('Excel.reader');//加载excel类 
            $data = new \Spreadsheet_Excel_Reader();
            $data->setOutputEncoding('CP936');
            $data->read($_FILES["file"]["tmp_name"]);
            $data_sheets = $data->sheets;
            $data_arr = $data_sheets[0]['cells'];
            foreach($data_arr as $k => $v){
                $data_arr[$k][1] = trim($v[1]);
                $data_arr[$k][2] = trim($v[2]);
                if($data_arr[$k][1] == '') $error[] = "第{$k}行，第1列,内容为空";
                if($data_arr[$k][2] == '') $error[] = "第{$k}行，第2列,内容为空";                 
            }
            if(empty($error)){
                foreach($data_arr as $k=>$v){
                    $newdata['domain_name'] = $v[1];
                    $newdata['domain_description'] = iconv('gb2312', "utf-8", $v[2]);
                    $newdata['price'] = $v[3];
                    $newdata['domain_category'] = $v[4];
                    $newdata['add_time'] = date('Y-m-d H:i:s');
                    $res = $object->addProduct($newdata);
                    if($res){
                        echo "域名{$v[1]}添加成功。<br />";
                    }else{
                        echo "域名{$v[1]}添加失败。<br />";                 
                    }
                }
            }else{
                print(implode("<br />",$error));
            }
        }
    }
}