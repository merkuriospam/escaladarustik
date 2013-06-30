<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Model 
{			
	public function __construct() {
		parent::__construct();
	}
	
	protected function getTableName() {
		return "users";
	}
}