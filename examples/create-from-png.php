<?php
$sur = new CairoImageSurface(Cairo::FORMAT_ARGB32, 2, 2);
$con = new CairoContext($sur);
$s = new CairoImageSurface(Cairo::FORMAT_ARGB32, 2, 2);

$s->createFromPng(dirname(__FILE__)  ."/create-from-png-ref.png");
$con->setSourceSurface($s);
$con->paint();

$sur->writeToPng(dirname(__FILE__)  . "/create-from-png-php.png");
?>
