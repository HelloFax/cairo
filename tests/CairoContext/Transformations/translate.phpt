--TEST--
Cairo\Context->translate() method
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

$context->translate(5, 5);

/* Wrong number args - expects 2 */
try {
    $context->translate();
    trigger_error('translate requires 2 args');
} catch (ArgumentCountError $e) {
    echo $e->getMessage(), PHP_EOL;
}

/* Wrong number args - expects 2 */
try {
    $context->translate(1);
    trigger_error('translate requires 2 args');
} catch (ArgumentCountError $e) {
    echo $e->getMessage(), PHP_EOL;
}

/* Wrong number args - expects 2 */
try {
    $context->translate(1,1,1);
    trigger_error('translate requires 2 args');
} catch (ArgumentCountError $e) {
    echo $e->getMessage(), PHP_EOL;
}

/* Wrong arg type, wants double, double */
try {
    $context->translate(array(), 1);
    trigger_error('translate requires double, double');
} catch (TypeError $e) {
    echo $e->getMessage(), PHP_EOL;
}

/* Wrong arg type, wants double, double */
try {
    $context->translate(1, array());
    trigger_error('translate requires double, double');
} catch (TypeError $e) {
    echo $e->getMessage(), PHP_EOL;
}
?>
--EXPECTF--
object(Cairo\Surface\Image)#%d (0) {
}
object(Cairo\Context)#%d (0) {
}
Cairo\Context::translate() expects exactly 2 arguments, 0 given
Cairo\Context::translate() expects exactly 2 arguments, 1 given
Cairo\Context::translate() expects exactly 2 arguments, 3 given
Cairo\Context::translate(): Argument #1 ($x) must be of type float, array given
Cairo\Context::translate(): Argument #2 ($y) must be of type float, array given