<?php
namespace app\admin\controller;
use \think\Controller;
use app\admin\model\Admin;
class Login extends Controller
{
    public function login()
    {
        if (request()->isPost()) {
            $this->check(input('code'));//验证码是否正确
            $data = input('post.');
            $admin = new Admin();
            $num = $admin->login($data);
            if ($num == 2)
            {
                $this->success('登录成功，正在跳转～','Index/index');
            }
            elseif($num==3)
            {
                $this->error('密码错误！');
            }
            elseif($num == 1)
            {
                $this->error('用户名不存在');
            }
            return;
        }
        return $this->fetch();
    }

    public function check($code='')//验证码
    {
        if(!captcha_check($code))//tp5自带验证码
        {
            $this->error('验证码错误');
        }
        else
        {
            return true;
        }
    }

}
