<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>��������</title>
<link rel="stylesheet" href="" type="text/css" />
<script type="text/javascript" src="" >
</script>
</head>

<body>
<form action="rename.php" method="post" >
	<p>--------------------��������,<font color="#ff0000" >��������������ñ���ԭʼ�ļ�</font>----------------</p>
	������ļ���ǰ׺��:<input type="input" width = "100" value="" name="filePreFix" /><br/>
	Ҫ�޸ĵ��ļ�����׺:<input type="input" width = "100" value="png" name="fileAfterFix" /><br/>
	Ҫ�޸ĵ��ļ���·��:<input type="input" width = "100" value="" name="filePath" /><br/>
	ȷ�ϸ���:<input type="submit" width = "100" value="��������" /><br/>
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
	die("��������Ч���ļ���ǰ׺");
}

/*����������*/
$path = "D:\0.0\Client\GameClient\GameClient\Resources\assets\ui\uiEffects\abilityLvUp"; 
$path = "E:/rename";
if(!$_POST['filePath'] || $_POST['filePath']=="")
{
	die("������޸�·����Ч!");
}
$hc = $_POST['fileAfterFix']; //�ļ���׺
if(!$hc or $hc == "")
{
	$hc = "png";
}

$path=str_replace("\\","/",$_POST['filePath']); //Ҫ�޸ĵ��ļ���·��
echo "--------------------- �����ָ��� �������-------------------<br/><br/>";
echo "��ʼ�޸� $path ·���µ� $hc �ļ�<br/><br/>";
$logPath="log";
if(!file_exists($logPath))
{
	if(!mkdir("$logPath"))
	{
		 die("����Ŀ¼logPath=$logPath ʧ��,�޷�����ִ��.. <br/>");
	}
}
$filename = $logPath."/".$fix."_log.txt";
$filename=str_replace(" ","",$filename); //ȥ���ո�

if(file_exists($filename))
{
	if(unlink($filename))
	{
		echo "ɾ�� $filename log�ļ�<br/>";
	}	
}else
{
	//echo "��־�ļ� $filename ������<br/>";
}
$dh = opendir($path); 
$i=0; 
$j=1;
$max = 2000; //��ֹһЩδ֪�����ѭ��
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
			$newName=str_replace(" ","",$newName); //ȥ���ո�
			$oldName = $path."\\".$file;
			$logstr = "oldName = ".$oldName." ; newName = ".$newName;
			$logstr = " \r".$logstr."         ��".$i."���ļ�\r\n";
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
echo "<br/>�������������� $i �� $hc �ļ�";
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