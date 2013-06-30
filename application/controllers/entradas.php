<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Entradas extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('entrada');
		$this->load->library('mobiledetection');		
		$this->load->model('imagenes');
		$this->load->config('imagenes');	
		$this->load->model('mod_sistema');
		$this->load->model('mod_menu');
		$this->load->helper('menu');
		//$this->output->enable_profiler(true);
	}
		
	public function ver($entrada_id = null)
	{
		$oLoggedUser = $this->session->all_userdata();
		$data['oColor_fondo'] = $this->mod_sistema->fetchById(Mod_sistema::color_fondo);
		$data['oColor_contenedor'] = $this->mod_sistema->fetchById(Mod_sistema::color_contenedor);	
		$data['oColor_menu'] = $this->mod_sistema->fetchById(Mod_sistema::color_menu);		
		$data['oLogoMenu'] = $this->mod_sistema->fetchById(Mod_sistema::logo_image_main_menu);		
		$data['oMenu'] = $this->mod_menu->fetchjerarquico();
		$data['htmlMenu'] = getArbol($data['oMenu'],FALSE,$oLoggedUser);
		$data['htmlMenuMobile'] = getArbolMobile($data['oMenu'],FALSE,$oLoggedUser);		
		$data['isMobile'] 	= $this->mobiledetection->isMobile();
		$data['oEntrada']	= $this->entrada->fetchById($entrada_id);
		$data['site_title'] = $data['oEntrada']->titulo;
		if((($data['oEntrada']->categoria_id==Entrada::CONTENIDO_COMUNICACION) and (!isset($oLoggedUser['user_id'])))) redirect('home');
		$data['oImagenes'] 	= $this->imagenes->fetch(array('entrada_id'=>$entrada_id,'ordenar'=>array('imagenes.orden','ASC')));	
		$data['oLoggedUser'] = $oLoggedUser;	
		/*$js_adicional = '';
		if(!empty($data['oImagenes'])) {
			$js_adicional .= '<script type="text/javascript">';
			foreach ($data['oImagenes'] as $oImagen) {
				$js_adicional .= '$("#basic-modal-'.$oImagen->id.'").modal();';
			}
		}
		$js_adicional .= '</script>';
		$this->trigger->registerText('end_of_body',$js_adicional);*/

		$data['tamanio_imagen_listado']  = $this->config->item('tamanio_imagen_listado');
		$data['main_view'] 	= 'entrada';
		$data['styles'] = array(
			array('stylesheet' => '996/entrada')
			,array('stylesheet' => '996/jquery.fancybox')
			);			
		$data['scripts'] = array(
			array('javascript' => 'vendor/jquery.iosslider.min'),
			array('javascript' => 'vendor/jquery.fancybox.pack'),
			//array('javascript' => 'vendor/jquery.simplemodal.1.4.4.min'),
			array('javascript' => 'vendor/jquery.lazyload.min'),
			//array('javascript' => 'vendor/jquery.dropdownPlain'),
			array('javascript' => '996/entrada')
		);	
		$this->load->view('layout_v2', $data);
	}
	public function modal($imagen_id = null)
	{
		$data['oImagen'] 	= $this->imagenes->fetchById($imagen_id);
		$data['main_view'] 	= 'modal';
		$data['styles'] 	= array(array('stylesheet' => '996/modal'));					
		$this->load->view('limpio_v2', $data);		
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */