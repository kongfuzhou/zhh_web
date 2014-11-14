<?php 

ob_start();
date_default_timezone_set('PRC'); //设置时区 
session_start();
header("Content-Type:text/html;charset=utf-8");
define("PSW_LENGTH",6);



include_once "dbLibrary/config.inc.php";
include_once "dbLibrary/MySql.class.php";



$mysql=new MySql();
$mysql->connect_db(HOST,UNAME,PASSWORD,DB_NAME);
$mysql->setCharet();
session_start();
$GLOBAL["mysql"]=$mysql;


function logDebug($content,$file="debugLog.txt")
{
	$content.="_".date("Y-m-d H:i:s",time())."\r\n"; // \r\n txt换行 
	file_put_contents($file,$content, FILE_APPEND);

}  


?>