<?php
namespace app\API\controller;

use think\Controller;
use think\Db;

class Club extends Controller
{
    public function ClubList()
    {
        $res = Db::name('Club')->field('ClubName,ClubPic')->select();
        echo json_encode($res);
    }

    public function ClubDetail()
    {
        $clubid = input("ClubID");

        $clubdetail = Db::name("club")->where("ClubID", $clubid)->find();
        $detailjson = json_encode($clubdetail);
        $Coach = Db::name("Coach")->where("ClubID", $clubid)->find();
        $Coachjson = json_encode($Coach);

        $str = '{"clubDetail":' . $detailjson . ',"coachList":' . $Coachjson . "}";
        echo $str;

    }

    public function ClubClassList()
    {
        $clubid = input("ClubID");

        $ClubClass = Db::name("Class")->where("ClubID", $clubid)
            ->field("ClassName,ClassSIntro,ClassPrice,ClassGrade")->select();
        $ClubClassJson = json_encode($ClubClass);
        echo $ClubClassJson;
    }

    public function ClubVideoList()
    {
        $clubid = input("ClubID");
        $ClubVideo = Db::name("Video")->where("ClubID", $clubid)->field("VideoSrc")->select();
        $ClubVideoJson = json_encode($ClubVideo);
        echo $ClubVideoJson;
    }

    public function ClubFavor()
    {
        $UserID = input('UserID');
        if (request()->isPost()) {
            $Data = [
                'ClubID' => input("ClubID"),
                'UserID' => input('UserID'),
                'FavorTime' => date('Y-m-d-H-m-s'),
            ];
            $isFavor = Db::name('Clubfavor')->where('UserID',$UserID)->count("*");
            if ($isFavor==0){
                $res = Db::name('Clubfavor')->insert($Data);
            }
            else{
                return json([
                    'status' => '3',
                    'msg' => '已经关注了！',
                ]);
            }
            if ($res) {
                return json([
                    'status' => '1',
                    'msg' => '关注成功',
                ]);
            } else {
                return json([
                    'status' => '2',
                    'msg' => '关注失败',
                ]);
            }

        }

    }
}