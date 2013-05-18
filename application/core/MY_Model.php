<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$CI =& get_instance();
$CI->load->helper('inflector');

class MY_Model extends CI_Model {
    function MY_Model() {
        parent::__construct();
		$this->load->database();  
    } 
	
	public function fetch($parameters = array()) {
		$tablename = $this->getTableName();
		$this->db->select("`$tablename`.*", FALSE);
		
		if(isset($parameters['limit']) or array_key_exists('limit',$parameters)){
			 $limit = $parameters['limit'];
			unset($parameters['limit']);
		}
		if(isset($parameters['offset']) or array_key_exists('offset',$parameters)){
			$offset = $parameters['offset'];
			unset($parameters['offset']);		
		}
		if(isset($parameters['ordenar']) or array_key_exists('ordenar',$parameters)){
			$ordenar = $parameters['ordenar'];
			unset($parameters['ordenar']);		
		}		
		if (FALSE == empty($limit)) {
			$this->db->limit($limit, $offset);
		}
		if (FALSE == empty($ordenar)) {
			$this->db->order_by($ordenar[0],$ordenar[1]);
		}		
		$this->parseFilters($parameters);
		
		$query = $this->db->get($tablename);
		if ( is_object($query) and $query->num_rows() > 0) {
			return $query->result();
		} else {
			return array();
		}
	}
	
	public function fetchOne($parameters = array()) {
		$parameters['limit'] = 1;
		$parameters['offset'] = 0;
		$list = $this->fetch($parameters);
		if (FALSE == empty($list)) {
			return reset($list);
		} else {
			return null;
		}
	}
	
	public function fetchById($id) {
		$parameters = array($this->getTableName() . '.id' => $id);
		return $this->fetchOne($parameters);
	}
	
	public function create() {
		$obj = new StdClass();
		$obj->id = null;
		return $obj;
	}
	
	public function save($obj) {
		if (FALSE == empty($obj->id)) {
			$this->db->where(array('id' => $obj->id));
			$this->db->update($this->getTableName(), $obj);
		} else {
			$this->db->insert($this->getTableName(), $obj);
			$obj->id = $this->db->insert_id();
		}
		return $obj;
	}
	
	protected function getTableName() {
		return plural(strtolower(get_class($this)));
	}
	
	public function parseFilters($parameters) {
		foreach ($parameters as $k => $v) {
			switch($k) {
				case 'limit': {
					$this->db->limit($v);
				}
				break;
				default: {
					if (TRUE == is_array($v)) {
						$this->db->where_in($k,$v);
					} else {
						$this->db->where(array($k => $v));
					}
				}
				break;
			}
		}
	}
	
	/**
	 * Parsea los filtros y borra las entradas correspondientes en la base de 
	 * datos
	 */
	public function remove($parameters = array()) {
		$this->parseFilters($parameters);
		$this->db->delete($this->getTableName());
	}
	
	/**
	 * Se encarga de la destruccion limpia de un objeto
	 * Cada modelo deberia extender este metodo incorporando las rutinas de 
	 * destruccion de objetos asociados y liberacion de otros recursos
	 */
	public function destroy($object) {
		$this->remove(array($this->getTableName() . '.id' => $object->id));
		$object->id = NULL;
		return $object;
	}
	
	public function count($parameters = array()) {
		$limit = $parameters['limit'];
		$offset = $parameters['offset'];
		
		unset($parameters['limit']);
		unset($parameters['offset']);
		$this->parseFilters($parameters);
		return $this->db->count_all_results($this->getTableName());
	}
}
?>