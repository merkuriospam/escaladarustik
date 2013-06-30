<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Comunicaciones extends CI_Controller
{
	function __construct() {
		parent::__construct();
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$this->load->model('entrada');
		$this->load->model('segmento');
		$this->load->model('comunicacion');
		$this->load->model('segmentos_usuarios');
		$this->load->model('imagenes');
		$this->load->library('upload');
		$this->load->helper('file');
		$this->load->config('imagenes');
		//$this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		if (($this->ion_auth->logged_in()) and ($this->ion_auth->is_admin())) {
		$data['main_view'] 	= 'admin/comunicaciones';
		$data['arrCategorias'] = $this->entrada->arrCategorias();	
		$data['styles'] = array(array('stylesheet' => '996/admin'));			
		//$data['scripts'] = array();	
		$this->load->view('layout_v2', $data);			
		} else {
			redirect('/auth/login/');
		}
	}
	public function segmentos() 
	{
		if (($this->ion_auth->logged_in()) and ($this->ion_auth->is_admin())) {
		$data['main_view'] 	= 'admin/segmentos';
		$data['arrCategorias'] = $this->entrada->arrCategorias();			
		$data['segmentos'] = $this->segmento->fetch();
		//$data['arrUsers'] = $this->segmento->traer_usuarios_site();
		$data['styles'] = array(array('stylesheet' => '996/admin'));			
		//$data['scripts'] = array();	
		$this->load->view('layout_v2', $data);			
		} else {
			redirect('/auth/login/');
		}		
	}
	public function crear_segmento() {
		$this->editar_segmento();
	}
	public function editar_segmento($segmento_id = 0) {
		if (($this->ion_auth->logged_in()) and ($this->ion_auth->is_admin())) {
		$data['segmento_id'] = $segmento_id;
		$data['oSegmento'] = ($segmento_id > 0)?$this->segmento->fetchById($segmento_id):NULL;
		$data['oSegmentos_usuarios'] = $this->segmentos_usuarios->traer_con_user($segmento_id);
		$data['main_view'] 	= 'admin/segmentos_editar';
		$data['arrCategorias'] = $this->entrada->arrCategorias();			
		$data['arrUsers'] = $this->segmento->traer_usuarios_site();
		$data['styles'] = array(array('stylesheet' => '996/admin'));			
		//$data['scripts'] = array();	
		$this->load->view('layout_v2', $data);			
		} else {
			redirect('/auth/login/');
		}			
	}
	public function usuarioAsegmento(){
		if (($this->ion_auth->logged_in()) and ($this->ion_auth->is_admin())) {
		$segmento_id = $this->input->get_post('hddn_segmento_id', TRUE);		
		$arr_usuarios = $this->input->get_post('slct_user_source', TRUE);	
		
		foreach ($arr_usuarios as $key => $usuario_id) {
			$oUserSegmento = $this->segmentos_usuarios->fetchOne(array('usuario_id'=>$usuario_id,'segmento_id'=>$segmento_id));
			if(empty($oUserSegmento)){
				$oUserSegmento = $this->segmentos_usuarios->create();
			}
			$oUserSegmento->segmento_id = $segmento_id;
			$oUserSegmento->usuario_id = $usuario_id;
			$oUserSegmento = $this->segmentos_usuarios->save($oUserSegmento);			
		}
		redirect('admin/comunicaciones/editar_segmento/'.$segmento_id);			
		} else {
			redirect('/auth/login/');
		}
	}
	public function usuarioDsegmento(){
		if (($this->ion_auth->logged_in()) and ($this->ion_auth->is_admin())) {
		$segmento_id = $this->input->get_post('hddn_segmento_id', TRUE);		
		$arr_usuarios = $this->input->get_post('slct_user_segmento', TRUE);	
		
		foreach ($arr_usuarios as $key => $usuario_id) {
			$oUserSegmento = $this->segmentos_usuarios->fetchOne(array('usuario_id'=>$usuario_id,'segmento_id'=>$segmento_id));
			if(!empty($oUserSegmento)){
				$this->segmentos_usuarios->destroy($oUserSegmento);
			}
		}
		redirect('admin/comunicaciones/editar_segmento/'.$segmento_id);
		} else {
			redirect('/auth/login/');
		}		
	}
	public function eliminar_segmento($segmento_id = 0) {
		if (($this->ion_auth->logged_in()) and ($this->ion_auth->is_admin())) {
		if ($segmento_id == 0) redirect('admin/comunicaciones/segmentos');
			$oSegmento = $this->segmento->fetchById($segmento_id);
			if(!empty($oSegmento)) $this->segmento->destroy($oSegmento);
			redirect('admin/comunicaciones/segmentos');
		} else {
			redirect('/auth/login/');
		}
	}
	public function grabar_nombre_segmento() {
		if (($this->ion_auth->logged_in()) and ($this->ion_auth->is_admin())) {
		$segmento_id = $this->input->get_post('hddn_segmento_id', TRUE);
		$nombre = $this->input->get_post('npt_nombre', TRUE);
		
		$oSegmento = ($segmento_id > 0)?$this->segmento->fetchById($segmento_id):$this->segmento->create();
		$oSegmento->nombre = $nombre;
		$oSegmento = $this->segmento->save($oSegmento);
		redirect('admin/comunicaciones/editar_segmento/'.$oSegmento->id);
		} else {
			redirect('/auth/login/');
		}
	}
	public function listar() 
	{
		//$this->output->enable_profiler(TRUE);
		if (($this->ion_auth->logged_in()) and ($this->ion_auth->is_admin())) {
			$this->db->order_by("id", "desc"); 
			$data['oComunicaciones'] = $this->comunicacion->fetch();	
			$data['main_view'] 	= 'admin/comunicaciones_listar';
			$data['arrCategorias'] = $this->entrada->arrCategorias();	
			$data['arrEstCom'] = $this->comunicacion->arrEstCom();
			$data['styles'] = array(array('stylesheet' => '996/admin'));			
			//$data['scripts'] = array();	
			$this->load->view('layout_v2', $data);	
		} else {
			redirect('/auth/login/');
		}		
	}
	public function crear() 
	{
		$this->editar(NULL);
	}	
	public function editar($id = NULL) 
	{
		if (($this->ion_auth->logged_in()) and ($this->ion_auth->is_admin())) {
			if($id == NULL) {
				$oComunicacion 					= $this->comunicacion->create();
				$oComunicacion->entrada_id 		= 0;
				$oComunicacion->segmento_id 	= 0;
				$oComunicacion->usuario_id 		= 0;
				$oComunicacion->asunto 			= 'Te llego una nota de RUSTIK';
				$oComunicacion->html_body 		= '';
				$oComunicacion->to 				= '';
				$oComunicacion->fecha_salida	= date('Y-m-d H:i', time());
				$oComunicacion->estado			= Comunicacion::PENDIENTE;
				$id								= 0;
			} else {
				if($id == 0) {
					$oComunicacion = $this->comunicacion->create();					
				} else {
					$oComunicacion = $this->comunicacion->fetchById($id);					
				}
				$oComunicacion->fecha_salida = substr($oComunicacion->fecha_salida, 0,-3);
				if($this->input->get_post('hddn_submit') == 'grabar') {
					$oComunicacion->html_body = $this->input->get_post('mi-textarea');
					$oComunicacion->entrada_id = $this->input->get_post('slct_entrada_id', TRUE);
					$oComunicacion->segmento_id = $this->input->get_post('slct_segmento_id', TRUE);
					$oComunicacion->usuario_id = $this->input->get_post('slct_user_destino', TRUE);
					$oComunicacion->to = $this->input->get_post('destinatarios', TRUE);
					$oComunicacion->fecha_salida = $this->input->get_post('fecha_envio', TRUE);
					$oComunicacion->asunto = $this->input->get_post('npt_asunto', TRUE);
					$oComunicacion->estado = $this->input->get_post('estado', TRUE);
					$oComunicacion = $this->comunicacion->save($oComunicacion);
					if($id == 0) redirect('admin/comunicaciones/editar/'.$oComunicacion->id);
				}
			}
			$data['id'] = $id;
			$data['oComunicacion'] = $oComunicacion;			
			$data['arrEstCom'] = $this->comunicacion->arrEstCom();
			$data['oSegmentos'] = $this->segmento->fetch();
			$data['oEntradas'] = $this->entrada->fetch(array('categoria_id'=>Entrada::CONTENIDO_COMUNICACION,'ordenar'=>array('entradas.id','DESC')));		
			$data['oSegmentos'] = $this->segmento->fetch();
			$data['arrUsers'] = $this->segmento->traer_usuarios_site();
			
			// ckEditor es integrado al contralador cargando la libreria de esta manera para CodeIgniter 1.7.3, para anterioes versiones versiones cambia un poco
			$this->load->library('ckeditor_php5',array('instanceName' => 'CKEDITOR1','basePath' => base_url()."ckeditor/", 'outPut' => true));  				
			// declaracion de arreglo
			$config = array();			
			// dentro del arreglo asociativo, anidamos otro arreglo donde indicamos los elementos que la toolbar debe contener. En caso de omitir carga por defecto la toolbar completa
			$config['toolbar'] = array(
				array( 'Source', '-', 'Bold', 'Italic', 'Underline', 'Strike' , '-', 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'),
				array( 'Image', 'Table', 'Link', 'Unlink', 'Anchor'),
				array( 'PasteText','-','Find','Replace'),
				array( 'RemoveFormat', 'Styles', 'Format', 'Font', 'FontSize' ,'BGColor','TextColor')
			);
			// indicamos la ruta para ckFinder
			$config['filebrowserBrowseUrl'] = base_url()."ckeditor/ckfinder/ckfinder.html";
			// indicamos la ruta para el boton de la toolbar para subir imagenes
			$config['filebrowserImageBrowseUrl'] = base_url()."ckeditor/ckfinder/ckfinder.html?type=Images";
			// indicamos la ruta para subir archivos desde la pesta�a de la toolbar (Quick Upload)
			$config['filebrowserUploadUrl'] = base_url()."ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files";
			// indicamos la ruta para subir imagenesdesde la pesta�a de la toolbar (Quick Upload)
			$config['filebrowserImageUploadUrl'] = base_url()."ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images";
			// cargamos al arreglo que sera enviado a la vista con el textarea ya convertido a editor de texto :D
			$data['fck1'] = $this->ckeditor_php5->editor("mi-textarea", $oComunicacion->html_body,$config);
			$data['main_view'] 	= 'admin/comunicaciones_crear';
			$data['arrCategorias'] = $this->entrada->arrCategorias();	
			$data['styles'] = array(array('stylesheet' => '996/admin'),array('stylesheet' => '996/jquery.simple-dtpicker'));			
			$data['scripts'] = array(array('javascript' => '996/com'),array('javascript' => 'vendor/jquery.simple-dtpicker'));	
			$this->load->view('layout_v2', $data);	
		} else {
			redirect('/auth/login/');
		}		
	}		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */