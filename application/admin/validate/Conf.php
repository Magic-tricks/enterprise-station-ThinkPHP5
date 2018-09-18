<?php
namespace app\admin\validate;
use think\Validate;
class Conf extends Validate
{
   protected $rule=[
        'cnname'=>'unique:conf|require|max:60',
        'enname'=>'unique:conf|require|max:60',
        'type'=>'require'
   ]; 

   protected $message=[
        'cnname.require'=>'中文名称不能必须填写',
        'cnname.max'=>'中文名称不能大于６０个字符',
        'cnname.unique'=>'中文名称不能重复',
        'enname.unique'=>'英文名称不能重复',
        'enname.max'=>'英文名称不能大于60个字符',
        'enname.require'=>'英文名称必须填写',
        'type.require'=>'配置类型必须填写',
   ];

   protected $scene=[
        
        //add方法，title指定验证require，如果不写，则按照$rule规则中写的全部验证
        'edit'  =>  ['cnname','enname']
   ];
}
