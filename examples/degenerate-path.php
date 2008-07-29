<?php
$sur = new CairoImageSurface(Cairo::FORMAT_ARGB32,3*(3+6+3), 8*(6+3) + 3);
$con = new CairoContext($sur);


    $cap = array(Cairo::LINE_CAP_ROUND, Cairo::LINE_CAP_SQUARE, Cairo::LINE_CAP_BUTT);
    
    $dash = array(2.0, 2.0);
    $dash_long = array(6.0, 6.0);

    $con->setSourceRgb ( 1, 0, 0);

    for ($i=0; $i<3; $i++) {
	$con->save ();

	$con->setLineCap ( $cap[$i]);

	/* simple degenerate paths */
	$con->setLineWidth ( 6);
	$con->moveTo ( 6, 6);
	$con->lineTo ( 6, 6);
	$con->stroke ();

	$con->translate ( 0, 3*3);
	$con->moveTo ( 6, 6);
	$con->closePath ();
	$con->stroke ();

	/* degenerate paths starting with dash on */
	$con->setDash ( $dash, 2, 0.);

	$con->translate ( 0, 3*3);
	$con->moveTo ( 6, 6);
	$con->lineTo ( 6, 6);
	$con->stroke ();

	$con->translate ( 0, 3*3);
	$con->moveTo ( 6, 6);
	$con->closePath ();
	$con->stroke ();

	/* degenerate paths starting with dash off */
	/* these should not draw anything */
	$con->setDash ( $dash, 2, 2.);

	$con->translate ( 0, 3*3);
	$con->moveTo ( 6, 6);
	$con->lineTo ( 6, 6);
	$con->stroke ();

	$con->translate ( 0, 3*3);
	$con->moveTo ( 6, 6);
	$con->closePath ();
	$con->stroke ();

	/* this should draw a single degenerate sub-path
	 * at the end of the path */
	$con->setDash ( $dash_long, 2, 6.);

	$con->translate ( 0, 3*3);
	$con->moveTo ( 6 + 6.0, 6);
	$con->lineTo ( 6, 6);
	$con->stroke ();

	/* this should draw a single degenerate sub-path
	 * at the end of the path. The difference between this
	 * and the above is that this ends with a degenerate sub-path*/
	$con->setDash ( $dash_long, 2, 6.);

	$con->translate ( 0, 3*3);
	$con->moveTo ( 6 + 6.0, 6);
	$con->lineTo ( 6, 6);
	$con->lineTo ( 6, 6);
	$con->stroke ();

	$con->restore ();

	$con->translate ( 3+6+3, 0);
    }
$sur->writeToPng(dirname(__FILE__)  . "/degenerate-path-php.png");
?>
