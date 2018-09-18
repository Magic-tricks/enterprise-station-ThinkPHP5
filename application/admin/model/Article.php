<?php
namespace app\admin\model;
use \think\Model;
class Article extends Model
{
    //所有事件必须是在模型的操作下才可以使用
    protected static function init()//可统一注册模型事件
    {
        //在模型插入数据之前执行的操作
        Article::event('before_insert', function ($data) {
            $file=request()->file('thumb');
            if($file)
            {
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
                if($info)
                {
                    $thumb='/thinkphp/public/uploads/'.$info->getSaveName();
                    $data['thumb']=$thumb;
                }
            }
        });

        //模型更新前执行的操作
        Article::event('before_update', function ($data) {
            $file=request()->file('thumb');//判断是否有文件上传
            if($file)
            {
                $arts=Article::find($data->id);//找到原始缩略图地址
                //合并完整的系统绝对路径
                $thumbPath=$_SERVER['DOCUMENT_ROOT'].$arts['thumb'];
                if(file_exists($thumbPath))
                {
                    @unlink($thumbPath);//unlink删除需要文件的绝对路径
                }
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
                if($info)
                {
                    $thumb='/thinkphp/public/uploads/'.$info->getSaveName();
                    $data['thumb']=$thumb;
                }
            }

        });

        Article::event('before_delete', function ($data) {
                $arts=Article::find($data->id);
                $thumbPath=$_SERVER['DOCUMENT_ROOT'].$arts['thumb'];
                if(file_exists($thumbPath))
                {
                    @unlink($thumbPath);//unlink删除需要绝对路径
                }

        });

    }
}
