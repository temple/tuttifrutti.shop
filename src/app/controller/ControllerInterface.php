<?php

namespace controller;

//DODE:
//es: poner el namespace correcto
//en: set the right namespace

interface ControllerInterface
{
	
	/**
	 * Executes an action if it exists
	 * otherwise shows an error page
	 * @param string @action the action name
	 * @param array @params parameters to provide in the call
	 * @return mixed|NULL the action return once called
	 * 
	 * @uses preg_match, method_exist, call_user_func_array
	 * @see https://www.php.net/manual/es/pcre.pattern.php
	 * @see https://www.php.net/manual/es/function.preg-match.php
	 * @see https://www.php.net/manual/es/function.method-exists.php
	 * @see https://www.php.net/manual/es/function.call-user-func-array.php
	 */
	public function callAction($request, string $action, array $params = []);

}