<?php
namespace app\model;
use think\Model;
class Submit extends Model
{
	// 自动填充上传作业日期
	protected $insert = ['submit_date'];
	//修改器使用驼峰命名法替代下划线
	protected function setSubmitDateAttr()
	{
		return date('Y-m-d',time());
	}
	//定义与学生的多对一关联
	public function student()
	{
		return $this->belongsTo('Student');
	}
	//定义与作业的多对一关联
	public function task()
	{
		return $this->belongsTo('Task');
	}
	
}