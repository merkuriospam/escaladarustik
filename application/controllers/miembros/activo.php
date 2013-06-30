<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Activo extends CI_Controller
{
	function __construct() {
		parent::__construct();
	    $this->load->library('session');  //Load the Session 
		$this->config->load('facebook'); //Load the facebook.php file which is located in config directory
		$this->load->model('mod_sistema');
		$this->load->model('mod_menu');
		$this->load->library('mobiledetection');	
		$this->load->helper('menu');		
		$this->load->model('comunicaciones_buffer');	
		//$this->output->enable_profiler(TRUE);			
	}

	public function index()
	{
		if (($this->ion_auth->logged_in()) and ($this->ion_auth->in_group('members'))) {
			$oLoggedUser = $this->session->all_userdata();		
			$data['main_view'] 	= 'miembros/activo';		
			$data['oColor_fondo'] = $this->mod_sistema->fetchById(Mod_sistema::color_fondo);
			$data['oColor_contenedor'] = $this->mod_sistema->fetchById(Mod_sistema::color_contenedor);	
			$data['oColor_menu'] = $this->mod_sistema->fetchById(Mod_sistema::color_menu);	
			$data['oLogoMenu'] = $this->mod_sistema->fetchById(Mod_sistema::logo_image_main_menu);	
			$data['oMenu'] = $this->mod_menu->fetchjerarquico();
			$data['htmlMenu'] = getArbol($data['oMenu'],FALSE,$oLoggedUser);		
			$data['htmlMenuMobile'] = getArbolMobile($data['oMenu'],FALSE,$oLoggedUser);
			$data['isMobile'] = $this->mobiledetection->isMobile();
			$data['oLoggedUser'] = $oLoggedUser;
			$data['styles'] = array(array('stylesheet' => '996/miembros'));
			$data['scripts'] = array(
				//array('javascript' => 'vendor/jquery.jlnav'),
				//array('javascript' => 'vendor/jquery.detachit'),
				//array('javascript' => 'vendor/jquery.lazyload.min'),
				//array('javascript' => '996/home')
			);	
			$this->load->view('layout_v2', $data);
		} else {
			redirect('/auth/login/');
		}		
	}
	public function comunicaciones () {
		if (($this->ion_auth->logged_in()) and ($this->ion_auth->in_group('members'))) {
			$oLoggedUser = $this->session->all_userdata();	
			//var_dump($oLoggedUser);
			$data['main_view'] 	= 'miembros/comunicaciones';		
			$data['oColor_fondo'] = $this->mod_sistema->fetchById(Mod_sistema::color_fondo);
			$data['oColor_contenedor'] = $this->mod_sistema->fetchById(Mod_sistema::color_contenedor);	
			$data['oColor_menu'] = $this->mod_sistema->fetchById(Mod_sistema::color_menu);	
			$data['oLogoMenu'] = $this->mod_sistema->fetchById(Mod_sistema::logo_image_main_menu);	
			$data['oMenu'] = $this->mod_menu->fetchjerarquico();
			$data['htmlMenu'] = getArbol($data['oMenu'],FALSE,$oLoggedUser);		
			$data['htmlMenuMobile'] = getArbolMobile($data['oMenu'],FALSE,$oLoggedUser);
			$data['oLoggedUser'] = $oLoggedUser;
			$data['isMobile'] 			= $this->mobiledetection->isMobile();
			$data['oComunicaciones'] = $this->comunicaciones_buffer->fetch(array('usuario_id'=>$oLoggedUser['user_id'],'ordenar'=>array('fecha_salida','DESC')));
			$data['styles'] = array(array('stylesheet' => '996/miembros'));
			$data['scripts'] = array(
				//array('javascript' => 'vendor/jquery.jlnav'),
				//array('javascript' => 'vendor/jquery.detachit'),
				//array('javascript' => 'vendor/jquery.lazyload.min'),
				//array('javascript' => '996/home')
			);	
			$this->load->view('layout_v2', $data);
		} else {
			redirect('/auth/login/');
		}		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */