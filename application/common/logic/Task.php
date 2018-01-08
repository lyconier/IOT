<?php
namespace app\common\logic;
use think\Model;
use app\model\Clas;
use app\model\Student;
use app\model\Submit;
class Task extends Model
{
 	//获取学生所在班级的所有作业
	public function getTasks($stuid)
	{
		$stu=Student::get(['stu_id'=>$stuid]);
		$clas=Clas::get(['clas_id'=>$stu['clas_id']]);
		return $clas->task;
	}
	
	//获取某学生所有未交作业
	public function getUnSubmitTasks($stuid)
	{
		$alltask=$this->getTasks($stuid);
		foreach($alltask as $key=>$value)
		{
			if(Submit::get(['task_id'=>$value['task_id'],'stu_id'=>$stuid]))
			{
				unset($alltask[$key]);//删除已提交作业
			}
		}
		return $alltask;
		
	}
	
}