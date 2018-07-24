<?php
namespace app\Admin\controller;

use think\Controller;
use think\Db;
class Picmanager extends Controller
{
    public function Index(){
        $PicList=Db::name("Sharepicture")
            ->join('User','User.UserID=Sharepicture.PicUserID')
            ->field('UserName,PicUploadTime,Pic,PicContent,PicID,Pictag,CommentCount')
            ->paginate(20);//查询数据分页，每页20个数据
        $this->assign("plist",$PicList);//将查询结果转化为模版
        return $this->fetch();
    }
    public function delete($id){
        $Pic=Db::name("Sharepicture")->where("PicID",$id)->field("Pic")->find();
        unlink(ROOT_PATH . 'public' . DS . 'static' . DS .'Sharepic'. DS .$Pic['Pic']);
        if(Db::name("Sharepicture")->delete($id))//执行删除sql
        {
            //Db::name("videos")->getLastSql();exit;

            $this->success('删除成功');//删除成功
        }else $this->error('删除失败');//删除失败
    }//删除函数
    public function Commentdetail(){
        $PicID = input('pID');
        $Comments=Db::name("Comment")
            ->join('User','User.UserID=Comment.From_uid')
            ->field('UserName,CommnetID,CommentContent,CommentTime')
            ->where('PicID',$PicID)->select();
        $this->assign('clist',$Comments);
        return $this->fetch();
    }
    public function deleteComment($id){
        if(Db::name("Comment")->delete($id))//执行删除sql
        {
            //Db::name("videos")->getLastSql();exit;

            $this->success('删除成功');//删除成功
        }else $this->error('删除失败');//删除失败
    }

}