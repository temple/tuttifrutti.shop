<?php

namespace Error\controller;
//DONE:
// es: Determinar el namespace correcto
// en: Determine the right namespace
use controller\AbstractController as IdxController;
use controller\IndexControllerInterface as IdxInterface;

class ErrorController
	extends IdxController
	//DONE: 
	// es: relacionar correctamente con AbstractController
    // en: relate in the right manner with AbstractController
	implements IdxInterface
	//DONE
	// es: Importar IndexControllerInterface
	// en: Import IndexControllerInterface
{	

	public function indexAction($request,array $params){
		include __DIR__."/../view/error.html.php";
	}
	//TODO:
	// es: Implementa la función y haz que muestre una vista de error
	// en: Implement function and make it show an error view

	//TODO (PAUSED):
	// es: Haz que la vista de error muestre el mensaje del error ocurrido
	// en: Make the error view show the message of the error 

}
