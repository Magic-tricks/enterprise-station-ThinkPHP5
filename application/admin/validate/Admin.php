<?php
namespace app\admin\validate;
use think\Validate;
class Admin extends Validate
{
   protected $rule=[
        'name'=>'unique:admin|require|max:25',
        'password'=>'require|min:3'
   ];

   protected $message=[
        'name.require'=>'管理员名称必须填写',
        'name.max'=>'管理员名称不能大于25个字符',
        'name.unique'=>'管理员不能重复',
        'password.require'  =>  '密码不能为空',
        'password.min'  =>'密码不能少于3位'
   ];

   protected $scene=[
        'add'   => ['name','password'],
        //add方法，catename指定验证require，如果不写，则按照$rule规则中写的全部验证
        'edit'  =>  ['name','password'=>'min:6']
   ];
}
