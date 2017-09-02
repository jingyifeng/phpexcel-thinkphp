<?php
/**
 * Created by PhpStorm.
 * User: yifeng
 * Date: 2017/8/15
 * Time: 21:19
 */

namespace app\index\controller;
use think\Controller;

class Common extends Controller
{
    public function _initialize()
    {
        $this->checklogin();
    }

    private function checklogin(){
        if(session('?loginname', '', 'user')!=1 || session('?loginid', '', 'user')!=1){
            $this->redirect('login/index');
        }
    }
}