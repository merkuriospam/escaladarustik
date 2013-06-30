<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Comunicaciones_buffer extends MY_Model 
{
	const PENDIENTE 		= 0;
	const ENVIADO			= 1;
	const CANCELADO			= 2;
			
	public function __construct() {
		parent::__construct();
	}
	
	protected function getTableName() {
		return "comunicaciones_buffer";
	}

	public function arrEstBuffer() {
		$arrCat = array(
			Comunicaciones_buffer::PENDIENTE 	=> "PENDIENTE",
			Comunicaciones_buffer::ENVIADO 		=> "ENVIADO",
			Comunicaciones_buffer::CANCELADO	=> "CANCELADO"
		);
		return $arrCat;
	}
}