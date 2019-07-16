<?php

ini_set("display_errors", true);

$ruta = $_SERVER["REQUEST_URI"];


switch ($ruta){
	case "/es/home":
		include "view/home.html";
		break;
	
	case "/es/login":
		include "view/login.html";
		break;

	case "/es/panties":
		include "view/panties.html";
		break;

	case "/es/legal":
		include "view/legal.html";
		break;

	case "/es/swimsuit":
		include "view/swimsuit.html";
		break;

	case "/es/bras":
		include "view/bras.html";
		break;

	case "/es/contacto":
		include "view/contacto.html";
		break;

	default:
		include "view/error.html";
		break;



}

?>