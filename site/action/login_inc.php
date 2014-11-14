<?php
//echo 'post='.$_POST['name'].' get='.$_GET['name']." register";
//http://127.0.0.1/zhh_web/site/action/login_inc.php
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户登陆</title>
<link rel="stylesheet" href="css/login.css?v=<?php echo rand(1,10000);?>"  />
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

function userReg()
{	
	var name=$('username').value;
	var psw=$('password').value;	
	Ajax.send("action.php",{name:name,psw:psw,action:"login"},{onSuccess:success});
}

function onFocusOut(id)
{
	var value=$(id).value;
	$('s_'+id).innerHTML=value;
	
}

function success(text)
{
	alert(text);
}

</script>


</head>

<body>
<div class="login">
	<div class="loginTitle">用户登陆</div>
	<div class="loginCnt">
		用户名:<input type="text" id="username" size="20" name="username" value="请输入你的用户名" onfocus="clearText(this.id)" onblur="onFocusOut(this.id)" />
		<span id="s_username"></span><br/>
		密　码:<input type="password" size="21" id="password" name="password" value="11111" onfocus="clearText(this.id)" onblur="onFocusOut(this.id)" />
		<span id="s_password"></span><br/>
		<div class="loginCntBtn">
			<input type="submit" id="submit" name="submit" value="登 陆" onclick="userReg()" />
			<input type="button" id="cancle" name="cancle" value="清 空" onclick="clearInput()" />
			<input type="button" id="cancle" name="cancle" value="取 消" onclick="toIndex()" />
		</div>
		
	</div>

</div>
</body>

</html>