<?
$sur = new CairoImageSurface(Cairo::FORMAT_ARGB32, 12, 12);
$con = new CairoContext($sur);

$data="";

for($i=0; $i<2;$i++) {
$data.=chr(0xff);
$data.=chr(0xff);
$data.=chr(0xff);
$data.=chr(0xff);

$data.=chr(0xff);
$data.=chr(0xff);
$data.=chr(0xff);
$data.=chr(0xff);

$data.=chr(0x00);
$data.=chr(0x00);
$data.=chr(0xff);
$data.=chr(0xff);

$data.=chr(0x00);
$data.=chr(0x00);
$data.=chr(0xff);
$data.=chr(0xff);
}

for($i=0; $i<2;$i++) {
$data.=chr(0x00);
$data.=chr(0xff);
$data.=chr(0x00);
$data.=chr(0xff);

$data.=chr(0x00);
$data.=chr(0xff);
$data.=chr(0x00);
$data.=chr(0xff);

$data.=chr(0xff);
$data.=chr(0x00);
$data.=chr(0x00);
$data.=chr(0xff);

$data.=chr(0xff);
$data.=chr(0x00);
$data.=chr(0x00);
$data.=chr(0xff);
}
echo $data;
//$con->setSourceRgb(0,0,0);
//$con->paint();

$s = new CairoImageSurface(Cairo::FORMAT_ARGB32, 100,100);
$s->createFromData($data, Cairo::FORMAT_RGB24, 4, 4, 16);
$con->scale(2,2);
$con->setSourceSurface($s,1,1);
$pat = $con->getSource();
$pat->setFilter( Cairo::FILTER_NEAREST);
$con->paint();

$sur->writeToPng(dirname(__FILE__)  . "/scale-source-surface-paint-php.png");
?>
