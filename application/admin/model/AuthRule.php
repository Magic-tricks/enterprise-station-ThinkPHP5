<?php
namespace app\admin\model;
use think\Model;
class AuthRule extends Model
{
    public function authRuleTree()
    {
        $authRuleRes=$this->order('sort desc')->select();
        return $this->sort($authRuleRes);
    }

    public function sort($data,$pid=0)
    {
        static $arr=[];
        foreach ($data as $k => $v)
        {
            if($v['pid']==$pid)
            {
                $v['dataid']=$this->getParentId($v['id']);//存放当前权限ｉｄ以及父级id
                $arr[]=$v;
                $this->sort($data,$v['id']);
                //根据pid和id递归查询出顶级栏目下的子栏目，并排好序
            }
        }
        return $arr;
    }

    public function getChilrenid($authRuleId)
    {
        $authRuleRes=$this->select();
        return $this->_getChilrenid($authRuleRes,$authRuleId);
    }

    public function _getChilrenid($authRuleRes,$authRuleId)
    {
        static $arr=array();//静态数组存放需要删除的子栏目的id
        foreach ($authRuleRes as $k => $v)
        {
            if($v['pid']==$authRuleId)
            {
                $arr[]=$v['id'];//存放pid为传入的父id的数据的id值
                $this->_getChilrenid($authRuleRes,$v['id']);//递归查询是否有pid等于该数据id的
            }
        }
        return $arr;
    }

    public function getParentId($authRuleId)
    {
        $authRuleRes=$this->select();
        return $this->_getParentId($authRuleRes,$authRuleId,true);
    }

    public function _getParentId($authRuleRes,$authRuleId,$clear=false)
    {
        static $arr=array();//静态数组存放需要查询的父级的id
        if($clear)//是否清空数组
        {
            $arr=array();
        }
        foreach ($authRuleRes as $k => $v)
        {
            if($v['id']==$authRuleId)
            {
                $arr[]=$v['id'];//存放父级id和自己的id
                $this->_getParentId($authRuleRes,$v['pid'],false);//递归查询是否有pid等于该数据id的
            }
        }
        asort($arr);//从小到大排序数组
        $arrStr=implode('-',$arr);//以-号把数组组合成字符串
        return $arrStr;
    }
}
