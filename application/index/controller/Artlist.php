<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Article as ArticleModel;
class Artlist extends Common
{
    public function artlist()
    {
        $article=new ArticleModel();
        //查询当前顶级栏目下的所有子栏目以及本身栏目的文章数据
        $artRes=$article->getAllArticle(input('cateid'));
        //查询当前顶级栏目下所有子栏目以及本身的文章按照点击数降序，分配热门点击数据
        $artHot=$article->getHotRes(input('cateid'));
        $cate=new \app\index\model\Cate();
        //获取当前cate信息，使用在页面title
        $cateInfo=$cate->getCateInfo(input('cateid'));
        $this->assign(['cateInfo'=>$cateInfo,'artRes'=>$artRes,'HotRes'=>$artHot]);
        return $this->fetch();
    }
}
