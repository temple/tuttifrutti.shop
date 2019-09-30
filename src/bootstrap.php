<?php

// Se definen las constantes APP_DIR y CONFIG_DIR
// La primera contiene la ruta hacia la carpeta de aplicación
// La segunda contiene la ruta hacia la carpeta de archivos
// de configuración
if (is_dir(__DIR__.'/app/'))
	define("APP_DIR",__DIR__.'/app/');

if (is_dir(APP_DIR.'config/'))
	define("CONFIG_DIR",APP_DIR.'config/');

// Lógica de fase de Bootstrapping
// En la fase de Bootstrapping se carga la configuración
// con la que funcionará la aplicación

// Se prepara una entrada en $GLOBALS para almacenar
// la configuración general de la app
$GLOBALS['config'] = array();

// Se van procesando los archivos de configuración
// con los que se configurará la aplicación, 
// priorizando aquellos escritos en YAML sobre los escritos en JSON
if (defined("CONFIG_DIR")){
	try{
		// Open dir crea un recurso que accede a la carpeta
		// que está "apuntada" por CONFIG_DIR
		$dh = opendir(CONFIG_DIR);		
		while( (FALSE !== $dh) 
			&& (FALSE !== ($file = readdir($dh)))
		){
			// $file_name es el nombre del archivo sin extensión
			// que será utilizado para crear una entrada
			// en el array que hay en $GLOBALS['config']
			$file_name = pathinfo(CONFIG_DIR.$file,PATHINFO_FILENAME);
			// $file_ext es la extensión del archivo
			// que será utilizada para discriminar
			// entre archivos JSON y YAML y archivos 
			// que no lo sean
			$file_ext = pathinfo(CONFIG_DIR.$file,PATHINFO_EXTENSION);

			// $config_key es el nombre del archivo en el que se le han eliminado
			// los caracteres que no sean alfabéticos, tales como signos
			// de puntuación y carácteres especiales
			$config_key = preg_replace("/[^\w]/", "",$file_name);

			// Si el archivo tiene extensión YAML (yml o yaml)
			// lo procesamos y lo almacenamos en la configuración
			// concretamente en la posición marcada por $config_key 
			// (que es el nombre del archivo mejorado)
			if (in_array(strtoupper($file_ext), ['YML','YAML'])){
				$content = yaml_parse_file(CONFIG_DIR.$file);
				if (FALSE !== $content)
					$GLOBALS['config'][$config_key] = $content;
			}

			// Si hemos encontrado un archivo JSON
			if ('JSON' == strtoupper($file_ext)){
				// solo procesamos archivos JSON si la configuración 
				// está desocupada, priorizando los archivos YAML
				if (! array_key_exists($config_key, $GLOBALS['config']))
				{
					$content = file_get_contents(CONFIG_DIR.$file);
					if (FALSE !== $content)
						$GLOBALS['config'][$config_key] = json_decode($content);
				}				
			}

		}
		// Eliminamos el recurso que listaba el contenido de 
		// CONFIG_DIR
		closedir($dh);
	}catch(\Error $e){

	}
}

// Lógica de la carga de la aplicación (dentro de la fase de bootstrapping)
//   Carga del sistema de Autoloading
    require_once __DIR__.'/../vendor/autoload.php';

    // Definición de la clase que representará la aplicación
	if (array_key_exists('app', $GLOBALS['config'])){
		$application = ((string)($GLOBALS['config']['app']['front']['namespace'])).((string)($GLOBALS['config']['app']['front']['class']));
	}

// Se definen las constantes APP
// que contiene el nombre de la clase que representa la aplicación
// y que por tanto se puede ejecutar
define("APP",$application);
unset($application);

$host = $GLOBALS['config']['app'] ['db']['host'];
$schema = $GLOBALS['config']['app'] ['db']['dbname'];
$user = $GLOBALS['config']['app'] ['db']['user'];
$pass = $GLOBALS['config']['app'] ['db']['pass'];
$pdo = new PDO('mysql:host='.$host.';dbname='.$schema, $user, $pass);
define ("BD", $pdo);

foreach ($pdo->query('SELECT Titulo FROM Familia WHERE id>1') as $familia ){
print_r($familia);
}