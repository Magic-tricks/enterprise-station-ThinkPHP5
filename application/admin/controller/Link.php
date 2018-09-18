<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\Link as LinkModel;
use \think\Loader;
class Link extends Common
{

    public function lst()
    {
        $link=new LinkModel();        
        if(request()->isPost())
        {
            $sorts=input('post.');
            foreach ($sorts as $key => $value)
            {
                $link->save(['sort'=>$value],['id'=>$key]);//$key为每个数据的id主键，遍历更新
            }
            $this->success('更新排序成功～！','link/lst');
            return;
        }
        $linkres=$link->order('sort desc')->paginate(3);
        $this->assign('linkres', $linkres);
        return $this->fetch();
    }

    public function add()
    {
        if(request()->isPost())
        {
            $data=input('post.');
            $validate=Loader::validate('Link');
            if(!$validate->scene('add')->check($data))
            {
                $this->error($validate->getError());
            }
            $add=LinkModel::create(input('post.'));
            if($add)
            {
                $this->success('添加友情链接成功','Link/lst');
            }
            else
            {
                $this->error('添加链接失败');
            }
        }
        return view();
    }

    public function edit()
    {
        
        $link=new LinkModel();
        if(request()->isPost())
        {
            $data=input('post.');
            $validate=Loader::validate('Link');
            if(!$validate->scene('edit')->check($data))
            {
                $this->error($validate->getError());
            }
            
            $save=$link->save(input('post.'),['id'=>input('id')]);
            if($save!==false)
            {
                $this->success('修改成功','Link/lst');
            }
            else
            {
                $this->error('修改链接失败');
            }
        }
        $linkres=LinkModel::find(input('id'));
        $this->assign('linkres',$linkres);
        return view();
    }

    public function del()
    {
        $del=LinkModel::destroy(input('id'));
        if($del)
        {
            $this->success('删除成功链接成功','Link/lst');
        }
        else
        {
            $this->error('删除链接失败');
        }
    }
}
