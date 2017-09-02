<?php
/**
 * Created by PhpStorm.
 * User: yifeng
 * Date: 2017/8/15
 * Time: 21:18
 */

namespace app\index\controller;
use think\Controller;
use app\admin\validate\User;
use think\Validate;

class Login extends Controller
{
    public function index()
    {
        if (session('?loginname', '', 'user') != 1 || session('?loginid', '', 'user') != 1) {
            return view();
        }
        $this->redirect('index/index');
    }

    public function goout()
    {
        session(null, 'user');
        $this->success("退出成功", 'login/index');
    }

    public function login()
    {
        $data = input('post.');
        $validate = validate('User');
        if (!$validate->scene('login')->check($data)) {
            $this->error($validate->getError(), null, null, 2);
        }
        $result = db('user')->where('phone', $data['phone'])->field('Id,phone,password')->find();
        if (!$result) {
            $this->error("用户名不存在");
        }
        if (md5(trim($data['password'])) != $result['password']) {
            $this->error("密码输入不正确");
        }
        session('loginname', $result['phone'], 'user');
        session('loginid', $result['Id'], 'user');
        $this->success('登录成功', 'index/index');
        return;
    }
}