<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mod_menu extends MY_Model 
{
	//const color_fondo 		= 1;

	public function __construct() {
		parent::__construct();
	}
	
	protected function getTableName() {
		return "menu";
	}
	public function fetchjerarquico() {
		$miquery	= '';
		$miquery	.= ' SELECT * FROM menu order by orden ASC';
		$miquery	.= ';';
		$query 		= $this->db->query($miquery);
		//$results 	= $query->result();
		$hierarchy = Array();
		if ($query->num_rows() > 0) {
		   foreach ($query->result() as $row) {
		   	   $item['id'] = $row->id;		
			   $item['parent_id'] = $row->parent_id;
			   $item['texto'] = $row->texto;
			   $item['orden'] = $row->orden;
			   $item['destino_entrada_id'] = $row->destino_entrada_id;
				$parentID = empty($item['parent_id']) ? 0 : $item['parent_id'];
			    if(!isset($hierarchy[$parentID])) {
			        $hierarchy[$parentID] = Array();
			    }
			    $hierarchy[$parentID][$row->id] = $item;			   
		   }
		}
		return $hierarchy;
	}	
}