<?php

//http://127.0.0.1/zhh_web/mysql_lib_test.php

include_once "dbLibrary/mysqlUserInterface.php";





echo "<br/>正在测试数据操作类.....";

echo "<br/>";

$url="http://api.map.baidu.com/place/v2/search?&q=饭店&region=北京&output=json&ak=E4805d16520de693a3fe707cdc962045";
$url="http://api.map.baidu.com/place/v2/search";
// $url="http://127.0.0.1/zhh_web/";

$q='饭店';
$region="北京";
$output='json';
$ak='E4805d16520de693a3fe707cdc962045';
$scope="1";


$curlPost = 'q='.urlencode($q).'&
region='.urlencode($region).'&
output='.urlencode($output).'&
ak='.urlencode($ak).'&
scope='.urlencode($scope);


$ch = curl_init();//初始化curl
curl_setopt($ch,CURLOPT_URL,$url);//抓取指定网页
curl_setopt($ch,CURLOPT_HEADER, 0);//设置header
curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
curl_setopt($ch,CURLOPT_POST, 1);//post提交方式
curl_setopt($ch,CURLOPT_POSTFIELDS, $curlPost);
$data=curl_exec($ch);
var_dump($data);
curl_close($ch);












?>