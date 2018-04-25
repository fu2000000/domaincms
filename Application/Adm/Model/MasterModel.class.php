<?php
namespace Adm\Model;
use Think\Model;

/**
 * 后台用户模型
 * @author 白鹅 <fu2000000@163.com>
 */

class MasterModel extends Model {
    
    public function getMaster($field = true, $map, $order = 'id DESC', $type = 1){
        if($type ==1){
           $res = $this->field($field)->where($map)->order($order)->find(); 
        } else {
           $res = $this->field($field)->where($map)->order($order)->select();
        }
        return $res;
    }
    /**
    * 添加新用户 
    */
    public function addUser($data){
        /* 添加用户 */
        if($this->create($data)){
            $uid = $this->add();
            return $uid ? $uid : 0; //0-未知错误，大于0-注册成功
        } else {
            return $this->getError(); //错误详情见自动验证注释
        }
    }

    /**
     * 登录指定用户
     * @param  integer $uid 用户ID
     * @return boolean      ture-登录成功，false-登录失败
     */
    public function login($uid){
        /* 检测是否在当前应用注册 */
        $user = $this->field(true)->find($uid);
        if(!$user) {
            $this->error = '用户不存在或已被禁用！'; //应用级别禁用
            return false;
        }

        //记录行为
        //action_log('admin_login', 'member', $uid, $uid);

        /* 登录用户 */
        $this->autoLogin($user);
        return true;
    }

    /**
     * 注销当前用户
     * @return void
     */
    public function logout(){
        session('master_auth', null);
        session('master_auth_sign', null);
    }

    /**
     * 自动登录用户
     * @param  integer $user 用户信息数组
     */
    private function autoLogin($user){
        /* 更新登录信息 */
        /*$data = array(
            'uid'             => $user['uid'],
            'login'           => array('exp', '`login`+1'),
            'last_login_time' => NOW_TIME,
            'last_login_ip'   => get_client_ip(1),
        );
        $this->save($data);*/

        /* 记录登录SESSION和COOKIES */
        $auth = array(
            'masterid'              => $user['id'],
            'masterusername'        => $user['username'],
            'masterprivs'           => $user['privs'],
            'masterphone'           => $user['phone'],
        );

        session('master_auth', $auth);
        session('master_auth_sign', data_auth_sign($auth));

    }
    public function del($map){
        $uid = $this->where($map)->delete();
        return $uid ? $uid : 0; //0-未知错误，大于0-注册成功
    }
    public function updateUser($map, $data){
        $res = $this->where($map)->save($data); // 根据条件更新记录
        if($res){
            return 1;
        } else {
            return 0;
        }
    }
    public function getNickName($uid){
        return $this->where(array('uid'=>(int)$uid))->getField('nickname');
    }

}
