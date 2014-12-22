<?php 
//注册和登录的函数

function registerHander()
{
	global $mysql;
	
	$ret=$mysql->select_one('user','*',array("name"=>"{$_POST['name']}"));
	if($ret)
	{
		echo "该用户已被注册，请重新输入!";
	}else
	{
		if($_POST['name']=="" || $_POST['psw']=="")
		{
			echo "用户名或密码不能为空!";
		}else if(mb_strlen($_POST['psw'])<PSW_LENGTH)
		{
			echo "密码长度不能小于".PSW_LENGTH;
		}else
		{
			$pswMd5=md5($_POST['psw']);
			$ret=$mysql->insert('user','name,psw,pswTrue',array($_POST['name'],$pswMd5,$_POST['psw']));
			echo "恭喜你[{$_POST['name']}]成功注册成为本站会员";
		}
		
	}	
	
}

function login()
{
	global $mysql;
	
	$data=array();
	$data["msg"]=0;
	
	$ret=$mysql->select_one('user','*',array("name"=>"{$_POST['name']}"));
	if($ret)
	{		
		$pswMd5=md5($_POST['psw']);
		if($pswMd5==$ret['psw'])
		{
			//update 登录时间 在线session
			//返回用户的json数据
			$data["name"]=$ret['name'];
		}else
		{
			$data["msg"]="密码错误!";
			//echo "密码错误!"."_".json_encode($ret);
		}		
		
	}else
	{
		$data["msg"]="用户名不存在!";
		
	}
	
	echo json_encode($data);
	
}


?>