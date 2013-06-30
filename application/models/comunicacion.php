<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Comunicacion extends MY_Model 
{
	const PENDIENTE 		= 0;
	const PROCESADO 		= 1;
	const ENVIADO			= 2;
	const CANCELADO			= 3;
			
	public function __construct() {
		parent::__construct();
	}
	
	protected function getTableName() {
		return "comunicaciones";
	}

	public function arrEstCom() {
		$arrCat = array(
			Comunicacion::PENDIENTE 	=> "PENDIENTE",
			Comunicacion::PROCESADO 	=> "PROCESADO",
			Comunicacion::ENVIADO 		=> "ENVIADO",
			Comunicacion::CANCELADO		=> "CANCELADO"
		);
		return $arrCat;
	}
	
}