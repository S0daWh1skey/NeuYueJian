<?php
namespace app\Admin\controller;

use think\Controller;
use think\Db;
class Classmanager extends Controller
{
    public function index(){
        if(request()->isPost()){
            $SearchItem = input('param.search');
            $Class=Db::name('Class')->where('ClassName','like','%'.$SearchItem.'%')
                ->paginate(20);
            $this->assign("clist",$Class);
            return $this->fetch();

        }

        $Class=Db::name("Class")->paginate(20);//查询数据分页，每页20个数据
        $this->assign("clist",$Class);//将查询结果转化为模版
        return $this->fetch();

    }

    public function Classedit(){
        $ID = input('cID');
        $Class=Db::name("Class")
            ->where('ClassID',$ID)
            ->find();
        $this->assign("class",$Class);//将查询结果转化为模版
        //echo $Class['ClassName'];
        return $this->fetch();
    }

    public function update(){
        $ID=input("cid");
        $info="";
        $file = request()->file('pic');
        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $info = $file->rule('datea')->move('static/ClassPic/');
            if($info){
                // 成功上传后 获取上传信息
                // 输出 jpg
                //echo $info->getExtension();
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                $PrePic=Db::name("Class")->where("ClassID",$ID)->field("ClassPic")->find();
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
                'ClassID'=>input('cid'),
                'ClassName'=>input('CName'),
                'ClassIntro'=>input('CIntro'),
                'ClassPrice'=>input('CPrice'),
                'ClassAddress'=>input('CAddress'),
                'ClassPic'=>$this->pic,
                'ClassNotice'=>input('CNotice'),
                'ClassTime'=>input('CTime'),
                'ClassGrade'=>input('CGrade'),
                'ClubID'=>input('CClub'),
                'ClassSIntro'=>input('CSIntro'),
                'ClassType'=>input('CType'),
                'Isrecom'=>input('CRec')

            ];
            $res=Db::name("Class")->update($Data);//更新sql语句
            if($res){
                $this->deletePic(ROOT_PATH . 'public' . DS . 'static' . DS .'ClassPic'. DS .$PrePic['ClassPic']);
                //unlink(ROOT_PATH . 'public' . DS . 'static' . DS .'images'. DS .$PrePic['ClassPic']);
                echo "<script>
                        history.back(-1);
                        alert('修改培训信息成功');
                        history.back(-2);
                        </script>";//成功执行
            }else{
                echo "<script>alert('修改培训信息失败');
                        history.back(-1);
                        </script>";//失败执行
            }
        }
    }
    public function deletePic($path)
    {
        return is_file($path) && unlink($path);
    }

    public function Classadd(){
        return $this->fetch();
    }

    public function add(){
        //$ID=input("cid");
        $info="";
        $file = request()->file('pic');
        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $info = $file->rule('datea')->move('static/ClassPic/');
            if($info){
                // 成功上传后 获取上传信息
                // 输出 jpg
                //echo $info->getExtension();
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                //$PrePic=Db::name("Class")->where("ClassID",$ID)->field("ClassPic")->find();
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
                'ClassID'=>input('cid'),
                'ClassName'=>input('CName'),
                'ClassIntro'=>input('CIntro'),
                'ClassPrice'=>input('CPrice'),
                'ClassAddress'=>input('CAddress'),
                'ClassPic'=>$this->pic,
                'ClassNotice'=>input('CNotice'),
                'ClassTime'=>input('CTime'),
                'ClassGrade'=>input('CGrade'),
                'ClubID'=>input('CClub'),
                'ClassSIntro'=>input('CSIntro'),
                'ClassType'=>input('CType'),
                'Isrecom'=>input('CRec')

            ];
            $res=Db::name("Class")->insert($Data);//更新sql语句
            if($res){
                //$this->deletePic(ROOT_PATH . 'public' . DS . 'static' . DS .'ClassPic'. DS .$PrePic['ClassPic']);
                //unlink(ROOT_PATH . 'public' . DS . 'static' . DS .'images'. DS .$PrePic['ClassPic']);
                echo "<script>
                        history.back(-1);
                        alert('成功添加一条培训信息');
                        history.back(-2);
                        </script>";//成功执行
            }else{
                echo "<script>alert('添加培训信息失败');
                        history.back(-1);
                        </script>";//失败执行
            }
        }

    }

}