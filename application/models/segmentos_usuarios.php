<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Segmentos_usuarios extends MY_Model 
{
	public function __construct() {
		parent::__construct();
	}	
	protected function getTableName() {
		return "segmentos_usuarios";
	}
	public function traer_con_user($segmento_id = 0) {
		if($segmento_id == 0) return FALSE;
		$miquery	= 'SELECT users.id, users.email, users.username from users INNER JOIN segmentos_usuarios ON users.id = segmentos_usuarios.usuario_id WHERE segmentos_usuarios.segmento_id = '.$segmento_id.' order by username ASC;';
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
}