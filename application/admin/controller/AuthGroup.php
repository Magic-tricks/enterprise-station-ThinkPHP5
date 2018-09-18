<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\AuthGroup as AuthGroupModel;
use \think\Loader;
class AuthGroup extends Common
{  
    public function lst()
    {
        $authGroupRes=AuthGroupModel::paginate('3');
        $this->assign('authGroupRes',$authGroupRes);
        return view();
    }

    public function add()
    {
        if(request()->isPost())
        {
            $data = input('post.');
            if (isset($data['rules']))
            {
                //判断是否有选择权限，假如有，则以,号组合成字符串
                $data['rules']=implode(',',$data['rules']);
            }
            $add=db('auth_group')->insert($data);
            if($add)
            {
                $this->success('添加用户组成功','lst');
            }
            else
            {
                $this->error('添加失败');
            }
            return;
        }
        $authRule=new \app\admin\model\AuthRule();
        $authRuleRes=$authRule->authRuleTree();
        $this->assign('authRuleRes',$authRuleRes);
        return view();
    }

    public function edit()
    {
        if(request()->isPOst())
        {
            $data=input('post.');
            if (isset($data['rules']))
            {
                $data['rules']=implode(',',$data['rules']);
            }
            if(!isset($data['status']))
            {
                $data['status']=0;
            }   
            $save=db('auth_group')->update($data);
            if($save!==false)
            {
                $this->success('修改用户组成功','lst');
            }
            else
            {
                $this->error('修改用户组失败');
            }
            return;
        }
        $authGroups=db('auth_group')->find(input('id'));
        $this->assign('authGroups',$authGroups);
        $authRule=new \app\admin\model\AuthRule();
        $authRuleRes=$authRule->authRuleTree();
        $this->assign('authRuleRes',$authRuleRes);
        return view();
    }

    public function del()
    {
        $del=db('auth_group')->delete(input('id'));
        if($del)
        {
            $this->success('删除用户组成功','lst');
        }
        else
        {
            $this->error('删除用户组失败');
        }
    }
}
