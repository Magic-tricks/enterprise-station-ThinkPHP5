<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\Cate as CateModel;
use app\admin\model\Article as ArticleModel;
use think\Loader;
class Article extends Common
{
    public function lst()
    {
        //链表查询
        $artres=db('article')->alias('a')->join('bik_cate b','a.cateid=b.id')->field('a.*,b.catename')->order('a.id desc')->paginate(5);
        $this->assign('artres',$artres);
        return view();
    }

    public function add()
    {
        if(request()->isPost())
        {
            $data=input('post.');
            $data['time']=time();
            $validate=Loader::validate('Article');//加载验证文件
            if(!$validate->scene('add')->check($data))//验证数据，使用add验证场景
            {
                $this->error($validate->getError());
            }
            $article=new ArticleModel();
            //文件在模型中使用钩子函数（事件函数）先进行处理，之后在控制器保存数据
            //$file=request()->file('thumb');
//            if($file)
//            {
//                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
//                if($info)
//                {
//                    $thumb=ROOT_PATH . 'public' . DS . 'uploads'.$info->getSaveName();
//                    $data['thumb']=$thumb;
//                }
//            }
            if($article->save($data))//所有事件必须是在模型的操作下才可以使用
            {
                $this->success('添加文章成功','lst');
            }
            else
            {
                $this->error('添加文章失败');
            }
        }
        $cate=new CateModel();
        $cateres = $cate->cateTree();//递归查询栏目
        $this->assign('cateres', $cateres);
        return view();
    }

    public function edit()
    {
        if(request()->isPost())
        {
            $data=input('post.');
            $validate=Loader::validate('Article');
            if(!$validate->scene('edit')->check($data))
            {
                $this->error($validate->getError());
            }
            $article=new ArticleModel();
            $save=$article->update(input('post.'));
            if($save)
            {
                $this->success('修改文章成功','Article/lst');
            }
            else
            {
                $this->error('修改文章失败');
            }
            return;
        }
        $cate=new CateModel();
        $cateres = $cate->cateTree();
        $arts=db('article')->find(input('id'));
        $this->assign(['cateres'=>$cateres,'arts'=>$arts]);
        return view();
    }

    public function del()
    {
        $delNum=ArticleModel::destroy(input('id'));
        if($delNum)
        {
            $this->success('删除成功','Article/lst');
        }
        else
        {
            $this->error('删除失败');
        }
    }
}
