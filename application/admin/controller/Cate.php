<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\Cate as CateModel;
use app\admin\model\Article as ArticleModel;
use \think\Loader;
class Cate extends Common
{

    public function lst()
    {
        $cate = new CateModel();
        if(request()->isPost())
        {
            $sorts=input('post.');
            foreach ($sorts as $key => $value)
            {
                $cate->save(['sort'=>$value],['id'=>$key]);//$key为每个数据的id主键，遍历更新
            }
            $this->success('更新排序成功～！','Cate/lst');
            return;
        }
        $cateres = $cate->cateTree();
        $this->assign('cateres', $cateres);
        return $this->fetch();
    }

    public function add()
    {
        $cate = new CateModel();
        if (request()->isPost()) 
        {
            $data=input('post.');
            $validate=Loader::validate('Cate');
            if(!$validate->scene('add')->check($data))
            {
                $this->error($validate->getError());
            }
            $cate->data(input('post.'));//使用模型插入。data()传递数据
            $add = $cate->save();//保存数据
            if ($add)
            {
                $this->success('添加成功', 'Cate/lst');
            } else {
                $this->error('添加失败!');
            }
        }
        $cateres = $cate->cateTree();
        $this->assign('cateres', $cateres);
        return $this->fetch();
    }

    protected $beforeActionList=[//前置操作
        'delSonCate'    =>['only'=>'del']//执行del方法前先执行delSonCate方法
    ];


    public function delSonCate()//可在前置操作中接收需调用前置操作方法的值
    {
        $cateid=input('id');//需要删除当前栏目的id；
        $cate=new CateModel();
        $sonids=$cate->getChilrenid($cateid);
        $allCateId=$sonids;
        $allCateId[]=$cateid;
        foreach ($allCateId as $key => $value) {
            $article=new ArticleModel();
            $article->where('id',$value)->delete();

        }
        if($sonids)//如果子栏目则删除，没有则不进行操作
        {
            db('cate')->delete($sonids);
        }
    }

    public function del()
    {
        $del=db('cate')->delete(input('id'));
        if($del)
        {
            $this->success('删除栏目成功','Cate/lst');
        }
        else
        {
            $this->error('删除栏目失败');
        }
    }

    public function edit()
    {
        $cate = new CateModel();
        $cates=$cate->find(input('id'));
        $cateres = $cate->cateTree();
        $this->assign(['cateres'=>$cateres,'cates'=>$cates]);
        if(request()->isPost())
        {
            $data=input('post.');
            $validate=Loader::validate('Cate');
            if(!$validate->scene('edit')->check($data))
            {
                $this->error($validate->getError());
            }
            $save=$cate->save(input('post.'),['id'=>input('id')]);
            if ($save !== false)
            {
                $this->success('修改栏目成功！　','Cate/lst');
            }
            else
            {
                $this->error('修改栏目失败');
            }
            return;
        }
        return view();
    }
}
