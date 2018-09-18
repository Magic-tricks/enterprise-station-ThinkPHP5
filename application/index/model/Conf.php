<?php
namespace app\index\model;
use think\Model;
class Conf extends Model
{
	public function getAllConf()
	{
		$_confres=$this->field('enname,cnname')->select();
		$confres=array();
		foreach($_confres as $k => $v)
		{
			$confres[$v['enname']]=$v['cnname'];
		}
		return $confres;
	}
}