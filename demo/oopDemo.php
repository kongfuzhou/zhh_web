<?php

function newLine($num=1)
{
	for($i=0;$i<$num;$i++)
	{
		echo "<br/>";
	}
 }

 interface IPeople
 {
	function eat();
 
 }
 
 class People implements IPeople
 {
	public function People()
	{
		echo iconv('gbk','utf-8',"People __Construct .... 超类的构造函数");
	}
	public function eat()
	{
		echo iconv('gbk','utf-8',"People eat .... 中文可以显示么");
	}
 
 }
 
 class Man extends People
 {
	public static $version="1.0.0.12";
	const version_date="20140321"; //常量不能带修饰符,常量名不能带$
	/* public function Man()
	{
		echo iconv('gbk','utf-8'," Man __Construct .... 构造函数");
		//parent::__Construct();
	} */
	
	/* public function eat()
	{		
		echo iconv('gbk','utf-8',"Man eat .... 中文可以显示么");
	} */
	
 }





?>