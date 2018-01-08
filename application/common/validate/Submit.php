<?php
namespace app\common\validate;
use think\Validate;
class Submit extends Validate{
	//规则
	protected $rule=[
		['submit_content','require|token','提交内容不能为空|请勿重复提交'],
		/* ['submit_date','require','提交日期不能为空'], */
		['task_id','require','作业ID必须'],
		['stu_id','require','学生ID必须'],
	];
	//验证场景
	protected $scene=[
			'edit'=>['submit_content','task_id','student_id'],
			'add'=>['submit_content','task_id','student_id'],
	];
}