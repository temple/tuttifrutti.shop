<?php

namespace controller;


class ErrorController
	extends AbstractController
{	
	//implements IndexControllerInterface
	
	public $request;
	public $params;

	public function UserAction	($request , $params){
		include __DIR__."/../view/signin.php";
	}

}