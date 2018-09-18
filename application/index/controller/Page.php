<?php
namespace app\index\controller;
use think\Controller;
class Page extends Common
{
    public function page()//单页文章
    {
        $cates=db('cate')->where('id','=',input('cateid'))->find();
        //获取cate信息
        $cate=new \app\index\model\Cate();
        $cateInfo=$cate->getCateInfo(input('cateid'));
        $this->assign(['cates'=>$cates,'cateInfo'=>$cateInfo]);
        return $this->fetch();
    }
}
