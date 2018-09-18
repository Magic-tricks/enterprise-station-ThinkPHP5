<?php
/**
 * Created by PhpStorm.
 * User: yeyeye
 * Date: 18-9-4
 * Time: 上午9:22
 */

namespace app\index\model;
use think\Model;
class Cate extends Model
{
    public function getChilrenid($cateid)
    {
        $cateres=$this->select();
        $arr=$this->_getChilrenid($cateres,$cateid);//获取所有子栏目
        $arr[]=$cateid;//把当前栏目存入
        $strId=implode(',',$arr);//以，号分割数组
        return $strId;
    }

    public function _getChilrenid($cateres,$cateid)
    {
        static $arr=array();//静态数组存放需要获取的子栏目的id
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

    public function getparents($cateid)
    {
        //查询所有cate数据
        $cateres=$this->field('id,pid,catename')->select();
        //查找传入的cateid的一条数据
        $cates=db('cate')->field('id,pid,catename')->find($cateid);
        $pid=$cates['pid'];
        if($pid)
        {
            //如果传入的数据有pid,则调用_getparentsid查询该父级数据
            $arr=$this->_getparentsid($cateres,$pid);
        }
        $arr[]=$cates;//再把自己存进数组
        return $arr;//返回cate信息
    }

    public function _getparentsid($cateres,$pid)
    {
        static $arr=array();//存放查询的父级数据
        foreach ($cateres as $k => $v)
        {
            if($v['id'] == $pid)
            {
                //如果当前数据的id＝传入的pid,则该数据为传入pid数据的父级栏目
                $arr[]=$v;
                $this->_getparentsid($cateres,$v['pid']);//递归查询
            }
        }

        return $arr;
    }

    public function getRecIndex()
    {
        $recIndex=$this->order('id desc')->where('rec_index','=',1)->select();
        return $recIndex;
    }

    public function getRecBottom()
    {
        //获取已推荐到底部的栏目
        $recBottom=$this->order('id desc')->where('rec_bottom','=',1)->select();
        return $recBottom;
    }

    public function getCateInfo($cateid)
    {
        $cateInfo=$this->field('catename,keywords,desc')->find($cateid);
        return $cateInfo;
    }
}