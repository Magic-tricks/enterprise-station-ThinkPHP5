<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use think\Request;
use app\admin\model\Admin as AdminModel;
use think\Loader;
class Admin extends Common
{

    public function lst()
    {
        $auth=new Auth();
        $admin=new AdminModel();
        $adminres=$admin->getAdmin();
        foreach($adminres as $k => $v)
        {
            //查询当前用户所属的用户组名称,传入用户id
            $_groupTitle=$auth->getGroups($v['id']);
            //把当前用户的用户组名称放在当前用户二维数组中
            $groupTitle=$_groupTitle[0]['title'];
            $v['groupTitle']=$groupTitle;
        }
        $this->assign('adminres',$adminres);
        return $this->fetch();
    }
    public function add(Request $request)
    {
        if($request->isPost())
        {
            $data=input('post.');
            $validate=Loader::validate('Admin');//加载Admin验证文件。用户验证Admin控制器
            if(!$validate->scene('add')->check($data))
            {
                $this->error($validate->getError());//$validate->getError()获取验证文件的出错信息
            }
           $admin=new AdminModel();
            $res=$admin->addAdmin(input('post.'));
            if($res)
            {
                $this->success('添加管理员成功！','lst');
            }
            else
            {
                $this->error('添加管理员失败!');
            }
        }
        $authGroupRes=db('auth_group')->select();
        $this->assign('authGroupRes',$authGroupRes);
        return $this->fetch();
    }
    public function edit()
    {
        $admins=db('admin')->find(input('id'));
        if (request()->isPost())
        {
            $data=input('post.');
            $validate=Loader::validate('Admin');
            if(!$validate->scene('edit')->check($data))
            {
                $this->error($validate->getError());
            }
            $data=input('post.');
            $admin=new AdminModel();
            $saveNum=$admin->saveAdmin($data);
            if($saveNum == 2)
            {
                $this->error('管理员名称不能为空～');
            }
            if($saveNum!==false)
            {
                $this->success('修改管理员信息成功','lst');
            }
            else
            {
                $this->error('修改管理员信息失败！');
            }
        }
        if(!$admins)
        {
            $this->error('该管理员不存在！');
        }
        $authGroupAccess=db('auth_group_access')->where('uid','=',input('id'))->find();
        $this->assign('groupId',$authGroupAccess['group_id']);
        $authGroupRes=db('auth_group')->select();
        $this->assign('authGroupRes',$authGroupRes);
        $this->assign('admin',$admins);
        return $this->fetch();
    }

    public function del($id)
    {

        $admin=new AdminModel();
        $delNum=$admin->delAdmin($id);
        if($delNum==1)
        {
            $this->success('删除管理员成功！','lst');
        }
        else
        {
            $this->error('删除管理员失败');
        }
    }

    public function logout()
    {
        session(null);
        $this->success('退出登录成功～','Login/login');
    }
}
