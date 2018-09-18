<?php
namespace app\admin\validate;
use think\Validate;
class Article extends Validate
{
   protected $rule=[
        'title'=>'unique:article|require|max:25',
        'cateid'=>'require',
        'content'=>'require',
        'desc' => 'require'
   ];

   protected $message=[
        'title.require'=>'文章标题必须填写',
        'title.max'=>'标题不能大于25个字符',
        'title.unique'=>'标题不能重复',
        'desc.require'=>'文章描述必须填写',
        'content.require'=>'文章内容必须填写',
   ];

   protected $scene=[
        'add'   => ['title'=>'require','cateid'=>'require','content'],
        //add方法，title指定验证require，如果不写，则按照$rule规则中写的全部验证
        'edit'  =>  ['title'=>'require','cateid'=>'require','content']
   ];
}
