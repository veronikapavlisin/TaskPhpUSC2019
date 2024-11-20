<?php 

/*
 * Configuration file for supported shapes
 * 
 * In case of new shape a new item in $shapeConfiguration variable should  
 * be created with any specific attributes required for that shape.

 * @author     Veronika Pavlisin
 * @version    1.00
 * @date       18.06.2019
 */


global $shapeConfiguration; 
$shapeConfiguration = array(
	'circle' => array('radius'),
	'square' => array('borderSize'),
);


?>