<?php
namespace app\common\validate;
use think\Validate;
class Student extends Validate{
	//规则
	protected $rule=[
		['stu_no','require|max:50|alphaDash','学号必须|学号最多不超过50个字符|学号只能由字母、数字、下划线、破折号组成'],
		['stu_name','require','学生姓名必须'],
		['password','require|max:32|alphaDash','密码必须|密码最多不超过32个字符|密码只能由字母、数字、下划线、破折号组成'],
		['class_id','require|integer','班级ID必须|班级ID必须为整数'],	
	];
	//验证场景
	protected $scene=[
			'edit'=>['stu_no','password','class_id'],
			'add'=>['stu_no','password','class_id'],
	];
}