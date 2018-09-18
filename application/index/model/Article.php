<?php
namespace app\index\model;
use think\Model;
use app\index\model\Cate;
class Article extends Model
{
	public function getAllArticle($cateid)
	{
        $cate=new Cate();
        //获取包括该栏目下的所有子栏目id
        $allCateId=$cate->getchilrenid($cateid);
        //cateid IN($allCateId)，IN语法可以批量查询。
        $artRes=db('article')->order('id desc')->where("cateid IN($allCateId)")->paginate(8);
        return $artRes;
	}

    public function getHotRes($cateid)
    {
        $cate=new Cate();
        $allCateId=$cate->getchilrenid($cateid);
        //cateid IN($allCateId)，IN语法可以批量查询。
        $artRes=db('article')->order('click desc')->limit(5)->where("cateid IN($allCateId)")->select();
        return $artRes;
    }

    public function getNewArticle()
    {
        $newArticleRes=db('article')->alias('a')->join('bik_cate c','a.cateid=c.id')->field('a.id,a.title,a.desc,a.thumb,a.click,a.zan,a.time,c.catename')->order('a.id desc')->limit(8)->select();
        return $newArticleRes;
    }

    public function getSiteHot()
    {
        $siteHotArt=$this->order('click desc')->limit(5)->select();
        return $siteHotArt;
    }

    public function getRecArt()
    {
        $recArt=$this->limit(4)->where('rec','=',1)->order('id desc')->select();
        return $recArt;
    }

    public function getSerhot()
    {
        $siteHotArt=$this->order('click desc')->limit(5)->select();
        return $siteHotArt;
    }
}