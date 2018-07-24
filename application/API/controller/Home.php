<?php
namespace app\API\controller;

use think\Controller;
use think\Db;

class Home extends Controller
{
    public function ActivityList(){
        $ActivityList = Db::name("Activity")->field("ActivityName,ActivityPic,ActivityLikeNum")->select();
        $ActivityListJson = json_encode($ActivityList);
        echo $ActivityListJson;

    }

    public function ActivityDetail(){
        $ActivityID=input("ActivityID");
        $ActivityDetail = Db::name("Activity")->where("ActivityID",$ActivityID)->find();
        $ActivityDetailJson = json_encode($ActivityDetail);
        echo $ActivityDetailJson;
    }

    public function OrderActivity(){
        if(request()->isPost()){
            @date_default_timezone_set("PRC");
            //订购日期
            $order_date = date('Y-m-d');
            //订单号码主体（YYYYMMDDHHIISSNNNNNNNN）
            $order_id_main = date('YmdHis') . rand(10000000,99999999);
            //订单号码主体长度
            $order_id_len = strlen($order_id_main);
            $order_id_sum = 0;
            for($i=0; $i<$order_id_len; $i++){
                $order_id_sum += (int)(substr($order_id_main,$i,1));
            }
            //唯一订单号码（YYYYMMDDHHIISSNNNNNNNNCC）
            $order_id = $order_id_main . str_pad((100 - $order_id_sum % 100) % 100,2,'0',STR_PAD_LEFT);
            $data=[
                'OrderActivityID'=>input("ActivityID"),
                'OrderUID'=>input("UserID"),
                'OrderAdultNumber'=>input("OrderAdultNumber"),
                'OrderStudentNumber'=>input("OrderStudentNumber"),
                'OrderTime'=>date('Y-m-d'),
                'PayMethod'=>input('PayMethod'),
                'UserName'=>input('TrueName'),
                'UserPhoneNumber'=>input('UserPhoneNumber'),
                'OrderSNum'=>$order_id,
            ];
            $InsuranceData=[
                'OrderSNum'=>$order_id,
                'InsuranceName'=>input("InsuranceName"),
                'InsuranceIDNumber'=>input("InsuranceIDNumber"),
            ];
            $InsuranceRes=Db::name("Insurance")->insert($InsuranceData);
            $res=Db::name('Orderform')->insert($data);
            if($res&&$InsuranceRes){
                return json([
                    'status'=>'1',
                    'msg'=>'下单成功',
                ]);
            }else{
                return json([
                    'status'=>'2',
                    'msg'=>'下单失败',
                ]);
            }
        }
    }

    public function MasterList(){
        $MasterList = Db::name('Master')->field("Mastername,MaterFacePic,MasterLikeNum")->select();
        $MasterListJson = json_encode($MasterList);
        echo $MasterListJson;
    }

    public function MasterDetail(){
        $MasterID = input("MasterID");
        $MasterDetail = Db::name("Master")->where("MasterID",$MasterID)->find();
        $MasterDetailJson = json_encode($MasterDetail);
        echo $MasterDetailJson;
    }

    public function MasterClassList(){
        $MasterID = input("MasterID");
        $MasterClassList = Db::name("Video")->field("VideoName,VideoSrc,VideoLikeNum")->where("MasterID",$MasterID)->find();
        $MasterClassListJson = json_encode($MasterClassList);
        echo $MasterClassListJson;
    }

    public function MasterQAList(){
        $MasterQAList = Db::name("Questionandanswer")
            ->join("Master",'Master.MasterID=Questionandanswer.QAndAAUID')
            ->join("User","Questionandanswer.QAndAQUID=User.UserID")
            ->field("Mastername,QAndAQContent,QAndAAContent,UserName,QAndAQTime,QAndAATime")->select();
        $MasterQuestionNoAnswerList = Db::name("Questionandanswer")
            ->join("User","Questionandanswer.QAndAQUID=User.UserID")
            ->field("QAndAQContent,UserName,QAndAQTime")->where("QAndAAUID",NULL)->select();
        $MasterQAListJson = json_encode($MasterQAList);
        $MasterQuestionNoAnswerListJson = json_encode($MasterQuestionNoAnswerList);
        $Str = '{"Q&A":'.$MasterQAListJson.',"QnoA":'.$MasterQuestionNoAnswerListJson."}";
        echo $Str;
    }

    public function PostQuestion(){
        if(request()->isPost()){
            $data=[
                'QAndAQUID'=>input("UserID"),
                'QAndAQContent'=>input("QuestionContent"),
                'QAndAQTime'=>date('Y-m-d-H-m-s'),
            ];
            $res=Db::name('Questionandanswer')->insert($data);
            if($res){
                return json([
                    'status'=>'1',
                    'msg'=>'成功发送提问',
                ]);
            }else{
                return json([
                    'status'=>'2',
                    'msg'=>'发送提问失败',
                ]);
            }

        }
    }

    public function MatchList(){
        $MatchList = Db::name("Match")->field("MatchName,MatchPic")->select();
        $MatchListJson = json_encode($MatchList);
        echo $MatchListJson;
    }
    public function MatchDetail(){
        $MatchID = input("MatchID");
        $MatchDetail = Db::name("Match")->where("MatchID",$MatchID)->find();
        $MatchDetailJson = json_encode($MatchDetail);
        echo $MatchDetailJson;
    }


}