--TEST--
Cairo\Region->xorRectangle() method
--EXTENSIONS--
eos_datastructures
--SKIPIF--
<?php
include __DIR__ . '/../../skipif.inc';
?>
--FILE--
<?php
$region = new Cairo\Region();
var_dump( $region );
var_dump( $region->getNumRectangles() );
var_dump( $region->getExtents() );

$rectangle1 = new Cairo\Rectangle(10,10,10,10);
var_dump( $region->xorRectangle($rectangle1) == \CAIRO\STATUS::SUCCESS );
var_dump( $region->getNumRectangles() );
var_dump( $region->getExtents() );

$rectangle2 = new Cairo\Rectangle(5,5,20,20);
var_dump( $region->xorRectangle($rectangle2) == \CAIRO\STATUS::SUCCESS );
var_dump( $region->getNumRectangles() );
var_dump( $region->getExtents() );

/* Wrong number args */
try {
    $region->xorRectangle(1);
    trigger_error('Cairo\Region::unionRectangle(): Argument #1 ($region) must be of type Cairo\Region');
} catch (TypeError $e) {
    echo $e->getMessage(), PHP_EOL;
}

try {
    $region->xorRectangle($rectangle1, 'foo');
    trigger_error('Cairo\Region::unionRectangle() expects exactly 1 argument, 2 given');
} catch (TypeError $e) {
    echo $e->getMessage(), PHP_EOL;
}
?>
--EXPECTF--
object(Cairo\Region)#%d (0) {
}
int(0)
object(Cairo\Rectangle)#%d (4) {
  ["x"]=>
  int(0)
  ["y"]=>
  int(0)
  ["width"]=>
  int(0)
  ["height"]=>
  int(0)
}
bool(true)
int(1)
object(Cairo\Rectangle)#%d (4) {
  ["x"]=>
  int(10)
  ["y"]=>
  int(10)
  ["width"]=>
  int(10)
  ["height"]=>
  int(10)
}
bool(true)
int(4)
object(Cairo\Rectangle)#4 (4) {
  ["x"]=>
  int(5)
  ["y"]=>
  int(5)
  ["width"]=>
  int(20)
  ["height"]=>
  int(20)
}
Cairo\Region::xorRectangle(): Argument #1 ($rectangle) must be of type Cairo\Rectangle, int given
Cairo\Region::xorRectangle() expects exactly 1 argument, 2 given