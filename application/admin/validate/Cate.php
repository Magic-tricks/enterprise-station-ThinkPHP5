<?php
namespace app\admin\validate;
use think\Validate;
class Cate extends Validate
{
   protected $rule=[
        'catename'=>'unique:cate|require|max:25',
   ];

   protected $message=[
        'catename.require'=>'栏目标题必须填写',
        'catename.max'=>'栏目不能大于25个字符',
        'catename.unique'=>'栏目不能重复',
   ];

   protected $scene=[
        'add'   => ['catename'],
        //add方法，catename指定验证require，如果不写，则按照$rule规则中写的全部验证
        'edit'  =>  ['catename']
   ];
}
