<?php
include('view/es/home.html');
ini_set('display_errors', true);
require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\BinaryfileResponse;
use Symfony\Component\Routing;


$request = Request::createFromGlobals();


//$ruta = $_SERVER["REQUEST_URI"];
$ruta = $request->getPathInfo();
//
if($ruta == '/home'){
	//include 'view/home.html';
	$response = new BinaryfileResponse(__DIR__.'/view/es/home.html');

}else{
	//include 'view/error.html';
	$response = new BinaryfileResponse(__DIR__.'/view/es/error.html');
}


if($ruta == '/panties'){
	//include 'view/home.html';
	$response = new BinaryfileResponse(__DIR__.'/view/es/panties.html');

}else{
	//include 'view/error.html';
	$response = new BinaryfileResponse(__DIR__.'/view/es/error.html');
}


$response->send();