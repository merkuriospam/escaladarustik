<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dev extends CI_Controller
{
	function __construct() {
		parent::__construct();
		$this->load->model('entrada');
		$this->load->model('imagenes');
		$this->load->library('upload');
		$this->load->helper('file');
		$this->load->config('imagenes');
	}

	public function index()
	{
		if (($this->ion_auth->logged_in()) and ($this->ion_auth->is_admin())) {
		$data['main_view'] 	= 'admin/dev';
		$data['arrCategorias'] = $this->entrada->arrCategorias();	
		$data['styles'] = array(array('stylesheet' => '996/admin'));			
		//$data['scripts'] = array();	
		$this->load->view('layout_v2', $data);			
		} else {
			redirect('/auth/login/');
		}
	}
	public function changeLog() {
		if (($this->ion_auth->logged_in()) and ($this->ion_auth->is_admin())) {
		$data['main_view'] 	= 'admin/log';
		$data['arrCategorias'] = $this->entrada->arrCategorias();	
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