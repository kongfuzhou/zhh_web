<?php 
header("Content-Type:text/html;charset=gbk");

$name=$_POST['name'];
$resource=mysqli_connect("127.0.0.1","root","") or die("mysql connect fail!");
$selectedb=mysqli_select_db($resource,"test");
if($selectedb)
{
	mysqli_query($resource,"set names gbk");	
	$sql="select * from user where name='1'";
	// echo $sql;
	$ret=mysqli_query($resource,"$sql");
	if($ret)
	{
		$result=array();
		while($row=mysqli_fetch_array($ret,MYSQLI_ASSOC))
		{
			array_push($result,$row);
		}
		print_r($result);
	}
}else
{
	echo "�Ҳ������ݿ�!";
}
echo "".mysqli_error($resource);//�������
mysqli_close($resource);

?>