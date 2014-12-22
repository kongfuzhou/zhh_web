<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
// ob_start();
// header("Content-Type:text/html;charset=utf-8");
//http://127.0.0.1/zhh_web/site/

include_once "siteConfig.php";



// echo $GLOBAL["mysql"];
/* $text='{"a":"lily","b":"lucy"}';
echo $text;
var_dump(json_decode($text)); */
$json='{   
   "fullname": "Sean Kelly",   
   "org": "SK Consulting",   
   "emailaddrs": [   
      {"type": "work", "value": "kelly@seankelly.biz"},   
      {"type": "home", "pref": 1, "value": "kelly@seankelly.tv"}   
   ],   
    "telephones": [   
      {"type": "work", "pref": 1, "value": "+1 214 555 1212"},   
      {"type": "fax", "value": "+1 214 555 1213"},   
      {"type": "mobile", "value": "+1 214 555 1214"}   
   ],   
   "addresses": [   
      {"type": "work", "format": "us",   
       "value": "1234 Main StnSpringfield, TX 78080-1216"},   
      {"type": "home", "format": "us",   
       "value": "5678 Main StnSpringfield, TX 78080-1316"}   
   ],   
    "urls": [   
      {"type": "work", "value": "http://seankelly.biz/"},   
      {"type": "home", "value": "http://seankelly.tv/"}   
   ]   
}  
';

//var_dump(json_decode($json));

$cls0=new stdClass();
$cls0->age=11;
$cls0->name="lucy";

$ary0=array();

array_push($ary0,$cls0);

$cls=new stdClass();
$cls->ary=$ary0;
$cls->name="lily";

$ary=array(1);
array_push($ary,$cls);
array_push($ary,"blue");

//echo json_encode($ary,1);

// ["1",{"name":"lily",["4",{"man":{"name":"thon"}}]},"blue"]
// ﻿[1,{"ary":[{"age":11,"name":"lucy"}],"name":"lily"},"blue"]

//var_dump($ary);



//echo time();
logDebug("你好吗".rand(1,1000));


$action=$_GET["action"];
switch($action)
{
	case "login":		
		//!isset($_SESSION['user'])?$_SESSION['user']=array(1,2,3):"";
		break;	
	case "logout":
		$_SESSION['user']=false;
		break;
}


function actionHandler()
{
	$action=$_GET["action"];
	switch($action)
	{
		case "register":						
			include "action/register_inc.php";
			break;
		case "login":
			include "action/login_inc.php";			
			break;			
	}
}

?>
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>你我欢乐网(www.056joy.com),enjoy!</title>
<link rel="stylesheet" href="css/base.css" />
<link rel="shortcut icon" href="image/shortcut.png"  />

<script type="text/javascript" src="commonJS/commonTool.js?v=<?php echo rand(1,10000); ?>" >
</script>
<script type="text/javascript" src="commonJS/User.js?v=<?php echo rand(1,10000); ?>" >
</script>

<script type="text/javascript" >

</script>



</head>
<body>

<div class="main">
		<div id="header">
			<?php
				
				include "header/header_inc.php";
			?>
		</div>
		<div class="content">
			&nbsp;
			<?php			
				actionHandler();
			?>
		</div>
		<div id="foot" onselectstart="javascript:return false;" >
			<?php
				include_once "foot_inc.php";
			?>
		</div>
		
</div>

</body>

</html>