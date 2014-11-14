<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 


?>
<html>
<head>
<meta http-equiv="Content-Type"  content="text/html;charset=utf-8" />
<link rel="stylesheet" href="css/foot.css" />
<script type="text/javascript" src="commonJS/commonTool.js?<?php echo rand(1,1000);?>" >
</script>

<script type="text/javascript">

function setDateTime()
{
	//alert($("dateTime"));
	$("dateTime").innerHTML=getCurDateTime();
	
}

function onLoad()
{
	setDateTime();
	regTimeRun("FootDateTime",setDateTime);
}

</script>

</head>
<body onload="onLoad()">
<div class='foot'>
<hr />
	<div class="fcontent" onselectstart="javascript:return false;" >
		<li>版权所有 盗版必究</li>
		<li><a href="#" >友情链接</a></li>
		<li><a href="#" >联系我们</a></li>		
	</div>
	<div class="dateTime">
	<font id="dateTime" color="#ff0000"></font>
		
	</div>

</div>
</body>
</html>