<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
// ob_start();
// header("Content-Type:text/html;charset=utf-8");
//http://127.0.0.1/zhh_web/site/

include_once "siteConfig.php";

// echo $GLOBAL["mysql"];

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

<script type="text/javascript" >

</script>



</head>
<body>

<div class="main">
		<div id="header">
			<?php
				
				include "header_inc.php";
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