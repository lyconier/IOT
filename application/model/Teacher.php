<?php
namespace app\index\model;
use think\Model;
class Teacher extends Model
{
	//自定义初始化
	protected function initialize()
	{
		//需要调用`Model`的`initialize`方法
		parent::initialize();
		//TODO:自定义的初始化
	}
	//password修改器，存入时自动使用md5加密
	protected function setPasswordAttr($value)
	{
		return md5($value);
	}
	
}