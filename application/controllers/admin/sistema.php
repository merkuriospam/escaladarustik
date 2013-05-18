<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sistema extends CI_Controller
{
	function __construct() {
		parent::__construct();
		$this->load->model('entrada');
		$this->load->model('mod_sistema');
		$this->load->config('imagenes');
		$this->load->library('upload');
	}

	public function index()
	{
		if (($this->ion_auth->logged_in()) and ($this->ion_auth->is_admin())) {
			
			$data['oColor_fondo'] = $this->mod_sistema->fetchById(Mod_sistema::color_fondo);
			$data['oColor_contenedor'] = $this->mod_sistema->fetchById(Mod_sistema::color_contenedor);	
			$data['oColor_menu'] = $this->mod_sistema->fetchById(Mod_sistema::color_menu);
			$data['oLogoMenu'] = $this->mod_sistema->fetchById(Mod_sistema::logo_image_main_menu);
			
			$data['main_view'] 	= 'admin/sistema';
			$data['arrCategorias'] = $this->entrada->arrCategorias();	
			$data['styles'] = array(
				array('stylesheet' => '996/admin'),
				array('stylesheet' => '996/farbtastic')
			);
			$data['scripts'] = array(
				array('javascript' => 'vendor/farbtastic'),
				array('javascript' => '996/colorpicker')
			);				
			//$data['scripts'] = array();	
			$this->load->view('layout_v2', $data);			
		} else {
			redirect('/auth/login/');
		}
	}
	public function grabar_colores() {
		if (($this->ion_auth->logged_in()) and ($this->ion_auth->is_admin())) {
			$oColor_fondo = $this->mod_sistema->fetchById(Mod_sistema::color_fondo);
			$oColor_contenedor = $this->mod_sistema->fetchById(Mod_sistema::color_contenedor);	
			$oColor_menu = $this->mod_sistema->fetchById(Mod_sistema::color_menu);
			
			$oColor_fondo->valor =$this->input->get_post('colorFondo', TRUE);
			$oColor_contenedor->valor = $this->input->get_post('colorContenedor', TRUE);	
			$oColor_menu->valor = $this->input->get_post('colorMenu', TRUE);
			
			$oColor_fondo = $this->mod_sistema->save($oColor_fondo);
			$oColor_contenedor = $this->mod_sistema->save($oColor_contenedor);	
			$oColor_menu = $this->mod_sistema->save($oColor_menu);
			
			redirect('/admin/sistema/');
		} else {
			redirect('/auth/login/');
		}		
	}
	public function grabar_logo() {
		if (($this->ion_auth->logged_in()) and ($this->ion_auth->is_admin())) {
			$oLogoMenu = $this->mod_sistema->fetchById(Mod_sistema::logo_image_main_menu);
			if (!empty($_FILES['logo_file']['name'])) {
				$config['upload_path'] = $this->config->item('user_upload_path');
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '1024';
				$config['max_width']  = '1900';
				$config['encrypt_name'] = true;
				//$config['max_height']  = '768';     
	            $this->upload->initialize($config);
	            if ($this->upload->do_upload('logo_file')) {
					$data_file = array('upload_data' => $this->upload->data());
					$path_logo = $data_file['upload_data']['file_name'];		
					$oLogoMenu->valor = $path_logo;	
					$oLogoMenu = $this->mod_sistema->save($oLogoMenu);
					redirect('/admin/sistema/');			
	            } else {
	                echo $this->upload->display_errors();
	            } 
        	} else { echo 'nada'; }		
		} else {
			redirect('/auth/login/');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */