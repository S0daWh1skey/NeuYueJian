<?php
namespace app\API\controller;
header("Content-Type: text/html;charset=utf-8");
header('Access-Control-Allow-Origin:*');//允许跨域
use think\Controller;
use app\Home\model\LoginModel;

class Login extends Controller
{
    public function DoLogin(){
        $uName=input('username');
        $uPwd=input('password');
        $log = new LoginModel;
        $result=$log->login($uName,$uPwd);
        if ($result==0){
            return json([
                'status'=>'0',
                'msg'=>'账户不存在'
            ]);
        }elseif ($result==1){
            return json([
                'status'=>'1',
                'msg'=>'密码错误'
            ]);
        }else{
            return json([
                'status'=>'2',
                'msg'=>'登录成功',
                'userID'=>$result,
            ]);
        }
    }

}