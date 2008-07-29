<?php
$width = 8;
$height = 8;
$sur = new CairoImageSurface(Cairo::FORMAT_ARGB32, $width, $height);
$con = new CairoContext($sur);
$s = new CairoImageSurface(Cairo::FORMAT_A8,$width,$height);
$str="";
$stride = $s->getStride();

for($i=0; $i<8; $i++) {
	$str=$str . chr(0);
	$str=$str . chr(0);
	$str=$str . chr(255);
	$str=$str . chr(0);
	$str=$str . chr(255);
	$str=$str . chr(0);
	$str=$str . chr(0);
	$str=$str . chr(0);
}

echo $str;
$s->createFromData($str, Cairo::FORMAT_A8, $width, $height);
$con->setSourceRgb(0,0,1);
$con->paint();

$con->setSourceRgb(1,0,0);
$con->maskSurface($s,0,0);
$sur->writeToPng(dirname(__FILE__)  . "/a8-mask-php.png");
?>
