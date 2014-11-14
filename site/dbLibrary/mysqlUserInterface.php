<?php
include_once "config.inc.php";
include_once "MySql.class.php";
header("Content-Type:text/html;charset=utf-8");

$mysql=new MySql();
$mysql->connect_db(HOST,UNAME,PASSWORD,DB_NAME);
$mysql->setCharet();
//----------------增
//echo $mysql->insert('user','name,age',array(array('牛人',48),array('牛人2',41))); //插入多条
//echo $mysql->insert('user','name,age',array('牛人3',40)); //插入一条

//-------------删除
// echo $mysql->delete('user','age<40');
//echo $mysql->delete('user',array('age'=>40));

//------------查
//$ret=$mysql->select_all('user','*',array('age'=>45));
// $ret=$mysql->select_one('user','*','age>=45');
// $ret=$mysql->select_all('user','*','age>=45');
// var_dump($ret);

//-----------改
// $ret=$mysql->update('user',array('age'=>30,'name'=>'老大'),array('age'=>45));
// $ret=$mysql->update('user',"name='蔡虎'",'age=30');
// var_dump($ret);

//--------执行自定义的sql语句
$sql="select * from user where 1";
$ret=$mysql->query($sql);
var_dump($ret);

$mysql->close_db();




?>