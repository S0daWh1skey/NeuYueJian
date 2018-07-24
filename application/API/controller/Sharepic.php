<?php
namespace app\API\controller;

use think\Controller;
use think\Db;

class Sharepic extends Controller
{
    public function PicList(){
        $PicList =Db::name("Sharepicture")
            ->join("User","Sharepicture.PicUserID=User.UserID")
            ->join("Comment","Comment.PicID=Sharepicture.PicID")
            ->field("UserName,UserPic,Pic,PicContent,Pictag,COUNT(CommnetID) as CommentNumber")
            ->select();
        $PicListNoComment =Db::name("Sharepicture")
            ->join("User","Sharepicture.PicUserID=User.UserID")
            ->field("UserName,UserPic,Pic,PicContent,Pictag")
            ->select();
        $PicListJson = json_encode($PicList);
        $PicListNoCommentJson = json_encode($PicListNoComment);
        $Str = '{"PicWithComment":'.$PicListJson.',"PicWithoutComment":'.$PicListNoCommentJson."}";
        echo $Str;

    }

    public function PicDetail(){
        $PicID = input("PicID");
        $PicDetail = Db::name("Sharepicture")->where("PicID",$PicID)->find();
        $PicDetailJson = json_encode($PicDetail);
        echo $PicDetailJson;
    }

    public function GetComment(){
        $PicID = input("PicID");
        $CommentList = Db::name("Comment")
            ->where("PicID",$PicID)->select();
        $CommentListJson = json_encode($CommentList);
        echo $CommentListJson;
    }

    public function PostPic(){
        if(request()->isPost()){
            $info="";
            $file = request()->file('Sharepic');
            // 移动到框架应用根目录/public/uploads/ 目录下
            if($file){
                $info = $file->rule('datea')->move('static/Sharepic/');
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
                $data=[
                    'PicUserID'=>input("UserID"),
                    'PicContent'=>input("PicContent"),
                    'PicUploadTime'=>date('Y-m-d'),
                    'Pictag'=>input('Tag'),
                    'Pic'=>$this->pic,
                ];
                $res=Db::name('Sharepicture')->insert($data);
                if($res){
                    return json([
                        'status'=>'1',
                        'msg'=>'发布成功',
                    ]);
                }else{
                    return json([
                        'status'=>'2',
                        'msg'=>'发布失败',
                    ]);
                }
            }


        }
    }



    public function PostComment()
    {
        if (request()->isPost()) {
            $Data = [
                'PicID' => input("PicID"),
                'CommentContent' => input("CommentContent"),
                'From_uid' => input("From_uid"),
                'To_uid'=>input('To_uid'),
                'CommentTime' => date('Y-m-d-H-m-s'),
            ];
            $PicID = input('PicID');
            $SQL = "UPDATE Sharepicture SET CommentCount = CommentCount+1 WHERE PicID = $PicID";
            Db::startTrans();
            try{
                Db::name('Comment')->insert($Data);
                Db::execute($SQL);
                // 提交事务
                Db::commit();
            } catch (\Exception $e) {
                // 回滚事务
                Db::rollback();
                return json([
                    'status' => '2',
                    'msg' => '发布失败',
                ]);
            }
                return json([
                    'status' => '1',
                    'msg' => '发布成功',
                ]);
            }

        }
}