<?php	

/**
 *    componente de enrutamiento.
 */
class route
{
	/**
	 * crea función donde se realiza get al controller que ha de elegir
	 */
	function getController(string $url)
	{

		switch($url)
		{
			case '/home':
			case '/':
			case '/inicio':
			case '/welcome':
			$controller = 'home/controller/homecontroller.php';
			break;
			default: 
			$controller = 'error/controller/errorcontroller.php';
			break;
		}
		return $controller;
	}

	function getAction (string $url)
	{
		return 'indexAction';
	}

}