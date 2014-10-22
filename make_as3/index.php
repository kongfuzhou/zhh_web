<?php 
// http://127.0.0.1/zhh_web/make_as3/make_as3.php
// phpinfo();

/* $word = new COM("word.application") or die("Unable to instanciate Word");
print "Loaded Word, version {$word->Version}\n"; */




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> <!--此标签可告知浏览器文档使用哪种 HTML 或XHTML 规范。 -->
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- 设置文档类型 -->
<head>
<title></title>
<script type="text/javascript" >
//保存到本地  
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
包名:<input type="text" name="package" /><br/>
类名:<input type="text" name="class" /><br/>
定义全局变量:<textarea  name="globalVars" rows="15" cols="25" >输入你要定义的全局变量,两个变量间用一个回车隔开。例如:private i:int; 输入前先ctrl+A清空，</textarea>
<input type="submit" name="submit" value="生成" />
</form>
</div>
</body>

</html>