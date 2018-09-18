<?php
namespace app\admin\model;
use \think\Model;
class Admin extends Model
{
    public function addAdmin($data)
    {
        if (empty($data)||!is_array($data))
        {
            return false;
        }
        if($data['password'])
        {
            $data['password']=md5($data['password']);
        }
        $adminData=array();
        $adminData['name']=$data['name'];
        $adminData['password']=$data['password'];
       if($res=$this->save($adminData))
       {
           $groupAccess['uid']=$this->id;//this->id 返回插入数据的id值
           $groupAccess['group_id']=$data['group_id'];
           db('auth_group_access')->insert($groupAccess);//访问控制表存入用户id与权限组id
           return true;
       }
       else
       {
           return false;
       }
    }

    public function getAdmin()
    {
        return $this->paginate(5);
    }

    public function saveAdmin($data)
    {
        $admins=db('admin')->find($data['id']);
        if(!$data['name'])
        {
            return 2;//管理员用户名为空
        }
        if(!$data['password'])
        {
            $data['password']=$admins['password'];
        }
        else
        {
            $data['password']=md5($data['password']);
        }
        db('auth_group_access')->where('uid','=',$data['id'])->update(['group_id'=>$data['group_id']]);
        return Admin::where('id','=',$data['id'])->update(['name'=>$data['name'],'password'=>$data['password']]);
    }

    public function delAdmin($id)
    {
        if(self::destroy($id))
        {
            return 1;
        }
        else
        {
            return 2;
        }
    }

    public function login($data)
    {
         $admin=self::getByName($data['name']);
         if($admin)
         {
             if($admin['password']==md5($data['password']))
             {
                 session('id',$admin['id']);
                 session('name',$admin['name']);
                 return 2;//登录信息正确
             }
             else
             {
                 return 3;//登录密码错误
             }
         }
         else
         {
             return 1;//用户名不存在
         }
    }
}
