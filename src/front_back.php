<?php
ini_set('display_errors', true);
require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\BinaryfileResponse;
use Symfony\Component\Routing;


$request = Request::createFromGlobals();


//$ruta = $_SERVER["REQUEST_URI"];
$ruta = $request->getPathInfo();


switch($ruta){

	case '/home':
	case '/':
	case '/inicio':
	case '/welcome':
		$html_file = 'home.html';
	break;
	case '/panties':
		$html_file = 'panties.html';
	break;
	default:
		$html_file = 'error.html';
	break;
}

$response = new BinaryfileResponse(__DIR__.'/view/'.$html_file);
$response->send();