<?php
namespace app\Admin\controller;

use think\Controller;
use think\Db;
class Cluadminmanager extends Controller
{
    public function index(){
        $Clubadmin=Db::name("Clubadmin")->paginate(20);//查询数据分页，每页20个数据
        $this->assign("Clubadminlist",$Clubadmin);//将查询结果转化为模版
        return $this->fetch();
    }
    public function delete($id){
        if(Db::name("Clubadmin")->delete($id))//执行删除sql
        {
            //Db::name("videos")->getLastSql();exit;

            $this->success('删除成功');//删除成功
        }else $this->error('删除失败');//删除失败
    }//删除函数

    public function detail(){
        $Uid=input('param.CAID');//获得Did
        //select用于查询0到的多条记录
        //find用于查询一条记录
        $Clubadmin=Db::name("Clubadmin")->find($Uid);//根据Did查询数据库

        echo json_encode($Clubadmin);//以JSON格式返回
    }//对应index.html中的AJAX

    public function update(){
        if(request()->isPost()){
            $data=[
                'ClubAdminID'=>input('CaID'),
                'ClubAdminName'=>input('CaName'),
                'ClubAdminEmail'=>input('CaEmail'),
                'ClubAdminPhoneNum'=>input('CaPhone'),
                'ClubAdminIsChecked'=>input('CaCheck'),
            ];//将传过来的数据转化为数组 这里必须写ID 否则缺少更新条件
            //存入数据库
            //dump($data)
            //$data=['typename'=>$typename];
            $res=Db::name("Clubadmin")->update($data);//更新sql语句
            if($res){
                echo "<script>
                        history.back(-1);
                        alert('修改管理员信息成功');
                        history.back(-1);
//                        $(#my-popups).modal('hide');
                        </script>";//成功执行
            }else{
                echo "<script>alert('修改管理员信息失败');
                        history.back(-1);
                        </script>";//失败执行
            }
        }
    }//更新函数


}