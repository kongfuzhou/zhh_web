<?php

//http://127.0.0.1/zhh_web/demo/qrcodeTest.php

include('../phpqrcode/phpqrcode.php');
// ��ά������
$data = 'http://gz.altmi.com';
$data = 'Ұ���ճ�!';

// ���ɵ��ļ���
$filename = 'my_qr_code.png';
// ������L��M��Q��H
$errorCorrectionLevel = 'L'; 
// ��Ĵ�С��1��10
$matrixPointSize = 4; 
$data2=imagecreatefromstring(file_get_contents("qrcode_logo.png"));//file_get_contents("pic.png");
echo $data2; 
QRcode::png("$data2", $filename, $errorCorrectionLevel, $matrixPointSize, 2);

echo "�Ѿ��ɹ����ɶ�ά��";


?>