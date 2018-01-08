<?php
namespace app\common\logic;
use think\Model;
class Student extends Model
{
	//检查用户是否存在
	public function checkuser($username,$password)
	{
		$stu=$this::get(['stu_no'=>$username,'password'=>md5($password)]);
		if($stu)
			return $stu;
		else
			return false;
	}
 	
}