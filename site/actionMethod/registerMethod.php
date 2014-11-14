<?php 


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
			$ret=$mysql->insert('user','name,psw',array($_POST['name'],$_POST['psw']));
		}
		
	}	
	// echo $mysql->curSql;
	// echo $mysql->curErrMsg;
	// var_dump($ret); 
}

?>