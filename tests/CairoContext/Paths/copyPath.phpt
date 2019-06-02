--TEST--
Cairo\Context->copyPath() method
--SKIPIF--
<?php
if(!extension_loaded('cairo')) die('skip - Cairo extension not available');
?>
--FILE--
<?php
$surface = new Cairo\Surface\Image(Cairo\Surface\ImageFormat::ARGB32, 50, 50);
var_dump($surface);

$context = new Cairo\Context($surface);
var_dump($context);

var_dump($context->copyPath());

/* Wrong number args - expects 0 */
try {
    $context->copyPath('foo');
    trigger_error('identityMatrix requires 0 args');
} catch (TypeError $e) {
    echo $e->getMessage(), PHP_EOL;
}
?>
--EXPECTF--
object(Cairo\Surface\Image)#%d (0) {
}
object(Cairo\Context)#%d (0) {
}
object(CairoPath)#%d (0) {
}
Cairo\Context::copyPath() expects exactly 0 parameters, 1 given