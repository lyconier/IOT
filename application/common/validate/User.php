<?php
namespace app\validate;
use think\Validate;
class User extends Validate{
	//规则
	protected $rule=[
		'username'=>'require|max:50|alphaDash',
		'password'=>'require|max:32|alphaDash',
		'power'=>'require|in:common,admin'		
	];
	//出错信息
	protected $message  =   [
			'username.require' => '用户名必须',
			'username.max'     => '用户名最多不能超过50个字符',
			'username.alphaDash'=>'用户名只允许由字母、数字、下划线、破折号组成',
			'password.require'   => '密码必须',
			'password.max'     => '密码最多不能超过32个字符',
			'password.alphaDash'=>'密码只允许由字母、数字、下划线、破折号组成',
			'power.require'  => '权限必须',
			'power.in'       => '权限只能是common,admin中的一个',
	];
	//验证场景
	protected $scence=[
			'edit'=>['username','password','power'],
			'add'=>['username','password','power'],
	];
}