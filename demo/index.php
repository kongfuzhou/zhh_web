<?php

include_once "oopDemo.php";

header("Content-Type:text/html;charset=utf-8");

//http://127.0.0.1/zhh_web/
ini_set('date.timezone','Asia/Shanghai');
// date_default_timezone_set('Asia/Shanghai'); 

/*

$data="from phph";

$obj=new stdClass();
$obj->un="php";
$obj->age="120";
$obj->sex=urlencode('男');

//var_dump($obj);

$jsonFile=file_get_contents("t_achievement_detatil.json");

//echo gzcompress($jsonFile);

//echo $jsonFile;

$mkSec=mktime();

echo $mkSec;

newLine();

echo time();

newLine();

var_dump(localtime(time(),1));




//echo date("Y-m-d h:i:s",$mkSec);

//$data=urldecode(json_encode($obj));
//echo $data;
//echo gzcompress($data);


echo "<br/>";

//解决转义不显示中文的做法
$arr = array ('a'=>urlencode('芒果小站'));
echo urldecode(json_encode($arr));//以上代码执行后输出：



if($_POST['uname']) 
{	
	//echo gzcompress($_POST['uname']);
	
}

echo "<br/>";

for($i=1;$i<=9;$i++)
{
	for($j=1;$j<=$i;$j++)
	{
		//echo $j.'x'.$i.'='.($j*$i)." ";
	}
	//echo "<br/>";

}

echo "<br/>";

$max=7;

for($i=1;$i<=$max;$i++)
{
	
	$outPut="";
	$space=$max-$i;
	
	$outPut.=getSpace($space);
	for($j=1;$j<=$i;$j++)
	{
		//$outPut.="*&nbsp";
	}
	//echo $outPut."<br/>";
}



function getSpace($num)
{
	$space="";
	for($i=0;$i<$num;$i++)
	{
		$space.="&nbsp";
	}
	return $space;
}


 $jsonCode='{"school":"广州第一中学"}';
 
 var_dump(json_decode($jsonCode));
 
 newLine();
 
 $obj->name=urlencode("你好");

echo '$obj='. urldecode(json_encode($obj)); 
 
newLine();
$man=new Man();
$man->eat();

newLine();
*/
echo 'getCurrentTime='.getCurrentTime();

$a=100;
newLine();
$array=array('a'=>1,'b'=>2,'age'=>10);
$str="";
$str=analysisCondition($array);
echo $str;

echo Man::$version;
echo Man::version_date;

function analysisCondition($condition)
{
	$ret="";		
	if(is_string($condition))
	{
		$ret=$condition;
	}else
	{
		$len=count($condition);
		$index=0;
		$tempArr=array();
		foreach($condition as $key=>$val)
		{
			$index++;
			if($key!='from' && $key!='to')
			{
				$ret.=$key.'='."'$val'";
				$index<$len?$ret.=' and ':'';
			}
			
		}
	}
	
	return $ret;
}

function getCurrentTime()
{
	$array=localtime(time(),1);
	
	$str=getTimeStr($array['tm_hour']).":".getTimeStr($array['tm_min']).":".getTimeStr($array['tm_sec']);
	$a++;
	echo "going".$a;
	return $str;
} 
function getTimeStr($num)
{
	return $num>9?$num:'0'+$num;
}

?>

<html>
<head>
<title>
</title>
<meta />

</head>
	<body>
		<form action="http://127.0.0.1/zhh_web/flashReq.php" method="post" target="_blank" >
			<input type="text"  name='sig' value="sig:" />
			<input type="text"  name='xml0' value="xml0:" / />
			<input type="text"  name='xml' value="xml0:"  />
			<input type="submit"  value='提交' />
		</form>
	</body>
</html>












