<?php
namespace app\logic;
use think\Model;
class Users extends Model
{
    //检查用户是否存在
	public function checkuser($username,$password)
	{
		$user=$this::get(['username'=>$username,'password'=>md5($password)]);
		if($user)
			return $user;
		else
			return false;
	}
}