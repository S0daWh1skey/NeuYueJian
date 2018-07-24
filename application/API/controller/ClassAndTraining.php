<?php
namespace app\API\controller;

use think\Controller;
use think\Db;

class ClassAndTraining extends Controller
{
    public function TrainingList(){
        $TrainingList = Db::name("Class")->field("ClassName,ClassPic")->select();
        $TrainingListJson = json_encode($TrainingList);
        echo $TrainingListJson;
    }

    public function TrainingDetail(){
        $classid=input("ClassID");
        $TrainingDetail = Db::name("Class")->where("ClassID",$classid)->find();
        $TrainingDetailJson = json_encode($TrainingDetail);
        echo $TrainingDetailJson;
    }

    public function OrderTraining(){
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
        if(request()->isPost()){
            $data=[
                'OrderClassID'=>input("ClassID"),
                'OrderUID'=>input("UserID"),
                'OrderNumber'=>input("OrderNumber"),
                'OrderTime'=>date('Y-m-d'),
                'PayMethod'=>input('PayMethod'),
                'UserName'=>input('TrueName'),
                'UserPhoneNumber'=>input('UserPhoneNumber'),
                'OrderSNum'=>$order_id,
            ];
            $res=Db::name('trainingorder')->insert($data);
            if($res){
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

}