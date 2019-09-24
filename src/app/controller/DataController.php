<?php

namespace controller;

use model\Repository;

abstract class DataController
	extends AbstractController
{

	public function __construct(){
		$this->repository = new Repository($GLOBALS['db']);
	}

}