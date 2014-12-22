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


function createWindow()
{
	window.open('','MyName','width=500,height=300,left=500,top=300');
}
//去掉ajax返回包含的特殊字符的函数
function content_notnull(str){
	result = str.replace(/(^\s*)|(\s*$)/g, "");
	return result;
}
/**跳到主页**/
function toIndex(url)
{
	
	toPage('index.php?action=index'+url);
	 
}

function toPage(url)
{
	window.location.href=url;
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

function getObjKeyNum(data)
{
	var objKeyNum=0;
	for(var i in data)
	{
		objKeyNum++;		
	}
	return objKeyNum;
}

/* function isArray(data)
{
	return data instanceof Array;
} */
/**判断是否数组(万能方法)**/
function isArray(obj) {   
  return Object.prototype.toString.call(obj) === '[object Array]';    
}  

//---------------------------1秒执行定时器开始 ssssssssssssssssssssssssssss
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

//----------------------------1秒执行定时器结束 xxxxxxxxxxxxxxxxxxxxxxxxxxx

//-----------------json处理器开始 ssssssssssssssssssssssssssss
/**
* 把Object转换成json数据的函数(理论上支持无限obj嵌套和无限数组嵌套)
**/
function json_encode(data)
{
	var str="";
	if(isArray(data))
	{
		str='[';
		var len=data.length;
		//alert("len="+len);
		for(var i in data)
		{
			if(isArray(data[i])) //先判断是否数组
			{
				str+=json_encode(data[i]);				
			}else if(typeof(data[i])=="object") //再判断是否Object
			{
				str+=makeJSonStr(data[i]);
			}
			else
			{
				str+='"'+data[i]+'"'+"";
			}
			
			if(parseInt(i)+1<len)
			{
				str+=",";				
			}			
			
		}
		
		str+=']';
	}else
	{
		str=makeJSonStr(data);
	}
	
	return str;
}

//把Object转换成json字符串
function makeJSonStr(data)
{
	var str='{';
	var objKeyNum=getObjKeyNum(data);
	var isLast;
	var num=0;
	for(var i in data)
	{
		num++;
		isLast=num==objKeyNum;
		if(isArray(data[i]))
		{
			str+=makeKeyValJson(i,false,false)+json_encode(data[i]);
			!isLast?str+=",":"";
		}else if(typeof(data[i])=="object")
		{
			str+=makeKeyValJson(i,false,false)+makeJSonStr(data[i]);
			!isLast?str+=",":"";
		}else
		{			
			str+=makeKeyValJson(i,false,false)+makeKeyValJson(data[i],true,isLast);
		}		
	}	
	str+='}';	
	return str;
}

function makeKeyValJson(ikeyVal,isVal,isLast)
{
	var str="";
	
	if(isVal)
	{
		!isLast?str='"'+ikeyVal+'",':str='"'+ikeyVal+'"';
	}else
	{
		str='"'+ikeyVal+'":';
	}
	
	return str;
}

/**
* 把json数据转换成Object
**/
function json_decode(str)
{
	var data=new Function("return"+str)();
	if(!data)
	{
		data=eval("("+str+")");
	}
	
	return data;
}


//-----------------json处理器结束 xxxxxxxxxxxxxxxxxxxxxxxxxxx



















