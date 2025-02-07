--TEST--
Cairo\Context->setFillRule() method
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

$context->setFillRule(Cairo\FillRule::EVEN_ODD);
var_dump($context->getFillRule());

/* Wrong number args - 1 */
try {
    $context->setFillRule();
    trigger_error('setFillRule requires 1 arg');
} catch (ArgumentCountError $e) {
    echo $e->getMessage(), PHP_EOL;
}

/* Wrong number args - 2 */
try {
    $context->setFillRule(1, 1);
    trigger_error('setFillRule requires only 1 arg');
} catch (ArgumentCountError $e) {
    echo $e->getMessage(), PHP_EOL;
}

/* Wrong args */
try {
    $context->setFillRule(array());
    trigger_error('setFillRule requires int');
} catch (TypeError $e) {
    echo $e->getMessage(), PHP_EOL;
}
?>
--EXPECTF--
object(Cairo\Surface\Image)#%d (0) {
}
object(Cairo\Context)#%d (0) {
}
object(Cairo\FillRule)#%d (2) {
  ["__elements"]=>
  array(2) {
    ["WINDING"]=>
    int(0)
    ["EVEN_ODD"]=>
    int(1)
  }
  ["__value"]=>
  int(1)
}
Cairo\Context::setFillRule() expects exactly 1 argument, 0 given
Cairo\Context::setFillRule() expects exactly 1 argument, 2 given
Cairo\Context::setFillRule(): Argument #1 ($fillrule) must be of type int, array given