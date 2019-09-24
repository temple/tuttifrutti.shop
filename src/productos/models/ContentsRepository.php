<?php

namespace Contenidos\model;

use model\Repository;

class ContentsRepository
	extends Repository
{
	public function findAllModulos(){
		return $this->findAll('modulos');
	}

	public function findAllUnidades(){
		return $this->findAll('unidades');		
	}

	public function findAllCertificados(){
		return $this->findAll('certificados');		
	}


}