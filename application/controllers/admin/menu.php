<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller
{
	function __construct() {
		parent::__construct();
		$this->load->model('entrada');
		$this->load->model('mod_menu');
		$this->load->model('mod_sistema');
		$this->load->config('imagenes');
		$this->load->helper('menu');
	}

	public function index()
	{
		if (($this->ion_auth->logged_in()) and ($this->ion_auth->is_admin())) {		
			$data['oColor_fondo'] = $this->mod_sistema->fetchById(Mod_sistema::color_fondo);
			$data['oColor_contenedor'] = $this->mod_sistema->fetchById(Mod_sistema::color_contenedor);	
			$data['oColor_menu'] = $this->mod_sistema->fetchById(Mod_sistema::color_menu);
			$data['oLogoMenu'] = $this->mod_sistema->fetchById(Mod_sistema::logo_image_main_menu);
			$data['oMenu'] = $this->mod_menu->fetchjerarquico();
			$data['htmlMenu'] = getArbol($data['oMenu']);
			$data['oEntradas'] = $this->entrada->fetch(array('categoria_id'=>Entrada::CONTENIDO_MENU));
			$data['main_view'] 	= 'admin/menu';
			$data['arrCategorias'] = $this->entrada->arrCategorias();	
			$data['styles'] = array(
				array('stylesheet' => '996/admin')
			);
			$data['scripts'] = array(
				/*array('javascript' => 'vendor/farbtastic'),
				array('javascript' => '996/colorpicker')*/
			);				
			$this->load->view('layout_v2', $data);			
		} else {
			redirect('/auth/login/');
		}
	}
	public function grabar_navegacion() {
		if (($this->ion_auth->logged_in()) and ($this->ion_auth->is_admin())) {
			$oMenu = $this->mod_menu->fetch(array('ordenar'=>array('id','ASC')));
			foreach ($oMenu as $item) {
				$item->texto = $this->input->get_post('texto_'.$item->id, TRUE);
				$item->destino_entrada_id = $this->input->get_post('menu_'.$item->id, TRUE);
				$item->orden = $this->input->get_post('orden_'.$item->id, TRUE);
				$item = $this->mod_menu->save($item);
			}
			redirect('/admin/menu/');
		} else {
			redirect('/auth/login/');
		}		
	}
	public function crear_nodo($parent_id = null) {
		if (($this->ion_auth->logged_in()) and ($this->ion_auth->is_admin())) {
			if(($parent_id==null) or (!is_numeric($parent_id))) { redirect('/admin/menu/'); } else {
				$nodo = $this->mod_menu->create();
				$nodo->texto = 'Texto Boton';
				$nodo->parent_id = $parent_id;
				$nodo = $this->mod_menu->save($nodo);
			}
			redirect('/admin/menu/');
		} else {
			redirect('/auth/login/');
		}		
	}
	public function eliminar_nodo($id = null) {
		if (($this->ion_auth->logged_in()) and ($this->ion_auth->is_admin())) {
			if(($id==null) or (!is_numeric($id))) { redirect('/admin/menu/'); } else {
				$nodosHijos = $this->mod_menu->fetch(array('parent_id'=>$id));
				foreach ($nodosHijos as $nodoHijo) {
					$this->mod_menu->destroy($nodoHijo);
				}
				$nodoPadre = $this->mod_menu->fetchById($id);
				$this->mod_menu->destroy($nodoPadre);
			}
			redirect('/admin/menu/');
		} else {
			redirect('/auth/login/');
		}			
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */