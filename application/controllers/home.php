<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('entrada');
		$this->load->model('mod_sistema');
		$this->load->model('mod_menu');
		$this->load->library('mobiledetection');	
		$this->load->helper('menu');	
		//$this->output->enable_profiler(true);
	}
		
	public function index()
	{
		$oLoggedUser = $this->session->all_userdata();
		$data['oColor_fondo'] = $this->mod_sistema->fetchById(Mod_sistema::color_fondo);
		$data['oColor_contenedor'] = $this->mod_sistema->fetchById(Mod_sistema::color_contenedor);	
		$data['oColor_menu'] = $this->mod_sistema->fetchById(Mod_sistema::color_menu);	
		$data['oLogoMenu'] = $this->mod_sistema->fetchById(Mod_sistema::logo_image_main_menu);	
		$data['oMenu'] = $this->mod_menu->fetchjerarquico();
		$data['htmlMenu'] = getArbol($data['oMenu'],FALSE,$oLoggedUser);		
		$data['htmlMenuMobile'] = getArbolMobile($data['oMenu'],FALSE,$oLoggedUser);
		$data['isMobile'] 			= $this->mobiledetection->isMobile();
		$data['oGeneralContent']	= $this->entrada->fetch(array('publicado'=>1,'categoria_id'=>Entrada::CONTENIDO_GENERAL,'ordenar'=>array('entradas.orden','ASC')));				
		$data['oSlideShow']			= $this->entrada->fetch(array('publicado'=>1,'categoria_id'=>Entrada::CONTENIDO_SLIDESHOW,'ordenar'=>array('entradas.orden','ASC')));		
		$tempFeaturedContent 		= $this->entrada->fetch(array('publicado'=>1,'categoria_id'=>Entrada::CONTENIDO_DESTACADO,'ordenar'=>array('entradas.orden','ASC')));		
		$oFeaturedContent 			= array(); foreach ($tempFeaturedContent as $content) { $oFeaturedContent[$content->orden] = $content; }
		$data['oFeaturedContent'] 	= $oFeaturedContent;
		$data['oLoggedUser'] = $oLoggedUser;
		$data['styles'] = array(array('stylesheet' => '996/home'));
		$data['scripts'] = array(
			//array('javascript' => 'vendor/jquery.jlnav'),
			//array('javascript' => 'vendor/jquery.detachit'),
			array('javascript' => 'vendor/jquery.lazyload.min'),
			array('javascript' => '996/home')
		);	
		$data['main_view'] 	= 'home';				
		$this->load->view('layout_v2', $data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */