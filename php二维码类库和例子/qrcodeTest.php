<?php

//http://127.0.0.1/zhh_web/demo/qrcodeTest.php

include('../phpqrcode/phpqrcode.php');
// 二维码数据
$data = 'http://gz.altmi.com';
$data = '野猪狗日成!';

// 生成的文件名
$filename = 'my_qr_code.png';
// 纠错级别：L、M、Q、H
$errorCorrectionLevel = 'L'; 
// 点的大小：1到10
$matrixPointSize = 4; 
$data2=imagecreatefromstring(file_get_contents("qrcode_logo.png"));//file_get_contents("pic.png");
echo $data2; 
QRcode::png("$data2", $filename, $errorCorrectionLevel, $matrixPointSize, 2);

echo "已经成功生成二维码";


?>