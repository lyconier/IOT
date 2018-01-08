<?php
namespace app\model;
use think\Model;
class Clas extends Model
{
	public function task()
	{
		return $this->belongsToMany('Task','tb_task_clas');
	}
}