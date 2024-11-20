<?php 

/**
 * @author     Veronika Pavlisin
 * @version    1.00
 * @date       18.06.2019
 */

class Shape
{
	// default attributes common for all shapes
	protected $borderColor;
	protected $borderWidth;
	
	// error flag
	protected $errorMessage;
	
	// constructor that sets values to default attributes
	public function __construct()
	{
		$this->borderColor = '#000000'; // default color
		$this->borderWidth = 1; // default border width
		
		$this->errorMessage = '';
	}
	
	// method to check on error
	public function isValid()
	{
		return $this->errorMessage == '';
	}
	
	// method to get error message
	public function getError()
	{
		return $this->errorMessage;
	}
	
}


class GraphEditor 
{
	private $shapesSupported;
	private $errorMessage;
	
	public function __construct($shapesSupported)
	{
		$this->shapesSupported = $shapesSupported;
		$this->errorMessage = '';
	}
	
	public function render($shapesToRender)
	{
		// return array of rendered shapes
		$shapesRendered = array();
		
		// cycle through whole input array unless there is an error
		for ($i = 0; $i < count($shapesToRender) && $this->errorMessage == ''; $i++)
		{
			// check whether type of rendered shape is configured to be supported
			if (isset($this->shapesSupported[$shapesToRender[$i]['type']]))
			{
				$objectName = ucfirst($shapesToRender[$i]['type']);
				
				// including class for corresponding type (e.g. CircleClass.php, SquareClass.php)
				//
				// In case of new shape a corresponding class should be added to project with 
				//  - constructor that checks on input attributes
				//  - render method
				include_once $objectName."Class.php";
				
				// creating shape object and passing input parameters
				$shape = new $objectName ($shapesToRender[$i]['params']);
				
				// if there is no error because of parameters
				if ($shape->isValid())
				{
					// calling rendering mockup method
					$shapesRendered[] = $shape->render();
				}
				else
				{
					// recovering error message
					$this->errorMessage = $shape->getError();
				}
			}
			else
			{
				$this->errorMessage = "Unsupported '".$shapesToRender[$i]['type']."' shape";
			}
		}
		
		// in case of error, error message is returned
		return $this->errorMessage == '' ? $shapesRendered : "Error: ".$this->errorMessage;
	}
}

?>