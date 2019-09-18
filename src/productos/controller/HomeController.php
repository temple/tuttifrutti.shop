<?php

namespace productos\controller;
use controller\AbstractController as IdxController;
use controller\IndexControllerInterface as IdxInterface;
class HomeController
	extends IdxController
	implements IdxInterface
{
	public $request;
	public $params;

	//DONE: Crea el método adecuado para que se muestren las vistas correspondientes a las acciones: index y premium
	public function indexAction($request , $params) {
		include __DIR__."/../view/home.php";
	}
	
	
}