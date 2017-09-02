<?php
namespace app\index\controller;

class Index extends Common
{
    public function index()
    {
        $result=db('yeji')->where('uid',session('loginid','','user'))->paginate(6);
        $this->assign([
            'yeji'=>$result,
            'username'=>session('loginname','','user')
        ]);
        return view();
    }
//业绩的添加
    public function add(){
        if(request()->isPost()){
            $data=input('post.');
            $data['uid']=session('loginid','','user');
            $data['uptime']=time();
            if(!db('yeji')->insert($data)){
                $this->error("业绩上报失败，请联系管理员！");
            }
            $this->success("上报成功","index/index",null,1);
        }
        return view();
    }
    //业绩的修改
    public function edit(){
        if(request()->isPost()){
            $data=input('post.');
            $res=db('yeji')->where('Id',$data['Id'])->field('state')->find();
            if($res['state']==0){
              if(!db('yeji')->update($data)){
                    $this->error("更新失败",'index/index');
              }else{
                    $this->success("更新成功",'index/index');
              }
            }else{
                $this->success("无权修改！",'index/index');
            }
            retrun;
        }
        $id=input("id");
        $result=db('yeji')->where("Id",$id)->field('Id,yeji,note')->find();
        $this->assign('yeji',$result);
        return view();
    }

    public function goout(){
        session(null, 'user');
        $this->redirect('login/index');
    }
}
