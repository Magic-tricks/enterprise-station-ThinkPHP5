<?php
namespace app\admin\validate;
use think\Validate;
class Link extends Validate
{
   protected $rule=[
        'title'=>'unique:link|require|max:25',
        'url'=>'unique:link|require|max:60|url',
        'desc'=>'require'
   ];

   protected $message=[
        'title.require'=>'链接标题必须填写',
        'title.max'=>'标题不能大于25个字符',
        'title.unique'=>'标题不能重复',
        'url.unique'=>'地址不能重复',
        'url.url'=>'地址格式不正确',
        'url.max'=>'标题不能大于60个字符',
        'url.require'=>'链接地址必须填写',
        'desc.require'=>'链接描述必须填写',
   ];

   protected $scene=[
        'add'   => ['title'=>'require','url'=>'require','desc'],
        //add方法，title指定验证require，如果不写，则按照$rule规则中写的全部验证
        'edit'  =>  ['title','url'=>'require','desc']
   ];
}
