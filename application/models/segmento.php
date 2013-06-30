<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Segmento extends MY_Model 
{
	public function __construct() {
		parent::__construct();
	}	
	protected function getTableName() {
		return "segmentos";
	}
	public function traer_usuarios_site(){
		$miquery	= 'SELECT id, email, username from users order by username ASC;';
		$query 		= $this->db->query($miquery);	
		
		$arr_users = array();
		if ($query->num_rows() > 0) {
		   foreach ($query->result() as $row) {
		   	   $item['id'] = $row->id;		
			   $item['email'] = $row->email;
			   $item['username'] = $row->username;
			   $arr_users[$row->id] = $item;			   
		   }
		}
		return $arr_users;		
	}
	public function traer_segmentos_usuarios(){
		$miquery	= 'SELECT id, email, username from users order by username ASC;';
		$query 		= $this->db->query($miquery);	
		
		$arr_users = array();
		if ($query->num_rows() > 0) {
		   foreach ($query->result() as $row) {
		   	   $item['id'] = $row->id;		
			   $item['email'] = $row->email;
			   $item['username'] = $row->username;
			   $arr_users[$row->id] = $item;			   
		   }
		}
		return $arr_users;		
	}
	/*public function ingresar_a_segmento($usuario_id = NULL, $segmento_id = NULL) {
		if (($usuario_id == NULL) or ($segmento_id == NULL)) return FALSE;
		
	}*/	
}