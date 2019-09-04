<?php

require_once __DIR__.'/../vendor/autoload.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

$front = new FrontController();
$front->run();

