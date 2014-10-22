function test()
{
	alert("this is test js tool");
	
}

function $(id)
{
	return document.getElementById(id);
}

function timeOutHandler(time,func)
{
	setTimeout(func,time);
}


function getCurrentDate()
{
	var date=new Date();
	
	return date.toLocaleString();
	
}
function createWindow()
{
	window.open('','MyName','width=500,height=300,left=500,top=300');
}