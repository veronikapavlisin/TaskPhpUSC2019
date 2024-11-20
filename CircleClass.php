<?php 

/**
 * @author     Veronika Pavlisin
 * @version    1.00
 * @date       18.06.2019
 */

class Circle extends Shape
{
	// specific attribute for circle
	private $radius;
	
	// contructor with input parameters of shape
	public function __construct($shapeParameters)
	{
		// calling parent constructor to ensure that default attributes are set
		parent::__construct();
        
		// check whether requred attribute was sent in input array
		if (isset($shapeParameters['radius']) && $shapeParameters['radius'] != '')
		{
			$this->radius = $shapeParameters['radius'];
		}
		else
		{
			$this->errorMessage = 'Parameter radius is missing';
		}
		
		// seting values of default atributes in case they were sent in input array
		if (isset($shapeParameters['borderColor']) && $shapeParameters['borderColor'] != '')
		{
			$this->borderColor = $shapeParameters['borderColor'];
		}
		if (isset($shapeParameters['borderWidth']) && $shapeParameters['borderWidth'] != '')
		{
			$this->borderWidth = $shapeParameters['borderWidth'];
		}
	}
	
	// mockup function that renders circle based on set attributes
	public function render()
	{
		/* .... rendering .... */
		return $circleRendered;
	}
}

?>