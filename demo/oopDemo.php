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
		echo iconv('gbk','utf-8',"People __Construct .... ����Ĺ��캯��");
	}
	public function eat()
	{
		echo iconv('gbk','utf-8',"People eat .... ���Ŀ�����ʾô");
	}
 
 }
 
 class Man extends People
 {
	public static $version="1.0.0.12";
	const version_date="20140321"; //�������ܴ����η�,���������ܴ�$
	/* public function Man()
	{
		echo iconv('gbk','utf-8'," Man __Construct .... ���캯��");
		//parent::__Construct();
	} */
	
	/* public function eat()
	{		
		echo iconv('gbk','utf-8',"Man eat .... ���Ŀ�����ʾô");
	} */
	
 }





?>