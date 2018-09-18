<?php
namespace app\admin\model;
use \think\Model;
class Cate extends Model
{
    public function cateTree()
    {
        $cateres=$this->order('sort desc')->select();
        return $this->sort($cateres);
    }

    public function sort($data,$pid=0,$level=0)
    {
        static $arr=[];
        foreach ($data as $k => $v)
        {
            if($v['pid']==$pid)
            {
                $v['level']=$level;
                $arr[]=$v;
                $this->sort($data,$v['id'],$level+1);
                //根据pid和id递归查询出顶级栏目下的子栏目，并排好序
            }
        }
        return $arr;
    }

    public function getChilrenid($cateid)
    {
        $cateres=$this->select();
        return $this->_getChilrenid($cateres,$cateid);
    }

    public function _getChilrenid($cateres,$cateid)
    {
        static $arr=array();//静态数组存放需要删除的子栏目的id
        foreach ($cateres as $k => $v)
        {
            if($v['pid']==$cateid)
            {
                $arr[]=$v['id'];//存放pid为传入的父id的数据的id值
                $this->_getChilrenid($cateres,$v['id']);//递归查询是否有pid等于该数据id的
            }
        }
        return $arr;
    }
}
