function test()
{
	alert("this is test js tool");
	
}

/**没上线前的调试模式**/
var IS_DEBUG=true;

function $(id)
{
	return document.getElementById(id);
}

function timeOutHandler(time,func)
{
	setTimeout(func,time);
}
/**
更新用户状态的
**/
function updateState()
{
	
}

function getCurDateTime()
{
	var date=new Date();	
	
	return date.toLocaleString();
}

//---------------------------1秒执行定时器开始
var timeRunMap={};
var keyList=new Array("FootDateTime"); //key列表 必须注册
var timeOutInterver=0;

function regTimeRun(key,func)
{
	if(!timeRunMap[key])
	{
		timeRunMap[key]=func;
	}
	if(timeOutInterver==0)
	{
		
		timeOutInterver=setTimeout(onTimeOut,1000);
	}
	
}
function isHasTimeKey(key)
{
	var flag=false;
	for(var i=0;i<keyList.length;i++)
	{
		if(keyList[i]==key)
		{
			flag=true;
			break;
		}
	}
	return flag;
}

function unRegTimeRun(key)
{
	timeRunMap[key]=null;
}
function onTimeOut()
{
	var i=0;
	
	for(var key in timeRunMap)
	{
		i++;		
		timeRunMap[key]();
	}
	
	if(i==0)
	{
		clearTimeout(timeOutInterver);
		timeOutInterver=0;
	}else
	{
		timeOutInterver=setTimeout(onTimeOut,1000);
		
	}
	
}

//----------------------------1秒执行定时器结束

function createWindow()
{
	window.open('','MyName','width=500,height=300,left=500,top=300');
}
//去掉ajax返回包含的特殊字符的函数
function content_notnull(str){
	result = str.replace(/(^\s*)|(\s*$)/g, "");
	return result;
}

function toIndex()
{
	 window.location.href='index.php?action=index';
}

var focusMap={};

function onFirstFocus(id)
{
	if(!focusMap[id])
	{
		clearText(id);
		focusMap[id]=true;
	}
	
}

function clearText(id)
{	
	$(id).value="";	
}