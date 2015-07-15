<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>批量改名</title>
<link rel="stylesheet" href="" type="text/css" />
<script type="text/javascript" src="" >
</script>
</head>

<body>
<form action="rename.php" method="post" >
	<p>--------------------批量改名,<font color="#ff0000" >谨慎操作事先最好备份原始文件</font>----------------</p>
	保存的文件名前缀　:<input type="input" width = "100" value="" name="filePreFix" /><br/>
	要修改的文件名后缀:<input type="input" width = "100" value="png" name="fileAfterFix" /><br/>
	要修改的文件夹路径:<input type="input" width = "100" value="" name="filePath" /><br/>
	确认改名:<input type="submit" width = "100" value="批量改名" /><br/>
</form>

</body>

</html>

<?php
header("Content-Type:text/html;   charset=gb2312");
if($_POST['filePreFix'] and $_POST['filePreFix']!="")
{
	$fix=$_POST['filePreFix'];
}else
{
	die("请输入有效的文件名前缀");
}

/*批量重命名*/
$path = "D:\0.0\Client\GameClient\GameClient\Resources\assets\ui\uiEffects\abilityLvUp"; 
$path = "E:/rename";
if(!$_POST['filePath'] || $_POST['filePath']=="")
{
	die("输入的修改路径无效!");
}
$hc = $_POST['fileAfterFix']; //文件后缀
if(!$hc or $hc == "")
{
	$hc = "png";
}

$path=str_replace("\\","/",$_POST['filePath']); //要修改的文件夹路径
echo "--------------------- 华丽分割线 改名输出-------------------<br/><br/>";
echo "开始修改 $path 路径下的 $hc 文件<br/><br/>";
$logPath="log";
if(!file_exists($logPath))
{
	if(!mkdir("$logPath"))
	{
		 die("创建目录logPath=$logPath 失败,无法继续执行.. <br/>");
	}
}
$filename = $logPath."/".$fix."_log.txt";
$filename=str_replace(" ","",$filename); //去掉空格

if(file_exists($filename))
{
	if(unlink($filename))
	{
		echo "删除 $filename log文件<br/>";
	}	
}else
{
	//echo "日志文件 $filename 不存在<br/>";
}
$dh = opendir($path); 
$i=0; 
$j=1;
$max = 2000; //防止一些未知情况死循环
while (($file = readdir($dh)) !== false) {	
    if($file != "." && $file != "..") { 
		//substr($path."\\".$file, 0,-3)
		$arr = explode(".",$file);
		if($arr[1] == $hc)
		{
			$i++;			
			$s=preg_match_all("(\d+)",$arr[0],$ret);					
			$index = $ret[0][0];
			if(!$index)
			{
				$index=$i;
			}			
			$newName = $path."\\".$fix."_".$index.".png";
			$newName=str_replace(" ","",$newName); //去掉空格
			$oldName = $path."\\".$file;
			$logstr = "oldName = ".$oldName." ; newName = ".$newName;
			$logstr = " \r".$logstr."         第".$i."个文件\r\n";
			//echo $logstr."<br/>";
			file_put_contents($filename,$logstr,FILE_APPEND);
			rename($oldName,$newName);			
		}	   
    }	
	$j++;
	if ($j>=$max)
	{
		break;
	}
}
echo "<br/>本次批量重命名 $i 个 $hc 文件";
closedir($dh);
/*
$str = 'Acer-laptop-battery/Acer-3UR18650F-3-QC151-battery-17.html';
$reg = '/battery\/(.*)-battery-.*\.html/U';
$s = preg_match_all( $reg, $str, $arr );
echo "<pre>";
print_r( $arr );
echo "</pre>";
*/

?>