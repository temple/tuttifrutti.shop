<?php

namespace controller;

//DONE:
//es: poner el namespace correcto
//en: set the right namespace

interface IndexControllerInterface
	extends ControllerInterface
{
	
	/**
	 * Index Action
	 * Acción que mostrará la vista en su estado por defecto
	 * @param  $request Información de la petición
	 * @param  $params Parámetros con información adicional
	 */
	public function indexAction($request,array $params);
}