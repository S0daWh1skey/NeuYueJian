<?php
namespace app\API\controller;
header("Content-Type: text/html;charset=utf-8");
header('Access-Control-Allow-Origin:*');//允许跨域
use think\Controller;
use think\Db;
class reg extends Controller
{
    public function DoReg(){
        $info="";
        $file = request()->file('pic');
        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $info = $file->rule('datea')->move('static/images/');
            if($info){
                // 成功上传后 获取上传信息
                // 输出 jpg
                //echo $info->getExtension();
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                $this->pic = $info->getSaveName();
                // 输出 42a79759f284b767dfcb2a0197904287.jpg
                //echo $info->getFilename();
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
        if(request()->isPost()){
            $password=input('password');
            $md5Pwd=md5($password);
            $data=[
                'UserName'=>input('username'),
                'UserPwd'=>$md5Pwd,
                'UserEmail'=>input('email'),
                'UserPhoneNumber'=> input('PhoneNum'),
                'UserPic'=>$this->pic,
            ];
            $res=Db::name('user')->insert($data);
            if($res){
                return json([
                    'status'=>'1',
                    'msg'=>'注册成功',
                ]);
            }else{
                return json([
                    'status'=>'2',
                    'msg'=>'注册失败',
                ]);
            }
        }

    }

}