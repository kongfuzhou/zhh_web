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

$path = ��D:\wamp\bin\php\php5.2.8��;
exec(��b.bat $path��,$out,$status);

˵����$pathָ��windows��php.exe���ڵ�Ŀ¼����������Ϊ��������b.bat�ļ���

����ֱ����exec��������д��exec(��b.bat D:\wamp\bin\php\php5.2.8��)��ԭ������޷�ʶ����ȷ�Ĳ�����ͨ�����������ʵ���磺$path���ַ�ʽ��û���⡣

b.bat �ļ����ݣ�

%1\php.exe -q D:\wamp\www\test\b.php

˵����%1��ָ����b.bat�ļ��ĵ�һ��������ÿ����䲻���κη��Ž�����

*/

?>