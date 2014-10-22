
/*
*ajax功能封装
*@time    2014-3-27 16:50:05
*@author  zhouhonghui
*@email	  623097864@qq.com
*/

Ajax.STATUS_INIT = -1;
Ajax.STATUS_READY = 0;
Ajax.STATUS_OK = 1;
Ajax.STATUS_FAIL = 2; 

/**
* 多个请求的队列 (按照数组顺序一个个执行)
*@params urlCollection  数组类型(要请求的链接集合[url,url])
*@params dataCollection 数组类型(对应的数据数组[{},{}])
*@params varsCollection 数组类型(对应的请求设置[{},{},{}])
*@params isAllAsync     是否全部异步
*@params ignoreFail	    是否忽略成功状态(如果不忽略,那么上一个的请求返回不成功就不会执行下一个了)
**/
Ajax.queueSend=function (urlCollection,dataCollection,varsCollection,isAllAsync,ignoreFail)
{
	
	isAllAsync==undefined?isAllAsync=true:'';
	ignoreFail==undefined?ignoreFail=true:'';
	if(urlCollection.length==dataCollection.length && dataCollection.length==varsCollection.length)
	{
		var length=varsCollection.length;
		if(isAllAsync) //是否全部强制为异步
		{
			for(var i=0;i<length;i++)
			{
				varsCollection[i].async=true;
			}
		}		
		var index=0;
		var ajax=new Ajax();
		ajax.onComplete=onComplete;	
		ajax.send(urlCollection[index],dataCollection[index],varsCollection[index]);		
		function onComplete(status)
		{			
			index++;
			//alert(status+" ignoreFail "+ignoreFail);
			if(index==length)
			{
				return;
			}
			if(ignoreFail)
			{
				ajax.send(urlCollection[index],dataCollection[index],varsCollection[index]);
			}else if(status==Ajax.STATUS_OK)
			{
				ajax.send(urlCollection[index],dataCollection[index],varsCollection[index]);
			}
		}
	}
}

Ajax.send=function (url,data,vars)
{
	var ajax=new Ajax();
	ajax.send(url,data,vars);
}


/*ajax对象*/
function Ajax()
{
	this.send=send; //公有成员
	
	this.onComplete;
	//私有成员
	var onSuccess;
	var onFail;	
	var _this=this;
	
	/**
	* 请求数据
	*@params url  请求的链接
	*@params data 要传递的参数(键值对Object)  例如:{name:'any',age:20}
	*@params vars 设置{onSuccesss:Function,onFail:Function,method:'post/get',async:false}
	**/
	function send(url,data,vars)
	{
		alert(url);
		this.status=-1;
		var dataStr="";	
		var method;
		var async=false;
		method=vars.method?'':method='post';
		onSuccess=vars.onSuccess;
		onFail=vars.onFail;		
		for(var i in data)
		{
			dataStr+=i+'='+data[i]+'&';
		}	
		dataStr=dataStr.substr(0,dataStr.length-1);
		xmlHttp=GetXmlHttpObject();	
		if(!xmlHttp)
		{
			alert("your brower don't support the ajax!");
			return;
		}
		if(method=="get") 
		{
			url+="?"+dataStr;
			dataStr=null;
		}
		xmlHttp.open(method,url,async);		 
		xmlHttp.onreadystatechange = onStateChange;
		if(method=="post")
		{
			//设置http的头部 (使用post传送方式这个很重要)
			xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		}		
		xmlHttp.send(dataStr);
		this.status=Ajax.STATUS_READY;
		
	}
	
	function onStateChange(){		
		if(xmlHttp.readyState == 4) {			
			if(xmlHttp.status == 200) {				
				_this.status=Ajax.STATUS_OK;				
				if(onSuccess)
				{					
					onSuccess(xmlHttp.responseText);					
				}
			}else if(xmlHttp.status == 404)
			{
				_this.status=Ajax.STATUS_FAIL;
				if(onFail)
				{				
					onFail();					
				}
			}			
			if(_this.onComplete)
			{
				_this.onComplete(_this.status);
			}
			
		}
	}
	
	function GetXmlHttpObject()
	{
		var xmlHttp=null;		
		try{
			// Firefox, Opera 8.0+, Safari
			xmlHttp=new XMLHttpRequest();
		}catch(e)
		{
			try{
				//ie 6.0以上
				xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
			}catch(e)
			{
				//ie 5.5
				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
		}
		
		return xmlHttp;		
	}
	
}




