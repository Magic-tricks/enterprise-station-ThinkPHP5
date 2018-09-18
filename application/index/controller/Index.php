<?php
namespace app\index\controller;
use think\Controller;
class Index extends Common
{
    public function index()
    {
        //首页最新文章调用
        $article=new \app\index\model\Article();
        $newArticleRes=$article->getNewArticle();
        //获取首页热点文章
        $siteHotArt=$article->getSiteHot();
        //友情链接数据
        $linkRes=db('link')->order('sort desc')->select();
        //获取推荐文章
        $recArt=$article->getRecArt();
        //获取推荐栏目
        $cateModel=new \app\index\model\Cate();
        //推荐顶部
        $recIndex=$cateModel->getRecIndex();
        $this->assign(['recIndex'=>$recIndex,'recArt'=>$recArt,'newArticleRes'=>$newArticleRes,'siteHotArt'=>$siteHotArt,'linkRes'=>$linkRes]);
        return $this->fetch();
    }
}
