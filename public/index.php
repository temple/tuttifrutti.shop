<?php
// Activación del reporte de todos los errores y mensajes informativos
error_reporting(E_ALL);
// 'display_errors' es el "flag" que activa (1) o desactiva (0) la visualización en pantalla del reporte
ini_set('display_errors', 1);
require_once __DIR__.'/../src/bootstrap.php';

$reflector = new \ReflectionClass(APP);
$app = $reflector->newInstance();
if ($app instanceof ApplicationInterface)
	$app->run();
exit;
