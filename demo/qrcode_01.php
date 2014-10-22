<?php

////http://127.0.0.1/zhh_web/qrcode_01.php

$data = 'http://www.putclub.com';
$size = '200x200';
$logo = 'pic.png';	// 中间那logo图

// 通过google api生成未加logo前的QR图，也可以自己使用RQcode类生成
$png = 'http://chart.googleapis.com/chart?chs=' . $size . '&cht=qr&chl=' . urlencode($data) . '&chld=L|1&choe=UTF-8';

$QR = imagecreatefrompng($png);
if($logo !== FALSE)
{
	$logo = imagecreatefromstring(file_get_contents($logo));
	
	$QR_width = imagesx($QR);
	$QR_height = imagesy($QR);
	
	$logo_width = imagesx($logo);
	$logo_height = imagesy($logo);
	
	$logo_qr_width = $QR_width / 5;
	$scale = $logo_width / $logo_qr_width;
	$logo_qr_height = $logo_height / $scale;
	$from_width = ($QR_width - $logo_qr_width) / 2;
	
	imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
}
header('Content-type: image/png');
imagepng($QR);
imagedestroy($QR);

?>