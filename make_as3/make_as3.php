<?php  

// http://127.0.0.1/zhh_web/make_as3/make_as3.php
 
/* $vars="com{func}cn";
$i=strpos($vars,"{");
$j=strpos($vars,"}");



echo substr_replace($vars,"hello_",$j,0).'  ----------<br/>';
// echo substr_replace($vars,"hello",$i,$j-$i+1).'<br/>';

echo '-------- i='.$i.'j='.$j.' vars='.$vars;
 
die("");  */
 


$enter2Tab="\n		"; //���и�ʽ�� (ע��: "\n"д�� '\n' ����Ч��)
 
$package="com.joy.util";
$className="StrUtil";
$vars="private var i:int=0;".$enter2Tab."private var j:int=1;".$enter2Tab."private var str:String='hello';\n";


/**
* ����ģ�崴���ĵ�
**/
function makeAS3File($package,$className,$vars)
{
	$contents=file_get_contents("templete/actionscript_templete.tmp"); //��ȡģ��	
	$contents=str_replace("@package","$package",$contents); //���ð���
	$contents=str_replace("@className","$className",$contents); //��������
	$contents=str_replace("@vars","$vars",$contents); //���ö��������
	$offset=strpos($contents,"<");
	$end=strpos($contents,">");
	$funcBody=file_get_contents("templete/funcBody.tmp"); //��ȡ������
	
	$contents=str_replace("<","",$contents); //ȥ�� <
	
	$end=strpos($contents,">");
	$contents=substr_replace($contents,$enter2Tab.$funcBody,$end,0);//���뺯���� 
	
	$contents=str_replace(">","",$contents); //ȥ�� >
	
	return $contents;
}

$contents=makeAS3File($package,$className,$vars);
saveAS3File($package,$className,$contents);
/**
* �����ĵ�
**/
function saveAS3File($package,$className,$contents)
{
	$package=str_replace(".","/",$package);//�Ѱ����滻��·��
	$dir=$package;
	$dirArr=explode("/",$dir);
	$tempDir="";
	$indexMax=count($dirArr)-1;
	foreach($dirArr as $key=>$v) //�𼶴���Ŀ¼ (phpֻ���𼶴���)
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
		echo "�ɹ������� $url ";
	}else
	{
		echo "�޷����� $url  ||| ������..";
	}

}





?>