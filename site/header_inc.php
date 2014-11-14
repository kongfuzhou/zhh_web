<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 

//include_once "siteConfig.php";

?>
<html>
<head>

<meta charset="utf-8" />

<title></title>
<link rel="stylesheet" href="css/header.css?v=<?php echo rand(0,10000)?>" type="text/css" />
<script type="text/javascript" src="commonJS/AJAX.js?v=<?php echo rand(1,10000); ?>" >
</script>
<script type="text/javascript" >

function showAccountList()
{	
	if($('myAcctSet').style.display=='none' || $('myAcctSet').style.display=='')
	{
		$('myAcctSet').style.display='block';		
		
	}else
	{
		$('myAcctSet').style.display='none';
	}

}

</script>
<style>

</style>

</head>
<body>
<div class="nav">
	<div class="banner" onselectstart="javascript:return false;">
		<div class="regLog">
			<?php				
						
				if(!$_SESSION['user'])
				{
					$infos=array(
					array('type'=>'submit','name'=>'login','value'=>'登 陆','action'=>'login','target'=>'index.php'),
					array('type'=>'submit','name'=>'register','value'=>'注 册','action'=>'register','target'=>'index.php')
					);
					$len=count($infos);
					$html="";
					for($i=0;$i<$len;$i++)
					{
						$temp=$infos[$i];
						$html.="<a href='{$temp['target']}?action={$temp['action']}'><input type='{$temp['type']}' name='{$temp['name']}' value='{$temp['value']}' /></a>";
					}
					echo "<div>".$html."</div>";
				}else
				{
					$user=array('name'=>'切克闹');
					echo "<div class='userBar' ><span>欢迎您![<a href='#'>{$user['name']}</a>]</span><span onmouseover='' onclick='showAccountList()'><a href='#'>我的账号</a></span></div>";					
				} 			
			?>
			
		</div>
		
		<span class="slogan" >
			<img src="image/shortcut.png" />
			2B青年欢乐多，文艺青年多欢乐。
		</span>
	</div>
	<div class="navBg" onselectstart="javascript:return false;" >
		<li><a href="index.php?action=index">首页</a></li>
		<li><a href="#">涂鸦</a></li>
		<li><a href="#">段子</a></li>
		<li><a href="#">糗乐</a></li>
		<li><a href="#">视频</a></li>
		<li><a href="#">搞作</a></li>
		<li><a href="#">站长</a></li>
	</div>
	<div >
		<span class="ad_left">
			ad位置 左
		</span>
		<span class="ad_right">
			ad位置 右
		</span>
	</div>
	<?php 

		if($_SESSION['user'])
		{							
			include "myAccountMenu.php";
		}
	?>
</div>



</body>

</html>