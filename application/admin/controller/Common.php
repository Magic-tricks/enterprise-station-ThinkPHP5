<?php

namespace app\admin\controller;
use think\Controller;
use think\Request;
class Common extends Controller
{
    public function _initialize()//初始化方法
    {
        if(!session('id') || !session('name'))//验证登录
        {
            $this->error('您尚未登录系统～','Login/login');
        }

        $auth=new Auth();//权限类
        $request=Request::instance();//实例化Request对象
        $con=$request->controller();//获取当前控制器名称
        $action=$request->action();//获取当前方法名称
        $name=$con.'/'.$action;//控制器/方法名
        $notCheck=['Index/index','Admin/lst','Admin/logout','Admin/edit'];
        //设置免验证的控制器方法
        if(session('id') != 1)//id=1为初始化管理员开放所有权限
        {
            if(!in_array($name,$notCheck)) //检测当前控制器方法是否是免验证的
            {
                if(!$auth->check($name,session('id')))//参数１：需要验证的控制器/方法名称，参数２:需要验证的用户id
                {
                    $this->error('没有访问权限~','Index/index');
                }
            }
        }

    }
}