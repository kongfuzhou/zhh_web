<?php

//http://127.0.0.1/zhh_web/flashReq.php
//header("Content-Type:text/html;charset=utf-8");
ini_set('date.timezone','Asia/Shanghai');

$date=date('Y-m-d H:i:s',time());

$data=array();
for($i=0;$i<5;$i++)
{
	$obj=array();
	$obj['id']=100+$i+2;
	$obj['name']="jacky_".$i;
	$obj['price']=10+10*$i;
	array_push($data,$obj);
	
}

/* $json=json_encode($data);
echo $json;
exit(); */

$jsonData=readJsonFileToObj("config.json");
// var_dump($jsonData);
for($i=0;$i<count($jsonData);$i++)
{
	$obj=array();
	foreach($jsonData[$i] as $key=>$v)
	{
		//echo $key."_".$v."<br>";
		$obj[$key]=$v;
	}
	$jsonData[$i]=$obj;
	echo $jsonData[$i]['id'].'<br>';
	
}

exit(); 


echo makeJsonFile($data);
exit();

if(!isset($_POST['sig']) || $_POST['sig']=="")
{
	//die('正在访问无效页面...');	
}else
{
	file_put_contents("content.txt","visit  php on $date"."\r\n",FILE_APPEND);
}



die("php link ");


$array=array($date,$_POST['xml0'],$_POST['xml']);

echo "wellcome to php 欢迎 得到的xml=".$_POST['xml'];
//var_dump($array);


file_put_contents("flashReq_log.log",implode("\r\n",$array)."\r\n",FILE_APPEND);


function readJsonFileToObj($path)
{
	$json=file_get_contents($path);
	//var_dump($json);	
	$obj=json_decode($json);
	return $obj;
}

/**
*  根据数组数据生成一个json文件
**/
function makeJsonFile($data,$fileName="config.json")
{
	$json="[";
	$newLine="\r\t";
	$len=count($data);
	for($i=0;$i<$len;$i++)
	{
		$json.=$newLine;
		$json.=json_encode($data[$i]);
		if($i<$len-1)
		{
			$json.=',';
		}
	}
	$json.="\r]";
	if(file_put_contents($fileName,$json))
	{
		return $fileName;
	}
	return 'error:'.$fileName;
}


/* $ip=44;
getIP();
echo " <br/>$ip online".$_SESSION['online'];

function getIP()
{
	global $ip;
	if (getenv("HTTP_CLIENT_IP"))
	$ip = getenv("HTTP_CLIENT_IP");
	else if(getenv("HTTP_X_FORWARDED_FOR"))
	$ip = getenv("HTTP_X_FORWARDED_FOR");
	else if(getenv("REMOTE_ADDR"))
	$ip = getenv("REMOTE_ADDR");
	else $ip = "Unknow";
	return $ip;
} */

?>