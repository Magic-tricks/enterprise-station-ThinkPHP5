<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\Conf as ConfModel;
use \think\Loader;
class Conf extends Common
{
    public function lst()
    {
        if(request()->isPost())
        {
            $sorts=input('post.');
            $conf=new ConfModel();
            foreach ($sorts as $key => $value)
            {
                $conf->save(['sort'=>$value],['id'=>$key]);//$key为每个数据的id主键，遍历更新
            }
            $this->success('更新排序成功～！','Conf/lst');
            return;
        }
        $confres=ConfModel::order('sort desc')->paginate(3);
        $this->assign('confres',$confres);
        return view();
    }

    public function add()
    {
        if(request()->isPost())
        {
            $data=input('post.');
            $validate=Loader::validate('Conf');
            if(!$validate->check($data))
            {
                $this->error($validate->getError());
            }
            if($data['values'])
            {
                $data['values']=str_replace('，',',',$data['values']);
            }
            $conf=new ConfModel();
            if($conf->save($data))
            {
                $this->success('添加配置成功','Conf/lst');
            }
            else
            {
                $this->error('添加配置失败');
            }
        }
        return view();
    }

     public function edit()
    {
        if(request()->isPost())
        {
            $data=input('post.');
            $validate=Loader::validate('Conf');
            if(!$validate->scene('edit')->check($data))
            {
                $this->error($validate->getError());
            }
            if($data['values'])
            {
                $data['values']=str_replace('，',',',$data['values']);
            }
            $conf=new ConfModel();
            $save=$conf->save($data,['id'=>$data['id']]);
            if($save !== false)
            {
                $this->success('修改配置成功','lst');
            }
            else
            {
                $this->error('修改配置失败');
            }
        }
        $confs=ConfModel::find(input('id'));
        $this->assign('confs',$confs);
        return view();
    }

    public function del()
    {
        $del=ConfModel::destroy(input('id'));
        if($del)
        {
            $this->success('删除配置成功','Conf/lst');
        }
        else
        {
            $this->error('删除配置失败');
        }
    }

    public function conf()
    {
        if(request()->isPost())
        {
            $data=input('post.');
            $formarr=array();//表单提交的字段名称，用于和数据库字段对应
            foreach($data as $k => $v)
            {
                $formarr[]=$k;//保存英文名称
            }
            $_confarr=db('conf')->field('enname')->select();
            $confarr=array();//存放数据库所有配置名称的英文字段
            foreach ($_confarr as $k => $v) {
                $confarr[]=$v['enname'];
            }
            $checkboxarr=array();//验证提交的表单字段
            foreach ($confarr as $key => $v) {
                if(!in_array($v,$formarr))//判断数据库字段是否在表单提交的数组内，不在则存下，内容置空
                {
                    $checkboxarr[]=$v;
                }
            }
            if($checkboxarr){
                foreach ($checkboxarr as $ke => $v) {
                    ConfModel::where('enname',$v)->update(['value'=>'']);
                }
            }
            if($data)
            {
                foreach($data as $k => $v)
                {
                    ConfModel::where('enname','=',$k)->update(['value'=>$v]);
                }
                $this->success('修改配置成功','conf');
            }
            else
            {
                
            }
            return;
        }
        $confres=ConfModel::order('sort desc')->select();
        $this->assign('confres',$confres);
        return view();
    }
}
