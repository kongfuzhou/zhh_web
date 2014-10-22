<?php
//http://127.0.0.1/zhh_web/demo/site_index.php
session_start();

//session_destroy();

//Session.Abandon();
if($_SESSION['online'])
{
	$_SESSION['online']++;
}else
{
	$_SESSION['online']=1;
}

echo 'online='.$_SESSION['online']."session_id=".session_id();
echo "<br/>";



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd" />
<html>
<head>

<title></title>
<link rel="stylesheet" href="../css/base.css"  />
<script type="text/javascript" src="../commonJS/commonTool.js" >
</script>
<script type="text/javascript" src="../commonJS/AJAX.js" >
</script>

<script type="text/javascript" src="../commonJS/People.js" >
</script>

<script type="text/javascript">

function onLoadHandler()
{

	var url="http://127.0.0.1/zhh_web/site/register/register.php";
	
	//var result = window.showModalDialog(url, null, 'dialogWidth:600px;dialogHeight:500px;center:yes;help:no;resizable:no;status:no');  //打开模态子窗体,并获取返回值

	//window.open(url,'MyName','width=500,height=300,left=500,top=300,resizable=0');
	//show_popup();
	
	/* var pl0=new People("pl0");
	
	pl0.run(runFunc);
	alert("pl0.age="+pl0.age);
	
	var pl2=new People("pl2");
	
	pl2.run(); */
	
	var ajax0=new Ajax();
	ajax0.send("http://127.0.0.1/zhh_web/site/register/register.php",{name:"kongfu"},{onSuccess:update});
	
	var ajax1=new Ajax();
	ajax1.send("http://127.0.0.1/zhh_web/flashReq.php",{name:"success"},{onSuccess:success});
	 
	 
	//var ajax0=new Ajax();
	
	/* Ajax.queueSend(["http://127.0.0.1/zhh_web/site/register/register.php","http://127.0.0.1/zhh_web/flashReq.php"],
	[{name:"<?php echo base64_encode("kongfu");?>"},{name:"success"}],
	[{onSuccess:update},{onSuccess:success}]
	);  */
	
	//alert(Ajax.queueSend);
	//Ajax.test();
	//AJAX.send("http://127.0.0.1/zhh_web/site/register/register.php",{name:"kongfu"},{callback:update});
	//AJAX.send("http://127.0.0.1/zhh_web/flashReq.php",{name:"success"},{callback:success});
}

function show_popup()
{
	var p=window.createPopup()
	var pbody=p.document.body
	pbody.style.backgroundColor="lime"
	pbody.style.border="solid black 1px"
	pbody.innerHTML="This is a pop-up! Click outside to close."
	p.show(150,150,200,50,document.body);
}


function update(text)
{
	//alert(" update 已经回调 "+text);
	
}

function success(text)
{
	alert(" success ...  已经回调 ... "+text);
}

function runFunc()
{
	alert("runFunc.......");
}

function clickItem(withOne)
{
	alert('hello '+withOne);
}

</script>

</head>


<body onload="">
<div class="main">
<h3 class='ListH2'>分类列表</h3>
<div class="list" >

<?php 

$listItem=array('随笔','心得','分享','项目');
$len=count($listItem);

$liHead="<li>";
$liEnd="</li>"; 
$aHead='<a href="javascript:clickItem(#)" >';
$aEnd="</a>";

for($i=0;$i<$len;$i++)
{
	//echo $liHead.str_replace('#',"'".$listItem[$i]."'",$aHead).$listItem[$i].$aEnd.$liEnd;	
}

?>
</div>
</div>
</body>

</html>