<?php
/**
 * Created by PhpStorm.
 * User: wangchenyu
 * Date: 2018/7/8
 * Time: 10:56 AM
 */

namespace app\Admin\model;

use think\Db;
use think\Model;
use think\Session;

class login extends Model{
    public function login($adminname,$password){

        $res=Db::name('Admin')->where('SuName',$adminname)
            ->find();
        if(!$res){
            return 1;
            //echo "<script>alert('账号不存在');</script>";
        }
        elseif (md5($password)!=$res['SuPwd']){
            return 2;
            // echo "<script>alert('密码错误');</script>";
        }else{
            Session::set('login_admin',$adminname);
            //$this->redirect('video/index');
            return 3;
        }
    }
    public function Clubadminlogin($adminname,$password){

        $res=Db::name('Clubadmin')->where('ClubAdminName',$adminname)
            ->find();
        if(!$res){
            return 0;
            //echo "<script>alert('账号不存在');</script>";
        }
        elseif (md5($password)!=$res['ClubAdminPwd']){
            return 1;
            // echo "<script>alert('密码错误');</script>";
        }else{
            Session::set('login_admin',$adminname);
            //$this->redirect('video/index');
            return 2;
        }
    }
}