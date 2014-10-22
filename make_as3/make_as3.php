<?php  

// http://127.0.0.1/zhh_web/make_as3/make_as3.php
 
/* $vars="com{func}cn";
$i=strpos($vars,"{");
$j=strpos($vars,"}");



echo substr_replace($vars,"hello_",$j,0).'  ----------<br/>';
// echo substr_replace($vars,"hello",$i,$j-$i+1).'<br/>';

echo '-------- i='.$i.'j='.$j.' vars='.$vars;
 
die("");  */
 


$enter2Tab="\n		"; //换行格式化 (注意: "\n"写成 '\n' 是无效的)
 
$package="com.joy.util";
$className="StrUtil";
$vars="private var i:int=0;".$enter2Tab."private var j:int=1;".$enter2Tab."private var str:String='hello';\n";


/**
* 根据模板创建文档
**/
function makeAS3File($package,$className,$vars)
{
	$contents=file_get_contents("templete/actionscript_templete.tmp"); //获取模板	
	$contents=str_replace("@package","$package",$contents); //设置包名
	$contents=str_replace("@className","$className",$contents); //设置类名
	$contents=str_replace("@vars","$vars",$contents); //设置定义的属性
	$offset=strpos($contents,"<");
	$end=strpos($contents,">");
	$funcBody=file_get_contents("templete/funcBody.tmp"); //提取函数体
	
	$contents=str_replace("<","",$contents); //去掉 <
	
	$end=strpos($contents,">");
	$contents=substr_replace($contents,$enter2Tab.$funcBody,$end,0);//插入函数体 
	
	$contents=str_replace(">","",$contents); //去掉 >
	
	return $contents;
}

$contents=makeAS3File($package,$className,$vars);
saveAS3File($package,$className,$contents);
/**
* 保存文档
**/
function saveAS3File($package,$className,$contents)
{
	$package=str_replace(".","/",$package);//把包名替换成路径
	$dir=$package;
	$dirArr=explode("/",$dir);
	$tempDir="";
	$indexMax=count($dirArr)-1;
	foreach($dirArr as $key=>$v) //逐级创建目录 (php只能逐级创建)
	{
		$tempDir.=$v;	
		if(!is_dir($tempDir))
		{
			mkdir($tempDir);			
		}
		$key<$indexMax?$tempDir.="/":'';	
			
	}
	$dir!=""?$dir.="/":"";
	$url=$dir."$className.as";
	$f=fopen($url,"w+");
	$ret=fwrite($f,$contents);
	fclose($f);
	// $ret=file_put_contents($url,$contents);
	if($ret)
	{
		echo "成功创建了 $url ";
	}else
	{
		echo "无法创建 $url  ||| 请重试..";
	}

}





?>