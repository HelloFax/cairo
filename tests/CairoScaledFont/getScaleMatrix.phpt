--TEST--
CairoScaledFont->getScaleMatrix() method
--SKIPIF--
<?php
if(!extension_loaded('cairo')) die('skip - Cairo extension not available');
?>
--FILE--
<?php
include(dirname(__FILE__) . '/create_toyfont.inc');
var_dump($fontface);
$matrix1 = new Cairo\Matrix(1);
$matrix2 = new Cairo\Matrix(1,1);
$fontoptions = new Cairo\FontOptions();

$scaled = new CairoScaledFont($fontface, $matrix1, $matrix2, $fontoptions);
var_dump($scaled);

var_dump($scaled->getScaleMatrix());

/* Wrong number args */
try {
    $scaled->getScaleMatrix('foo');
    trigger_error('status requires only one arg');
} catch (TypeError $e) {
    echo $e->getMessage(), PHP_EOL;
}
?>
--EXPECTF--
object(CairoToyFontFace)#%d (0) {
}
object(CairoScaledFont)#%d (0) {
}
object(Cairo\Matrix)#%d (0) {
}
CairoScaledFont::getScaleMatrix() expects exactly 0 parameters, 1 given