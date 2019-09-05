<?php

namespace controller;
//TODO:
// es: Determinar el namespace correcto
// en: Determine the right namespace

class ErrorController
	extends AbstractController
	//TODO: 
	// es: relacionar correctamente con AbstractController
    // en: relate in the right manner with AbstractController
	//implements IndexControllerInterface
	//TODO:
	// es: Importar IndexControllerInterface
	// en: Import IndexControllerInterface
{	
	public $request;
	public $params;

	public function IndexAction	($request , $params){
		include __DIR__."/../view/error.php";
	}
	//TODO:
	// es: Implementa la función y haz que muestre una vista de error
	// en: Implement function and make it show an error view

	//TODO:
	// es: Haz que la vista de error muestre el mensaje del error ocurrido
	// en: Make the error view show the message of the error 

}