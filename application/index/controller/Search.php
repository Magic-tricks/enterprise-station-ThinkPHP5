<?php
/**
 * Created by PhpStorm.
 * User: yeyeye
 * Date: 18-9-11
 * Time: 上午8:19
 */

namespace app\index\controller;

class Search extends Common
{
    public function search()
    {
        $article=new \app\index\model\Article();
        $serHotArt=$article->getSerhot();
        $keywords=input('keywords');
        if($keywords != '')
        {
            $serRes=db('article')->order('id desc')->where('title','like','%'.$keywords.'%')->paginate(2,false,$config=['query'=>['keywords'=>$keywords]]);
            $this->assign(['serRes'=>$serRes]);
        }
        $this->assign(['keywords'=>$keywords,'serHotArt'=>$serHotArt]);
        return view();
    }
}