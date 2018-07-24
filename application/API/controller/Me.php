<?php
namespace app\API\controller;

use think\Controller;
use think\Db;

class Me extends Controller
{
    public function MeInfo(){
        $UserID = input('UserID');
        $MeInfo = Db::name("User")->where("UserID",$UserID)->find();
        $MeInfoJson = json_encode($MeInfo);
        echo $MeInfoJson;
    }

    public function EditHeadPic(){
        $UserID=input("UserID");
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
                $PrePic=Db::name("User")->where("UserID",$UserID)->field("UserPic")->find();
                $this->pic = $info->getSaveName();
                // 输出 42a79759f284b767dfcb2a0197904287.jpg
                //echo $info->getFilename();
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
        if(request()->isPost()){
            $Data=[
                'UserPic'=>$this->pic,
            ];
            $res=Db::name('user')->where('UserID',$UserID)->update($Data);
            if($res){
                //dump($picurl);
                unlink(ROOT_PATH . 'public' . DS . 'static' . DS .'images'. DS .$PrePic['UserPic']);
                return json([
                    'status'=>'1',
                    'msg'=>'修改成功',
                ]);
            }else{
                return json([
                    'status'=>'2',
                    'msg'=>'修改失败',
                ]);
            }
        }
    }

    public function EditInfo(){
        $UserID=input("UserID");
        if(request()->isPost()) {
            $Data = [
                'UserName'=>input('username'),
                'UserEmail'=>input('email'),
                'UserPhoneNumber'=>input('PhoneNum'),
            ];
            }
        $res=Db::name('user')->where('UserID',$UserID)->update($Data);
        if($res){
            return json([
                'status'=>'1',
                'msg'=>'修改成功',
            ]);
        }else{
            return json([
                'status'=>'2',
                'msg'=>'修改失败',
            ]);
        }

    }

    public function EditPwd(){
        $UserID=input("UserID");
        if(request()->isPost()) {
            $password=input('password');
            $md5Pwd=md5($password);
            $data=[
                'UserPwd'=>$md5Pwd,
            ];
            $res=Db::name('user')->where('UserID',$UserID)->update($Data);
            if($res){
                return json([
                    'status'=>'1',
                    'msg'=>'修改成功',
                ]);
            }else{
                return json([
                    'status'=>'2',
                    'msg'=>'修改失败',
                ]);
            }

        }
    }

    public function FavorList(){
        $UserID=input("UserID");
        $Favorlist = Db::name('Clubfavor')
            ->join('Club','Clubfavor.ClubID=Club.ClubID')
            ->field('ClubName,Club.ClubID,ClubPic')
            ->where('UserID',$UserID)
            ->select();
        $FavorlistJson = json_encode($Favorlist);
        echo $FavorlistJson;
    }

    public function ActivityOrderList(){
        $UserID=input("UserID");
        $ActivityOrderList = Db::name('Orderform')->where('OrderUID',$UserID)
            ->join('Activity','Activity.ActivityID=Orderform.OrderActivityID')
            ->field('OrderSNum,OrderStatus,ActivityName,ActivityPic,OrderTime,OrderTotalPrice')
            ->select();
        $ActivityOrderListJson = json_encode($ActivityOrderList);
        echo $ActivityOrderListJson;
    }

    public function ClassOrderList(){
        $UserID=input("UserID");
        $ClassOrderList = Db::name('Trainingorder')->where('OrderUID',$UserID)
            ->join('Class','Class.ClassID=Trainingorder.OrderClassID')
            ->field('OrderSNum,OrderStatus,ClassName,ClassPic,OrderTime,OrderTotalPrice')
            ->select();
        $ClassOrderListJson = json_encode($ClassOrderList);
         echo $ClassOrderListJson;
    }

    public function ReadyActivityOrderList(){
        $UserID=input("UserID");
        $ActivityOrderList = Db::name('Orderform')
            ->where('OrderUID',$UserID)
            ->where('OrderStatus',1)
            ->join('Activity','Activity.ActivityID=Orderform.OrderActivityID')
            ->field('OrderSNum,OrderStatus,ActivityName,ActivityPic,OrderTime,OrderTotalPrice')
            ->select();
        $ActivityOrderListJson = json_encode($ActivityOrderList);
        echo $ActivityOrderListJson;
    }

    public function ReadyClassOrderList(){
        $UserID=input("UserID");
        $ClassOrderList = Db::name('Trainingorder')
            ->where('OrderUID',$UserID)
            ->where('OrderStatus',1)
            ->join('Class','Class.ClassID=Trainingorder.OrderClassID')
            ->field('OrderSNum,OrderStatus,ClassName,ClassPic,OrderTime,OrderTotalPrice')
            ->select();
        $ClassOrderListJson = json_encode($ClassOrderList);
        echo $ClassOrderListJson;
    }

    public function FinishedActivityOrderList(){
        $UserID=input("UserID");
        $ActivityOrderList = Db::name('Orderform')
            ->where('OrderUID',$UserID)
            ->where('OrderStatus',2)
            ->join('Activity','Activity.ActivityID=Orderform.OrderActivityID')
            ->field('OrderSNum,OrderStatus,ActivityName,ActivityPic,OrderTime,OrderTotalPrice')
            ->select();
        $ActivityOrderListJson = json_encode($ActivityOrderList);
        echo $ActivityOrderListJson;
    }

    public function FinishedClassOrderList(){
        $UserID=input("UserID");
        $ClassOrderList = Db::name('Trainingorder')
            ->where('OrderUID',$UserID)
            ->where('OrderStatus',2)
            ->join('Class','Class.ClassID=Trainingorder.OrderClassID')
            ->field('OrderSNum,OrderStatus,ClassName,ClassPic,OrderTime,OrderTotalPrice')
            ->select();
        $ClassOrderListJson = json_encode($ClassOrderList);
        echo $ClassOrderListJson;
    }

    public function ActivityOrderDetail(){
        $OrderID=input("OrderID");
        $ActivityOrderDetail = Db::name('Orderform')
            ->where('OrderID',$OrderID)
            ->join('Activity','Activity.ActivityID=Orderform.OrderActivityID')
            ->find();
        $ActivityOrderDetailJson = json_encode($ActivityOrderDetail);
        echo $ActivityOrderDetailJson;
    }

    public function ClassOrderDetail(){
        $OrderID=input("OrderID");
        $ActivityOrderDetail = Db::name('Trainingorder')
            ->where('OrderID',$OrderID)
            ->join('Class','Class.ClassID=Trainingorder.OrderClassID')
            ->find();
        $ActivityOrderDetailJson = json_encode($ActivityOrderDetail);
        echo $ActivityOrderDetailJson;
    }

    public function MeSharePicList(){
        $UserID=input("UserID");
        $MeSharePic = Db::name('Sharepicture')->where('PicUserID',$UserID)
            ->join('User','User.UserID=Sharepicture.PicUserID')
            ->field('UserName,UserPic,PicUploadTime,Pic,PicContent')
            ->select();
        $MeSharePicJson = json_encode($MeSharePic);
        echo $MeSharePicJson;
    }



}