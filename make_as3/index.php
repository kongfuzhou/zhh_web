<?php 
// http://127.0.0.1/zhh_web/make_as3/make_as3.php
// phpinfo();

/* $word = new COM("word.application") or die("Unable to instanciate Word");
print "Loaded Word, version {$word->Version}\n"; */




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> <!--�˱�ǩ�ɸ�֪������ĵ�ʹ������ HTML ��XHTML �淶�� -->
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- �����ĵ����� -->
<head>
<title></title>
<script type="text/javascript" >
//���浽����  
function saveFile(filename,content)  
{
	//alert("save_file");
    var win=window.open('','','top=0,left=0');  ;// 
    win.document.write(content);  
    win.document.execCommand('SaveAs','',filename)  
    win.close();  
} 
</script>
<style>
	.main{
		background-color:#cccccc;
		width:500px;
		height:500px;
		margin:0 auto;
	}
</style>
</head>
<body>

<div align="center" class="main" >
<form action="index.php" method="post" >
����:<input type="text" name="package" /><br/>
����:<input type="text" name="class" /><br/>
����ȫ�ֱ���:<textarea  name="globalVars" rows="15" cols="25" >������Ҫ�����ȫ�ֱ���,������������һ���س�����������:private i:int; ����ǰ��ctrl+A��գ�</textarea>
<input type="submit" name="submit" value="����" />
</form>
</div>
</body>

</html>