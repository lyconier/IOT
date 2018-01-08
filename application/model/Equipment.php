<?php
namespace app\index\model;
use think\Model;
class Equipment extends Model
{
	//自定义初始化
	protected function initialize()
	{
		//需要调用`Model`的`initialize`方法
		parent::initialize();
		//TODO:自定义的初始化
	}
	//多个设备属于一个设备类型
	public function Eq_type()
	{
		return $this->belongsTo('Eq_type');
	}
	//多个设备属于一个用户
	public function Users()
	{
		return $this->belongsTo('Users');
	}
	
}