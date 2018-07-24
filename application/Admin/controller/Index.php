<?php
namespace app\Admin\controller;
use app\admin\model\Login;
use think\captcha\Captcha;
use \think\Controller;
use think\Db;
use think\Loader;
class Index extends Controller
{
    public function index()
    {
        if (input('?param.err')){
            echo "<script>alert('请登录后访问');</script>";
            //echo $_GET["err"];
        }
        if(request()->isPost()){
            $captcha=input('verifycode');
            if(!captcha_check($captcha)){
                echo "<script>alert('验证码错误！');</script>";
            }else{
                //验证管理员账号密码
                $a=input('adminname');
                $p=input('password');
                $log = new Login;
                $result=$log->login($a,$p);
                if ($result==1){
                    echo "<script>alert('账号不存在');</script>";
                }elseif ($result==2){
                    echo "<script>alert('密码错误');</script>";
                }elseif ($result==3){
                    //$this->redirect('video/index');
                    echo "<script>alert('登录成功');</script>";
                    $this->redirect('Usermanager/index');
//                    $stuff=Db::name('Stuff')->where('StuffName',$a)
//                        ->find();//登录成功，根据用户名查询员工所属部门
//                    db('Stuff')
//                        ->where('StuffName',$a)
//                        ->setField('LastLogin',date('Y-m-d H:i:s'));

                }
            }
        }
        return $this->fetch();
    }
    public function show_captcha(){
        ob_clean();
        $captcha = new Captcha();
        $captcha->useZh=false;
        //$captcha->zhSet="床前明月光疑是地上霜举头望思故乡";
        $captcha->useCurve = true;
        $captcha->fontSize = 20;
        $captcha->length   = 4;
        $captcha->useNoise = true   ;
        return $captcha->entry();
    }
//    查询密码
    public function Findpwd(){
        if(request()->isPost()){
            $email=input('email');
            //该邮箱是否存在
            $emailinfo=Db::name("Admin")->where("SuEmail",$email)->count();
            if($emailinfo){
                $title = "找回密码通知！";
                $srand = rand ( 111111, 999999 );
                $data ['SuRand'] = $srand;
                Db::name("Admin")->where ( "SuEmail = '$email'" )->update ( $data ); // 更新数据库
                // echo Db::name("users")->getLastSQL();die();
                $content = "校验码:$srand";

                if (SendMail ( $email, $title, $content )) {
                    $this->success( "发送成功,请到邮箱查看校验码!,
                    如果收件箱没有邮件，请查看垃圾邮箱", url('setpwd',['SuEmail'=>$email]) );
                    die ();
                } else {
                    //$this->error( $email->ErrorInfo );
                    echo '发送失败';
                    echo $email.$title.$content;
                    die ();
                }
            }else{
                $this->error("邮箱不存在");
            }
            //如果存在，则生成四位随机数，发到该邮箱
        }
        return $this->fetch();
    }
    public function setpwd(){
        if(request()->isPost()){
            $rand=input('rand');
            $newpwd=input('newpwd');
            $dbrand=Db::name("Admin")->where("SuEmail",session("stuffEmail"))->find();
            // var_dump($dbrand);
            if($rand!=$dbrand["rand"]){
                $this->success("验证码错误");
            }else{
                Db::name("Admin")->where("SuEmail",session("stuffEmail"))->update(["SuPWD"=>md5($newpwd)]);
                $this->success('重设密码成功',"index");
            }
        }else{
            $email=input("stuffEmail");
            session("stuffEmail",$email);
        }
        return $this->fetch();
    }

    public function Reg(){
        $password=input('password');
        $md5Pwd=md5($password);
        if(request()->isPost()){
            $data=[
                'ClubAdminName'=>input('username'),
                'ClubAdminPwd'=>$md5Pwd,
                'ClubAdminPhoneNum'=>input('phonenum'),
                'ClubAdminEmail'=>input('email'),
            ];
//            $vdata=[
//                'pwd'=>input('password'),
//                'email'=>input('email'),
//            ];
            $uPwd=input('password');
            $rePwd=input('repassword');
            if ($uPwd != $rePwd){
//                $data = '两次密码不一致，请确认';
                echo "<script>alert('两次密码不一致，请确认');</script>";
            }
            else{
//                $validate = Loader::validate('Stuff');
//
//                if(!$validate->check($vdata)){
//                    $this->error($validate->getError());
//                }
                $res=Db::name('Clubadmin')->insert($data);
                if($res){
                    $this->success("注册成功");
                }else{
                    $this->error("注册失败");
                }
            }
        }
        return $this->fetch();
    }

    public function Clubadminlogin(){
        if (input('?param.err')){
            echo "<script>alert('请登录后访问');</script>";
            //echo $_GET["err"];
        }
        if(request()->isPost()){
            $captcha=input('verifycode');
            if(!captcha_check($captcha)){
                echo "<script>alert('验证码错误！');</script>";
            }else{
                //验证管理员账号密码
                $a=input('adminname');
                $p=input('password');
                $log = new Login();
                $result=$log->Clubadminlogin($a,$p);
                if ($result==0){
                    echo "<script>alert('账号不存在');</script>";
                }elseif ($result==1){
                    echo "<script>alert('密码错误');</script>";
                }elseif ($result==2){
                    //$this->redirect('video/index');
                    echo "<script>alert('登录成功');</script>";

                }
            }
        }
        return $this->fetch();

    }

}
