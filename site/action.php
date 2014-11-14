<?php
include_once "siteConfig.php";
include_once "actionMethod/registerMethod.php";

$mysql=$GLOBAL["mysql"];

$ationList=array("register",
"verifyRegUname"); //所有请求列表

$action=$_POST['action'];
if(in_array($action,$ationList))
{
	switch($action)
	{
		case "register":
			registerHander();
			break;
		case "verifyRegUname":
			break;
	}
}else
{
	exit();
}

// echo urldecode($_POST['action'])."_".$_POST['action']." 哈哈".$_POST['name'].$_POST['psw'];
// $ret=$mysql->select_one('user','*','1');
// var_dump($ret);




// $sql="select * from user where 1";
// $GLOBAL["mysql"]->query($sql);


$GLOBAL["mysql"]->close_db(); 

 ?>