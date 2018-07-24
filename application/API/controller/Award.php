<?php
namespace app\API\controller;

use think\Controller;
use think\Db;

class Award extends Controller
{
    public function AwardList()
    {
        $AwardList = Db::name("Award")->field("AwardName,AwardPic,AwardTitle,Isrecommend")->select();
        $AwardListJson = json_encode($AwardList);
        echo $AwardListJson;
    }

    public function AwardDetail()
    {
        $AwardID = input("AwardID");
        $AwardDetail = Db::name("Award")->where("AwardID", $AwardID)->find();
        $AwardDetailJson = json_encode($AwardDetail);
        echo $AwardDetailJson;
    }

    public function AwardRedeem()
    {
        $UserID = input('UserID');
        $Value = input('RedeemValue');
        $SQL = "UPDATE User SET SportValue = SportValue-$Value WHERE UserID = $UserID";
        if (request()->isPost()) {
            $data = [
                'AwardRedeemUID' => input('UserID'),
                'AwardRedeemAwardID' => input('AwardID'),
                'RedeemName' => input('TrueName'),
                'RedeemPhone' => input('PhoneNum'),
                'RedeemAddress' => input('Address'),
                'RedeemZip' => input('Zip'),
            ];
            Db::startTrans();
            try{
                Db::name('Redeem')->insert($data);
                Db::execute($SQL);
                // 提交事务
                Db::commit();
                return json([
                    'status' => '1',
                    'msg' => '兑换成功',
                ]);
            } catch (\Exception $e) {
                // 回滚事务
                Db::rollback();
                return json([
                    'status' => '2',
                    'msg' => '兑换失败',
                ]);
            }
        }

    }

    public function AwardedList(){
        $UserID = input('UserID');
        $AwardedList = Db::name('Redeem')
            ->join('Award','Redeem.AwardRedeemAwardID=Award.AwardID')
            ->field('AwardName,AwardPic,AwardTitle,AwardRedeemStatus')
            ->where('AwardRedeemUID',$UserID)
            ->select();
        $AwardedListJson = json_encode($AwardedList);
        echo $AwardedListJson;
    }

}