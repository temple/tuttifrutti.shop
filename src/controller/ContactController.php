<?php

namespace controller;

class ContactController
	extends AbstractController
{
	public $request;
	public $params;

	//DONE: Crea el método adecuado para que se muestren las vistas correspondientes a las acciones: index y premium
	public function contactAction($request , $params) {
		include __DIR__."/../view/contact.php";
	}
	
	
}