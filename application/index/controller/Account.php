<?php
namespace app\index\controller;
use think\Controller;
use app\model\User as UserModel;
use think\Session;
class Account extends Controller
{
	public function login()
	{
		return $this->fetch();

	}
	public function dologin()
	{
		$kind=$_POST['kind'];
		if($kind=='tea')
		{
			$tealogic=\think\Loader::model('Teacher','logic');
			$teacher=$tealogic->checkuser($_POST['username'],$_POST['pwd']);
			if($teacher)
			{
				
				Session::set('username',$teacher->username);
				$this->success('登陆成功','Teacher/index');
				
			}else 
			
			{   
				$this->error('用户名或密码错误');
			}
			
		}else 
		{
			$stulogic=\think\Loader::model('Student','logic');
			$stu=$stulogic->checkuser($_POST['username'],$_POST['pwd']);
			if($stu)
			{
				Session::set('stuno',$stu->stu_no);
				$this->success('登陆成功','Student/index');
			}
			else 
			{
				$this->error('用户名或密码错误');
			}
		}
	}
}