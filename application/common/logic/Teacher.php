<?php
namespace app\common\logic;
use think\Model;
class Teacher extends Model
{
    //检查用户是否存在
	public function checkuser($username,$password)
	{
		$teacher=$this::get(['username'=>$username,'password'=>md5($password)]);
		if($teacher)
			return $teacher;
		else 
			return false;
	}
}