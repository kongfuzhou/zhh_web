<?php

//echo 'post='.$_POST['name'].' get='.$_GET['name']." register";

//http://127.0.0.1/zhh_web/site/action/register.php

?>
<html>
<head>
<meta charset="utf-8" />
<title>你我欢乐网快速注册</title>
<link rel="stylesheet" href="css/register.css?v=<?php echo rand(1,10000);?>"  />
<script type="text/javascript" src="commonJS/commonTool.js?v=<?php echo rand(1,10000);?>" >
</script>

<script type="text/javascript" src="commonJS/AJAX.js" >
</script>

<script type="text/javascript" >



function clearInput()
{	
	clearText("username");
	clearText("password");
}

function userRegister()
{	
	var name=$('username').value;
	var psw=$('password').value;
	var action="register";	
	Ajax.send("action.php",{name:name,psw:psw,action:action},{onSuccess:success});
}

function onFocusOut(id)
{
	var value=$(id).value;
	$('s_'+id).innerHTML=value;
	
}

function success(text)
{
	text=content_notnull(text);
	alert(text);
}


</script>


</head>

<body>
<div class="register">
	<div class="regTitle">新用户快速注册</div>
	<div class="regCnt">
		用户名:<input type="text" id="username" name="username" value="请输入用户名" onfocus="onFirstFocus(this.id)" onblur="onFocusOut(this.id)" />
		<span id="s_username"></span><br/>
		密　码:<input type="password" id="password" name="password" value="11111" onfocus="onFirstFocus(this.id)" />
		<span id="s_password"></span><br/>		
		<div class="regCntBtn">
			<input  type="submit" id="submit" name="submit" value="注 册" onclick="userRegister()" />
			<input  type="button" id="clear" name="clear"   value="清 空" onclick="clearInput()" />
			<input  type="button" id="cancle" name="cancle" value="取 消" onclick="toIndex()"  />
		</div>
		
	</div>
	
	

</div>


</body>

</html>