<?php

//127.0.0.1/zhh_web/callBat/callBat.php

exec('start_sw.bat', $results);
echo '<pre>';
$results = implode("\n", $results);
echo $results;
echo '</pre>';

/* $path = "C:/Program Files (x86)/FlashDevelop/";
$sw='FlashDevelop.exe';
echo exec("exec.bat");
system("start_sw.bat");
echo "call bat"; */


/*

$path = “D:\wamp\bin\php\php5.2.8″;
exec(”b.bat $path”,$out,$status);

说明：$path指在windows下php.exe所在的目录，而这里作为参数传入b.bat文件。

不能直接在exec函数这样写：exec(”b.bat D:\wamp\bin\php\php5.2.8″)，原因程序无法识别到正确的参数，通过定义变量可实现如：$path这种方式就没问题。

b.bat 文件内容：

%1\php.exe -q D:\wamp\www\test\b.php

说明：%1是指传入b.bat文件的第一个参数，每条语句不用任何符号结束。

*/

?>