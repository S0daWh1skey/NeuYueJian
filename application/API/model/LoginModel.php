<?php
namespace app\Home\model;

use think\Db;
use think\Model;

class LoginModel extends Model{
    public function login($uName,$uPwd){

        $result=Db::name('user')->where('UserName',$uName)
            ->find();
        if(!$result){
            return 0;
        }
        elseif (md5($uPwd)!=$result['UserPwd']){
            return 1;
        }else{
            return $result['UserID'];
            //return 3;
        }
    }
}