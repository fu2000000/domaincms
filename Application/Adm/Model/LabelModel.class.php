<?php
  namespace Adm\Model;
  use Think\Model;
  class LabelModel extends Model {
      
   public function getLabel($field = true, $map, $order = 'id DESC', $type = 1){
        if($type ==1){
           $res = $this->field($field)->where($map)->order($order)->find(); 
        } else {
           $res = $this->field($field)->where($map)->order($order)->select();
        }
        return $res;
    }
    public function getLables($status){
       $res = $this->order('label_order desc')->where('label_type="'.$status.'"')->select();
       return $res;
   }
    /**
     * 添加新的微信帐号
     * @return integer
     */
    public function addLables($data){
        /* 添加用户 */
        //print_r($data);die;
        if($this->create($data)){
            $lid = $this->add();
            return $lid ? $lid : 0; //0-未知错误，大于0-注册成功
        } else {
            return $this->getError(); //错误详情见自动验证注释
        }
    }
    public function getLabelName($id){
        $res = $this->where('id="'.$id.'"')->field('label_name')->find();
        return $res;
    }
  }
?>
