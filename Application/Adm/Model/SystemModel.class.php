<?php
  namespace Adm\Model;
  use Think\Model;
  class SystemModel extends Model {
      
   public function addSys($data){
       if($this->create($data)){
            $res = $this->add();
            return $res ? $res : 0; //0-未知错误，大于0-成功
       } else {
            return $this->getError(); //错误详情见自动验证注释
       }
   }
   public function updateSys($map, $data){
       $res = $this->where($map)->save($data); // 根据条件更新记录
        if($res){
            return 1;
        } else {
            return 0;
        }
   }

    public function getSys($field = true, $map, $order = 'id desc', $firstRow, $listRows, $type = 1){
        if($type ==1){
           $res = $this->field($field)->where($map)->order('id desc')->find(); 
        } else {
           $res = $this->field($field)->where($map)->order('id desc')->limit($firstRow.','.$listRows)->select();
        }
        return $res;
    }
  }
?>
