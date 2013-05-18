<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Entrada extends MY_Model 
{
	const CONTENIDO_GENERAL 	= 1;
	const CONTENIDO_DESTACADO 	= 2;
	const CONTENIDO_SLIDESHOW 	= 3;
	const CONTENIDO_MENU	 	= 4;
		
	public function __construct() {
		parent::__construct();
	}
	
	protected function getTableName() {
		return "entradas";
	}

	public function arrCategorias() {
		$arrCat = array(
			Entrada::CONTENIDO_GENERAL 		=> "General",
			Entrada::CONTENIDO_DESTACADO 	=> "Destacado",
			Entrada::CONTENIDO_SLIDESHOW 	=> "Slideshow",
			Entrada::CONTENIDO_MENU 		=> "Menu"
		);
		return $arrCat;
	}	
	
	public function fetchFull() {
		$miquery	= '';
		$miquery	.= ' SELECT *';
		$miquery	.= ' FROM entradas';
		$miquery	.= ' order by orden ASC, fecha_alta DESC';
		$miquery	.= ';';
		$query 		= $this->db->query($miquery);
		$results 	= $query->result();
		
		/*if ($query->num_rows() > 0) {
		   foreach ($query->result() as $row) {		
		   		$id 	= $row->id;
		   }
		}*/
		return $results;		
	}
}