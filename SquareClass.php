<?php 

/**
 * @author     Veronika Pavlisin
 * @version    1.00
 * @date       18.06.2019
 */

class Square extends Shape
{
	// specific attribute for square
	private $borderSize;
	
	// contructor with input parameters of shape
	public function __construct($shapeParameters)
	{
		// calling parent constructor to ensure that default attributes are set
		parent::__construct();
        
		// check whether requred attribute was sent in input array
		if (isset($shapeParameters['borderSize']) && $shapeParameters['borderSize'] != '')
		{
			$this->borderSize = $shapeParameters['borderSize'];
		}
		else
		{
			$this->errorMessage = 'Parameter borderSize is missing';
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
	
	// mockup function that renders square based on set attributes
	public function render()
	{
		/* .... rendering .... */
		return $roundRendered;
	}
}

?>