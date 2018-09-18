<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Article as ArticleModel;
class Imglist extends Common
{
    public function imglist()
    {
        $article=new ArticleModel();
        //查询当前顶级栏目下的所有子栏目以及本身栏目的文章数据
        $artRes=$article->getAllArticle(input('cateid'));
        //获取cate信息
        $cate=new \app\index\model\Cate();
        $cateInfo=$cate->getCateInfo(input('cateid'));
        $this->assign(["artRes"=>$artRes,'cateInfo'=>$cateInfo]);
        return $this->fetch();
    }
}
