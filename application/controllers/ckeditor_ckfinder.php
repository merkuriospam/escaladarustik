<?php

class Ckeditor_ckfinder extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('tank_auth');
	}
		
	public function index() {
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {		
			// ckEditor es integrado al contralador cargando la libreria de esta manera para CodeIgniter 1.7.3, para anterioes versiones versiones cambia un poco
			$this->load->library('ckeditor_php5',array('instanceName' => 'CKEDITOR1','basePath' => base_url()."ckeditor/", 'outPut' => true));  				
			
			// declaracion de arreglo
			$config = array();
			
			// dentro del arreglo asociativo, anidamos otro arreglo donde indicamos los elementos que la toolbar debe contener. En caso de omitir carga por defecto la toolbar completa
			$config['toolbar'] = array(
				array( 'Source', '-', 'Bold', 'Italic', 'Underline', 'Strike' ),
				array( 'Image', 'Link', 'Unlink', 'Anchor' )
			);
			
			// indicamos la ruta para ckFinder
			$config['filebrowserBrowseUrl'] = base_url()."ckeditor/ckfinder/ckfinder.html";
			
			// indicamos la ruta para el boton de la toolbar para subir imagenes
			$config['filebrowserImageBrowseUrl'] = base_url()."ckeditor/ckfinder/ckfinder.html?type=Images";
			
			// indicamos la ruta para subir archivos desde la pestaña de la toolbar (Quick Upload)
			$config['filebrowserUploadUrl'] = base_url()."ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files";
			
			// indicamos la ruta para subir imagenesdesde la pestaña de la toolbar (Quick Upload)
			$config['filebrowserImageUploadUrl'] = base_url()."ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images";
			
			// cargamos al arreglo que será enviado a la vista con el textarea ya convertido a editor de texto :D
			$data['fck1'] = $this->ckeditor_php5->editor("mi-textarea", "<p>Valor inicial.</p>",$config);
			
			// vista, aqui tienes tu pedido
			$this->load->view('ckeditor_ckfinder',$data);
		}
	}
}