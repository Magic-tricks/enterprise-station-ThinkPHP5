<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\AuthRule as AuthRuleModel;
use \think\Loader;
class AuthRule extends Common
{
    public function lst()
    {
        $authRule=new AuthRuleModel();
        $authRuleRes=$authRule->authRuleTree();
        $this->assign('authRuleRes',$authRuleRes);
        if(request()->isPost())
        {
            $sorts=input('post.');
            foreach ($sorts as $key => $value)
            {
                $authRule->save(['sort'=>$value],['id'=>$key]);//$key为每个数据的id主键，遍历更新
            }
            $this->success('更新排序成功～！','authRule/lst');
            return;
        }
        return view();
    }

    public function add()
    {
        if(request()->isPost())
        {
            $data=input('post.');
            //找父级level值
            $plevel=db('auth_rule')->field('level')->find($data['pid']);
            //如果有父级数据，则当前数据的level值等于父级level+1,否则为顶级栏目，level=0
            if($plevel)
            {
                $data['level']=$plevel['level']+1;
            }
            else
            {
                $data['level']=0;
            }

            $add=db('auth_rule')->insert($data);
            if($add)
            {
                $this->success('添加权限成功','lst');
            }
            else
            {
                $this->error('添加权限失败');
            }
            return;
        }
        $authRule=new AuthRuleModel();
        $authRuleRes=$authRule->authRuleTree();
        $this->assign('authRuleRes',$authRuleRes);
        return view();
    }

    public function edit()
    {
        if(request()->isPost())
        {
            $data=input('post.');
            //找父级level值
            $plevel=db('auth_rule')->field('level')->find($data['pid']);
            //如果有父级数据，则当前数据的level值等于父级level+1,否则为顶级栏目，level=0
            if($plevel)
            {
                $data['level']=$plevel['level']+1;
            }
            else
            {
                $data['level']=0;
            }
            $save=db('auth_rule')->update($data);
            if($save!==false)
            {
                $this->success('修改权限成功','lst');
            }
            else
            {
                $this->error('修改权限失败');
            }
        }
        $authRule=new AuthRuleModel();
        $authRuleRes=$authRule->authRuleTree();
        $authRules=$authRule->find(input('id'));
        $this->assign(['authRuleRes'=>$authRuleRes,'authRules'=>$authRules]);
        return view();
    }

    public function del()
    {
        $authRule=new AuthRuleModel();
        $authRuleIds=$authRule->getchilrenid(input('id'));
        $authRuleIds[]=input('id');
        $del=$authRule::destroy($authRuleIds);
        if($del)
        {
            $this->success('删除权限成功','lst');
        }
        else
        {
            $this->error('删除权限失败');
        }
    }
}
