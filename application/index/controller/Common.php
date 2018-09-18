<?php
namespace app\index\controller;
use think\Controller;
class Common extends Controller
{
	public  function _initialize()
	{
	    //当前位置
        if(input('cateid'))
        {
            //假如传递参数为cateid,则直接调用getPos方法查询
            $this->getPos(input('cateid'));
        }
        if(input('artid'))
        {
            //如果参数为artid，则先查询该文章数据，取出cateid，进行查询
            $articles=db('article')->field('cateid')->find(input('artid'));
            $cateid=$articles['cateid'];
            $this->getPos($cateid);
        }
        //推荐底部
        $cateModel=new \app\index\model\Cate();
        $recBottom=$cateModel->getRecBottom();
        $this->assign('recBottom',$recBottom);
        $this->getConf();//网站配置项
        $this->getNavCates();//网站栏目导航
	}

	public function getNavCates()
    {
        //pid等于0为顶级栏目，展示一级分类
        $cateres=db('cate')->where('pid','=','0')->select();
        foreach($cateres as $k => $v)
        {
            //查找当前分栏目下的子栏目
            $children=db('cate')->where(['pid'=>$v['id']])->select();
            if($children)
            {
                $cateres[$k]['children']=$children;//有子栏目则存在当前数据键$V下，组成三维数组
            }
            else
            {
                $cateres[$k]['children']=0;//没有子栏目则把children设为0
            }
        }
        $this->assign('cateres',$cateres);
    }

    public function getConf()
    {
        $conf=new \app\index\model\Conf();
        $confres=$conf->getAllConf();
        $this->assign('confres',$confres);
        $this->getNavCates();
    }

    public function getPos($cateid)
    {
        $cate= new \app\index\model\Cate();
        $posArr=$cate->getparents($cateid);
        $this->assign('posArr',$posArr);
    }
}