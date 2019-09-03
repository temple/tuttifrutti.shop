<?php

$paths =<<<PATHS
{
	"home": {
		"controller" : "HomeController",
		"action": "index"
	},

	"home/premium": {
		"controller": "HomeController",
		"action": "premium"
	},

	"login" : {
		"controller": "LoginController",
		"action": null
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
	"routes" => $paths;
);
