<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller
{
	function __construct() {
		parent::__construct();
	}

	function index()
	{
		if (($this->ion_auth->logged_in()) and ($this->ion_auth->is_admin())) {
			redirect('/admin/entradas');
		} else {
			redirect('/auth/login/');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */