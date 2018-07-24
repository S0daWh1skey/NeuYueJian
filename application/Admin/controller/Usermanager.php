<?php
namespace app\Admin\controller;

use think\Controller;
use think\Db;
class Usermanager extends Controller
{
    public function index(){
        if(request()->isPost()){
            $SearchItem = input('param.search');
            $Users=Db::name('User')->where('UserName','like','%'.$SearchItem.'%')
                ->paginate(20);
            $this->assign("ulist",$Users);
            return $this->fetch();

        }
        $Users=Db::name("User")->paginate(20);//查询数据分页，每页20个数据
        $this->assign("ulist",$Users);//将查询结果转化为模版
        return $this->fetch();
    }

    public function delete($id){
        $PrePic=Db::name("User")->where("UserID",$id)->field("UserPic")->find();
        unlink(ROOT_PATH . 'public' . DS . 'static' . DS .'images'. DS .$PrePic['UserPic']);
        if(Db::name("User")->delete($id))//执行删除sql
        {
            //Db::name("videos")->getLastSql();exit;

            $this->success('删除成功');//删除成功
        }else $this->error('删除失败');//删除失败
    }//删除函数
    public function detail(){
        $Uid=input('param.UserID');//获得Did
        //select用于查询0到的多条记录
        //find用于查询一条记录
        $User=Db::name("User")->find($Uid);//根据Did查询数据库

        echo json_encode($User);//以JSON格式返回
    }//对应index.html中的AJAX

    public function update(){
        if(request()->isPost()){
            $UserID=input('UserId');
            $data=[
                'UserID'=>input('UserId'),
                'UserName'=>input('uName'),
                'UserEmail'=>input('uEmail'),
                'UserPhoneNumber'=>input('uPhone'),
                'SportValue'=>input('uValue'),
            ];//将传过来的数据转化为数组 这里必须写ID 否则缺少更新条件
            //存入数据库
            //dump($data)
            //$data=['typename'=>$typename];
            $res=Db::name("User")->update($data);//更新sql语句
            if($res){
                echo "<script>
                        history.back(-1);
                        alert('修改用户信息成功');
                        history.back(-1);
//                        $(#my-popups).modal('hide');
                        </script>";//成功执行
            }else{
                echo "<script>alert('修改用户信息失败');
                        history.back(-1);
                        </script>";//失败执行
            }
        }
    }//更新函数


    public function Userdetail(){
        $UserID = input('uID');
        $Users=Db::name("User")->where('UserID',$UserID)->select();
        $UserJoinActivity = Db::name('Orderform')
            ->join('Activity','Activity.ActivityID=Orderform.OrderActivityID')
            ->where('OrderUID',$UserID)
            ->field('ActivityName')
            ->select();
        $UserJoinClass = Db::name('Trainingorder')
            ->join('Class','Class.ClassID=Trainingorder.OrderClassID')
            ->where('OrderUID',$UserID)
            ->field('ClassName')
            ->select();
        $UserComment = Db::name('Comment')
            ->field('CommentContent,CommentTime')
            ->where('From_uid',$UserID)
            ->select();
        $UserPostPic = Db::name('Sharepicture')
            ->where('PicUserID',$UserID)
            ->field('PicUploadTime,Pic,PicContent')
            ->select();
        //dump($UserComment);
        $this->assign("ulist",$Users);//将查询结果转化为模版
        $this->assign('uJoinAlist',$UserJoinActivity);
        $this->assign('uJoinClist',$UserJoinClass);
        $this->assign('uCommentlist',$UserComment);
        $this->assign('uPostlist',$UserPostPic);
        return $this->fetch();
    }


}