<?php

//http://127.0.0.1/zhh_web/html_editor.php

if($_POST['submit_btn'])
{
	echo $_POST['show01']."xx ......... ";
	echo "<script type='text/javascript'>alert('aaaa')</script>";
	$data=file_get_contents("html_editor.php");
	file_put_contents("record.log",$data);
}

if($_POST['content'])
{
	echo "<script type='text/javascript'>alert('保存页面')</script>";
	file_put_contents("record.php",$_POST['content']);
}

?>
<html>
    <head>
        <title>A Simple Page with CKEditor</title>
        <!-- Make sure the path to CKEditor is correct. -->
        <script type="text/javascript"  src="ckeditor/ckeditor.js"></script>
       <script type="text/javascript" src="commonJS/commonTool.js" >
	  </script>
	  <script type="text/javascript" src="commonJS/AJAX.js" >
	  </script>
		<script type="text/javascript">
			
			function onClick()
			{
				//alert($('editor1').value);
				//alert($('editor1').innerHTML);
				
				var data=CKEDITOR.instances.editor1.getData(); //编辑后的内容
				//alert(data);
				//alert("innerHTML="+$('show01').innerHTML);
				$('show01').innerHTML=data; //替换
				var ajax=new Ajax();
				
				var test=document.getElementsByTagName('html')[0].innerHTML; 
				ajax.send("http://127.0.0.1/zhh_web/html_editor.php",{content:test},{callback:success});
				
				//$('show01').innerText=data;
				//alert("html="+$('show01').html);
			}
			function success(ret)
			{
				alert("success");
			}
			
			function $(id)
			{
				return document.getElementById(id);
			}			
			// Replace the <textarea id="editor1"> with a CKEditor
			// instance, using default configuration.
			function createEditor()
			{
				CKEDITOR.replace( 'editor1' );
				// CKEDITOR.config.startupMode = 'source';
				//CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
				//$('show01').innerHTML="<span color='#ff0000'>1111111111111</span>";
				//$('show01').innerText=data;
			}
			
         </script>			
    </head>
    <body onload="createEditor()">      
		<textarea name="editor1" id="editor1" rows="10" cols="80">
			This is my textarea to be replaced with CKEditor.
		</textarea>            
		<form id="form1" action="http://127.0.0.1/zhh_web/html_editor.php" method="post">
			<span id="show01" name="show01">			
			</span>
			<input type="submit" value="提 交" name="submit_btn" />
		</form>
		
		<input type="button" value="替 换" onclick="onClick()" />
		
		
		
    </body>
</html>