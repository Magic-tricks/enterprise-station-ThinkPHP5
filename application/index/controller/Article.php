<?php
namespace app\index\controller;
use think\Controller;

class Article extends Common
{
    public function article()//文章详情页
    {
        $artid=input('artid');//文章id
        db('article')->where('id','=',$artid)->setInc('click');//setInc自增1
        $articles=db('article')->find($artid);
        $article=new \app\index\model\Article();
        $hotRes=$article->getHotRes($articles['cateid']);//获取热门文章，传入当前栏目id
        //获取cate信息
        $cate=new \app\index\model\Cate();
        $cateInfo=$cate->getCateInfo(input('cateid'));
        $this->assign(['cateInfo'=>$cateInfo,'articles'=>$articles,'hotRes'=>$hotRes]);
        return $this->fetch();
    }
}
