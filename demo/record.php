<head>
        <title>A Simple Page with CKEditor</title>
        <!-- Make sure the path to CKEditor is correct. -->
        <script type="text/javascript" src="ckeditor/ckeditor.js"></script><style>.cke{visibility:hidden;}</style>
       <script type="text/javascript" src="commonJS/commonTool.js">
	  </script>
	  <script type="text/javascript" src="commonJS/AJAX.js">
	  </script>
		<script type="text/javascript">
			
			function onClick()
			{
				//alert($('editor1').value);
				//alert($('editor1').innerHTML);
				
				var data=CKEDITOR.instances.editor1.getData(); //编辑后的内容
				//alert(data);
				//alert("innerHTML=" $('show01').innerHTML);
				$('show01').innerHTML=data; //替换
				var ajax=new Ajax();
				
				var test=document.getElementsByTagName('html')[0].innerHTML; 
				ajax.send("http://127.0.0.1/zhh_web/html_editor.php",{content:test},{callback:success});
				
				//$('show01').innerText=data;
				//alert("html=" $('show01').html);
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
    <script type="text/javascript" src="http://127.0.0.1/zhh_web/ckeditor/config.js?t=E1PE"></script><link rel="stylesheet" type="text/css" href="http://127.0.0.1/zhh_web/ckeditor/skins/moono/editor.css?t=E1PE"><script type="text/javascript" src="http://127.0.0.1/zhh_web/ckeditor/lang/en.js?t=E1PE"></script><script type="text/javascript" src="http://127.0.0.1/zhh_web/ckeditor/styles.js?t=E1PE"></script></head>
    <body onload="createEditor()">      
		<textarea name="editor1" id="editor1" rows="10" cols="80" style="visibility: hidden; display: none;">			This is my textarea to be replaced with CKEditor.
		</textarea><div id="cke_editor1" class="cke_1 cke cke_reset cke_chrome cke_editor_editor1 cke_ltr cke_browser_webkit cke_browser_quirks" dir="ltr" lang="en" role="application" aria-labelledby="cke_editor1_arialbl"><span id="cke_editor1_arialbl" class="cke_voice_label">Rich Text Editor, editor1</span><div class="cke_inner cke_reset" role="presentation"><span id="cke_1_top" class="cke_top cke_reset_all" role="presentation" style="height: auto; -webkit-user-select: none;"><span id="cke_9" class="cke_voice_label">Editor toolbars</span><span id="cke_1_toolbox" class="cke_toolbox" role="group" aria-labelledby="cke_9" onmousedown="return false;"><span id="cke_14" class="cke_toolbar" aria-labelledby="cke_14_label" role="toolbar"><span id="cke_14_label" class="cke_voice_label">Document</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_15" class="cke_button cke_button__source  cke_button_off" href="javascript:void('Source')" title="Source" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_15_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(2,event);" onfocus="return CKEDITOR.tools.callFunction(3,event);" onmousedown="return CKEDITOR.tools.callFunction(4,event);" onclick="CKEDITOR.tools.callFunction(5,this);return false;"><span class="cke_button_icon cke_button__source_icon" style="background-image:url(http://127.0.0.1/zhh_web/ckeditor/plugins/icons.png?t=E1PE);background-position:0 -1824px;background-size:auto;">