<?php
namespace app\common\logic;
use think\Model;
use app\model\Submit as sm;
class Submit extends Model
{
 	
	
	//获取某学生所有已交作业
	public function getSubmitTasks($stuid)
	{
		/* $unsubmit=$this->getUnSubmitTasks($stuno);
		$alltasks=$this->getTasks($stuno);
		$submittasks=array();
		foreach ($alltasks as $key=>$value)
		{
			if(!in_array($value,$unsubmit))
			{
				$submittasks[]=$value;
			}
		}
		
		return $submittasks; */
		//dump($this);
		$submittedtasks=sm::all(['stu_id'=>$stuid]);
		//dump($submittedtasks);
		return $submittedtasks;
		
	}
}