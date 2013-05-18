<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Backup extends CI_Controller
{
	function __construct() {
		parent::__construct();
		$this->load->model('entrada');
		$this->load->library('zip');
		$this->load->config('imagenes');
	}

	public function index()
	{
		if (($this->ion_auth->logged_in()) and ($this->ion_auth->is_admin())) {
		$data['main_view'] 	= 'admin/backup';
		$data['arrCategorias'] = $this->entrada->arrCategorias();	
		$data['styles'] = array(array('stylesheet' => '996/admin'));			
		//$data['scripts'] = array();	
		$this->load->view('layout_v2', $data);			
		} else {
			redirect('/auth/login/');
		}
	}
	public function db() {
		if (($this->ion_auth->logged_in()) and ($this->ion_auth->is_admin())) {
		$this->load->helper('download');
		$this->load->helper('file');
		$this->load->dbutil();
		$prefs = array(
            'format'      => 'zip',             // gzip, zip, txt
            'filename'    => 'base_datos_backup_'.date('Ymdhs').'.sql',    // File name - NEEDED ONLY WITH ZIP FILES
            'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
            'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
            'newline'     => "\n"               // Newline character used in backup file
        );
		$backup =& $this->dbutil->backup($prefs);
		write_file('./backup/'.'base_datos_backup_'.date('Ymdhs').'.zip', $backup);
		force_download('./backup/'.'base_datos_backup_'.date('Ymdhs').'.zip', $backup); 
		} else {
			redirect('/auth/login/');
		}		
	}
	public function files() {
		if (($this->ion_auth->logged_in()) and ($this->ion_auth->is_admin())) {
		$this->zip->read_dir('./assets/');		
		$this->zip->read_dir('./application/');		
		$this->zip->read_dir('./system/');	
		$this->zip->read_dir('./ckeditor/');	
		$this->zip->read_dir('./ckfinder/');	
		$this->zip->read_dir('./user_guide/');				
		$this->zip->archive('./backup/'.'aplicacion_backup_'.date('Ymdhs').'.zip');
		$this->zip->download('./backup/'.'aplicacion_backup_'.date('Ymdhs').'.zip');
		} else {
			redirect('/auth/login/');
		}		
	}		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */