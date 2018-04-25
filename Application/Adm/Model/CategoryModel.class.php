<?php
  namespace Adm\Model;
  use Think\Model;
  class CategoryModel extends Model {
      
   public function addCate($data){
       if($this->create($data)){
            $res = $this->add();
            return $res ? $res : 0; //0-未知错误，大于0-成功
       } else {
            return $this->getError(); //错误详情见自动验证注释
       }
   }
    /**
   *function 获取子分类信息 
   * $pid int 父类ID
   */   
   public function getCategory($map){
       if($map){
           $list = $this->where($map)->order('category_order')->select();
       } else {
           $list = $this->order('category_order')->select();
       }
       return $list;
   }
   public function updateCate($map, $data){
       $res = $this->where($map)->save($data); // 根据条件更新记录
        if($res){
            return 1;
        } else {
            return 0;
        }
   }
    public function getCate($field = true, $map, $order = 'id DESC', $type = 1){
        if($type ==1){
           $res = $this->field($field)->where($map)->order($order)->find(); 
        } else {
           $res = $this->field($field)->where($map)->order($order)->select();
        }
        return $res;
    }
    public function del($map){
        $pid = $this->where($map)->delete();
        return $pid ? $pid : 0; //0-未知错误，大于0-注册成功
    }
    public function getOneCate($id){
       $res = $this->where('id="'.$id.'"')->find();
       return $res;
   }
  }
?>
