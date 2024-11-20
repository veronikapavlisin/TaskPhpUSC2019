<?php 

/**
 * @author     Veronika Pavlisin
 * @version    1.00
 * @date       18.06.2019
 */

include "ShapeConfig.php";

include "GraphEditorClass.php";

// check for presence of parameters in cli
if ($argc == 1)
{
	exit("Error: First parameter is missing");
}

// first parameter is required to be JSON string
if (($input = json_decode($argv[1], true)) === FALSE)
{
	exit("Error: JSON string format required for first parameter");
}

// global variable $shapeConfiguration read from ShapeConfig.php passed as parameter 
$editor = new GraphEditor($shapeConfiguration);

// output as JSON string (either array of rendered shapes or error message
exit(json_encode($editor->render($input)));

?>