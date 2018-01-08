<?php
namespace app\model;
use think\Model;
class Task extends Model
{
	public function clas()
	{
		return $this->belongsToMany('Clas','tb_task_clas');
	}

}