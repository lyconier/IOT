<?php
namespace app\index\controller;
use think\Controller;
use app\model\Equipment as EqModel;
use think\Request;//用于Session读取
use think\Session;
class Users extends Controller{
	public function _initialize()
	{
		 $request=$this->request;
		//初始化的时候检查 用户权限
		if(null==$request->session('username')||$request->session('username')=='')
		{
			
			$this->error("您没有该页的访问权限！",url('./account/login'));
			
			exit;
			
		}else 
		{
			$stuno=$request->session('username');
			$stu=StuModel::get(['username'=>$username]);
			$this->stuid=$stu['stu_id'];
			$this->new_task_number=$stu['new_task_number'];
			$this->assign('stuid',$stu['stu_id']);
			$this->assign('stuno',$stu['stu_no']);
			$this->assign('stuname',$stu['stu_name']);
			//左侧默认无active菜单
			$this->assign('index','');
			$this->assign('newtasks','');
			$this->assign('account','');
			$this->assign('num',$this->new_task_number);
			
		}
	}
	//已完成作业
	public function index()
	{
		
		$this->view->engine->layout('userlayout');
		$this->assign('index','active');
		//获取已交作业
		$sublogic=\think\Loader::model('Submit','logic');
		$sublist=$sublogic->getsubmitTasks($this->stuid);
		$this->assign('sublist',$sublist);
		return $this->fetch();
		//echo "欢迎登陆学生界面 ".$stu->stu_name;
	}
	
	//交作业界面
	public function submittask($taskid)
	{
		$task=TaskModel::get(['task_id'=>$taskid]);
		$this->assign('task',$task);
		$this->view->engine->layout('userlayout');
		return $this->fetch();
	}
	
	//交作业处理过程
	public function dosubmittask()
	{
		$data=input('post.');
		// 数据验证
		$data['submit_date']=date('Y-m-d',time());
		$result=$this->validate($data,'Submit');
		if(true!==$result)
		{
			//return $result;
			$this->error($result,"Student/newtasks");
		}
		else 
		{
			$sub=new SubmitModel;
			if(SubmitModel::get(['stu_id'=>$data['stu_id'],'task_id'=>$data['task_id']]))
			{
				$this->error('你已经完成了该作业','Student/newtasks');
			}
			//数据保存
			$sub->allowField(true)->save($data);
			
			//更新未完成作业数
			$stu=StuModel::get($data['stu_id']);
			$stu->new_task_number=$this->new_task_number-1;
			$stu->save();
			
			$this->success('提交成功', 'Student/newtasks');
		}
	}
	
	public function newtasks(Request $request)
	{
		$this->assign('newtasks','active');
		$this->view->engine->layout('userlayout');
		//获取未交作业
		$tasklogic=\think\Loader::model('Task','logic');
		$tasklist=$tasklogic->getUnsubmitTasks($this->stuid);
		$this->assign('tasklist',$tasklist);
		return $this->fetch();
	}
	public function account()
	{
		$this->assign('account','active');
		$this->view->engine->layout('userlayout');
		return $this->fetch();
	}
	//更新账户信息
	public function updateaccount()
	{
		$data=input('post.');
		if($data['password']!=$data['confrompassword'])
		{
			$this->error('两次输入的密码不一致','Student/account');
		}else 
		{
			$stu=StuModel::get($this->stuid);
			$stu->password=md5($data['password']);
			$stu->save();
			$this->success('信息更新成功','Student/account');
		}
	}
	//退出
	public function logout()
	{
		Session::clear();//删除Session
		$this->success('成功退出',url('./account/login'));
	}
}