<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Activo extends CI_Controller
{
	function __construct() {
		parent::__construct();
	}

	public function index()
	{
		if (($this->ion_auth->logged_in()) and ($this->ion_auth->in_group('members'))) {
		$data['main_view'] 	= 'miembros/activo';
		$data['styles'] = array(array('stylesheet' => '996/admin'));			
		//$data['scripts'] = array();	
		$this->load->view('layout_v2', $data);			
		} else {
			redirect('/auth/login/');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */