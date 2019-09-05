<?php

$paths =<<<PATHS
{
	"home": {
		"controller" : "HomeController",
		"action": "index"
	},

	"ofertas": {
		"controller": "OfertasController",
		"action": "ofertas"
	},

	"user" : {
		"controller": "UserController",
		"action": "User"
	},

	"logout" :{
		"controller": "LoginController",
		"action": "logout"
	},

	"404" : {
		"controller": "ErrorController"
	},

	"error": {
		"controller": "ErrorController",
		"action": "indexAction"
	}
}
PATHS;

$paths = json_decode($paths);

$GLOBALS['config']= array(
	"routes" => $paths
);
