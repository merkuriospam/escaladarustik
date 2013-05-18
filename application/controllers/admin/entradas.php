<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Entradas extends CI_Controller
{
	function __construct() {
		parent::__construct();
		$this->load->model('entrada');
		$this->load->model('imagenes');
		$this->load->library('upload');
		$this->load->helper('file');
		$this->load->config('imagenes');
		$this->load->model('mod_sistema');
	}

	function index()
	{
		redirect('/admin/entradas/categoria/'.Entrada::CONTENIDO_GENERAL);	
	}
	
	function categoria($categoria_id = null)
	{
		if (($this->ion_auth->logged_in()) and ($this->ion_auth->is_admin())) {
			$data['oColor_fondo'] = $this->mod_sistema->fetchById(Mod_sistema::color_fondo);
			$data['oColor_contenedor'] = $this->mod_sistema->fetchById(Mod_sistema::color_contenedor);	
			$data['oColor_menu'] = $this->mod_sistema->fetchById(Mod_sistema::color_menu);
			$data['oLogoMenu'] = $this->mod_sistema->fetchById(Mod_sistema::logo_image_main_menu);
						
			$user = $this->ion_auth->user()->row();	
			$data['historias'] = $this->entrada->fetch(array('categoria_id'=>$categoria_id,'ordenar'=>array('entradas.orden','ASC')));	
			$data['arrCategorias'] = $this->entrada->arrCategorias();	
			$data['main_view'] = 'admin/entradas';
			$data['user_id']	= $user->id;
			$data['username']	= $user->username;
			$data['categoria_id'] = $categoria_id;
			$data['styles'] = array(array('stylesheet' => '996/admin'));
			$data['scripts'] = array(
				array('javascript' => 'vendor/jquery.tablednd'),
				array('javascript' => '996/ad_list')
			);
			
			$js_adicional = '<script type="text/javascript">var CATEGORIA_ID = '.$categoria_id.';</script>';	
			$this->trigger->registerText('end_of_body',$js_adicional);
			$this->load->view('layout_v2', $data);
		} else {
			redirect('/auth/login/');
		}		
	}
	
	public function crear($categoria_id = null) {
		if (($this->ion_auth->logged_in()) and ($this->ion_auth->is_admin())) {
			$titulo = $this->input->get_post('titulo', TRUE);
			if (isset($titulo) and (!empty($titulo)))	{
				$oEntrada = $this->entrada->create();
				//$oEntrada->cuerpo = $this->input->get_post('mi-textarea', TRUE);
				$oEntrada->cuerpo = $this->input->get_post('mi-textarea');			
				$oEntrada->orden = $this->input->get_post('orden', TRUE);
				$oEntrada->categoria_id = $this->input->get_post('categoria', TRUE);
				$oEntrada->titulo = $titulo;
				$oEntrada->copete = $this->input->get_post('copete', TRUE);
				$oEntrada->publicado = $this->input->get_post('publicado', TRUE);
				$oEntrada->carrousel = $this->input->get_post('carrousel', TRUE);
				$oEntrada->comentar = $this->input->get_post('comentar', TRUE);
				$oEntrada->fecha_alta = date("Y-m-d H:i:s", time());	
				$oEntrada->mostrar_share = $this->input->get_post('mostrar_share', TRUE);
				$oEntrada->mostrar_img_portada = $this->input->get_post('mostrar_img_portada', TRUE);
						
				$portada = null;
				if (!empty($_FILES['userfile']['name'])) {
					$config['upload_path'] = $this->config->item('user_upload_path');
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= '1024';
					$config['max_width']  = '5000';
					$config['encrypt_name'] = true;
					//$config['max_height']  = '768';     
		            $this->upload->initialize($config);
		            if ($this->upload->do_upload('userfile')) {
						$data_file = array('upload_data' => $this->upload->data());						
						$width_source = $data_file['upload_data']['image_width'];
						$height_source = $data_file['upload_data']['image_height'];
						if ($width_source > $this->config->item('width_maximo')) {
							/* INI RESIZE */
							$config['image_library'] = 'gd2';
							$config['source_image'] = $this->config->item('user_upload_path').$data_file['upload_data']['file_name'];
							$config['new_image'] = $this->config->item('user_upload_path').'resize_'.$data_file['upload_data']['file_name'];	
							$config['quality'] = $this->config->item('calidad_jpg');		
							$config['maintain_ratio'] = TRUE;
							$config['width'] = $this->config->item('width_maximo');
							$this->load->library('image_lib', $config); 
							$this->image_lib->initialize($config); 
							$this->image_lib->resize();										
							$temp_img = $this->config->item('user_upload_path').$data_file['upload_data']['file_name'];
							if (is_file($temp_img)) {unlink($temp_img);}								
							/* FIN RESIZE */
							$portada = 'resize_'.$data_file['upload_data']['file_name'];
						} else {
							$portada = $data_file['upload_data']['file_name'];
						}						
		            } else {
		                echo $this->upload->display_errors();
		            } 
		        }
				if ($portada) {$oEntrada->img_portada = $portada;}
				$slideshow = null;
		        if (!empty($_FILES['userfile2']['name'])) {
					$config['upload_path'] = $this->config->item('user_upload_path');
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= '1024';
					$config['max_width']  = '5000';
					$config['encrypt_name'] = true;
					//$config['max_height']  = '768';
		            $this->upload->initialize($config);
		            if ($this->upload->do_upload('userfile2')) {
						$data_file = array('upload_data' => $this->upload->data());					
						$width_source = $data_file['upload_data']['image_width'];
						$height_source = $data_file['upload_data']['image_height'];
						if ($width_source > $this->config->item('width_maximo')) {
							/* INI RESIZE */
							$config['image_library'] = 'gd2';
							$config['source_image'] = $this->config->item('user_upload_path').$data_file['upload_data']['file_name'];
							$config['new_image'] = $this->config->item('user_upload_path').'resize_'.$data_file['upload_data']['file_name'];	
							$config['quality'] = $this->config->item('calidad_jpg');		
							$config['maintain_ratio'] = TRUE;
							$config['width'] = $this->config->item('width_maximo');
							$this->load->library('image_lib', $config); 
							$this->image_lib->initialize($config); 
							$this->image_lib->resize();										
							$temp_img = $this->config->item('user_upload_path').$data_file['upload_data']['file_name'];
							if (is_file($temp_img)) {unlink($temp_img);}								
							/* FIN RESIZE */
							$slideshow = 'resize_'.$data_file['upload_data']['file_name'];
						} else {
							$slideshow = $data_file['upload_data']['file_name'];
						}
		            } else {
		                echo $this->upload->display_errors();
		            }
		        }
				if ($slideshow) {$oEntrada->img_slideshow = $slideshow;}	
				
				$oEntrada = $this->entrada->save($oEntrada);
				redirect('/admin/entradas/editar/'.$oEntrada->id);
			} else {
				$this->editar(null);
			}				
		} else {
			redirect('/auth/login/');
		}
	}
	
	public function editar($id = null) {
		if (($this->ion_auth->logged_in()) and ($this->ion_auth->is_admin())) {
			if ($id == null) {$categoria_crear = $this->uri->segment(4);} else {$categoria_crear = null;}
			$titulo = $this->input->get_post('titulo', TRUE);
			if ((isset($id)) and (is_numeric($id))) {
				$oEntrada = $this->entrada->fetchById($id);
				if (isset($titulo) and (!empty($titulo)))	{						
					$portada = null;
					if (!empty($_FILES['userfile']['name'])) {
						$config['upload_path'] = $this->config->item('user_upload_path');
						$config['allowed_types'] = 'gif|jpg|png';
						$config['max_size']	= '1024';
						$config['max_width']  = '5000';
						$config['encrypt_name'] = true;
						//$config['max_height']  = '768';     
			            $this->upload->initialize($config);
			            if ($this->upload->do_upload('userfile')) {
							$data_file = array('upload_data' => $this->upload->data());
							$width_source = $data_file['upload_data']['image_width'];
							$height_source = $data_file['upload_data']['image_height'];
							if ($width_source > $this->config->item('width_maximo')) {
								/* INI RESIZE */
								$config['image_library'] = 'gd2';
								$config['source_image'] = $this->config->item('user_upload_path').$data_file['upload_data']['file_name'];
								$config['new_image'] = $this->config->item('user_upload_path').'resize_'.$data_file['upload_data']['file_name'];	
								$config['quality'] = $this->config->item('calidad_jpg');		
								$config['maintain_ratio'] = TRUE;
								$config['width'] = $this->config->item('width_maximo');
								$this->load->library('image_lib', $config); 
								$this->image_lib->initialize($config); 
								$this->image_lib->resize();										
								$temp_img = $this->config->item('user_upload_path').$data_file['upload_data']['file_name'];
								if (is_file($temp_img)) {unlink($temp_img);}								
								/* FIN RESIZE */
								$portada = 'resize_'.$data_file['upload_data']['file_name'];
							} else {
								$portada = $data_file['upload_data']['file_name'];
							}
			            } else {
			                echo $this->upload->display_errors();
			            } 
			        }
					if ($portada) {$oEntrada->img_portada = $portada;}
					$slideshow = null;
			        if (!empty($_FILES['userfile2']['name'])) {
						$config['upload_path'] = $this->config->item('user_upload_path');
						$config['allowed_types'] = 'gif|jpg|png';
						$config['max_size']	= '1024';
						$config['max_width']  = '5000';
						$config['encrypt_name'] = true;
						//$config['max_height']  = '768';
			            $this->upload->initialize($config);
			            if ($this->upload->do_upload('userfile2')) {
							$data_file = array('upload_data' => $this->upload->data());
							$width_source = $data_file['upload_data']['image_width'];
							$height_source = $data_file['upload_data']['image_height'];
							if ($width_source > $this->config->item('width_maximo')) {
								/* INI RESIZE */
								$config['image_library'] = 'gd2';
								$config['source_image'] = $this->config->item('user_upload_path').$data_file['upload_data']['file_name'];
								$config['new_image'] = $this->config->item('user_upload_path').'resize_'.$data_file['upload_data']['file_name'];	
								$config['quality'] = $this->config->item('calidad_jpg');		
								$config['maintain_ratio'] = TRUE;
								$config['width'] = $this->config->item('width_maximo');
								$this->load->library('image_lib', $config); 
								$this->image_lib->initialize($config); 
								$this->image_lib->resize();										
								$temp_img = $this->config->item('user_upload_path').$data_file['upload_data']['file_name'];
								if (is_file($temp_img)) {unlink($temp_img);}								
								/* FIN RESIZE */
								$slideshow = 'resize_'.$data_file['upload_data']['file_name'];
							} else {
								$slideshow = $data_file['upload_data']['file_name'];
							}							
			            } else {
			                echo $this->upload->display_errors();
			            }
			        }
					if ($slideshow) {$oEntrada->img_slideshow = $slideshow;}								
					//$oEntrada->cuerpo = $this->input->get_post('mi-textarea', TRUE);
					$oEntrada->cuerpo = $this->input->get_post('mi-textarea');				
					$oEntrada->orden = $this->input->get_post('orden', TRUE);
					$oEntrada->copete = $this->input->get_post('copete', TRUE);
					$oEntrada->categoria_id = $this->input->get_post('categoria', TRUE);
					$oEntrada->titulo = $titulo;
					$oEntrada->publicado = $this->input->get_post('publicado', TRUE);
					$oEntrada->carrousel = $this->input->get_post('carrousel', TRUE);
					$oEntrada->comentar = $this->input->get_post('comentar', TRUE);
					$oEntrada->mostrar_share = $this->input->get_post('mostrar_share', TRUE);
					$oEntrada->mostrar_img_portada = $this->input->get_post('mostrar_img_portada', TRUE);					
					$oEntrada = $this->entrada->save($oEntrada);
				}
			} else {
				$oEntrada = $this->entrada->create();	
				$oEntrada->titulo = 'Entrada Nueva';
				$oEntrada->categoria_id = 1;
				$oEntrada->portada = null;
				$oEntrada->cuerpo = '';
				$oEntrada->copete = '';
				$oEntrada->orden = '0';
				$oEntrada->img_portada = '';
				$oEntrada->img_slideshow = '';
				$oEntrada->publicado = '0';
				$oEntrada->carrousel = '0';
				$oEntrada->comentar = '0';
				$oEntrada->mostrar_share = '1';
				$oEntrada->mostrar_img_portada = '1';				
			}
			
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
			$data['fck1'] = $this->ckeditor_php5->editor("mi-textarea", $oEntrada->cuerpo,$config);

			$data['oEntrada'] = $oEntrada;
			$data['arrCategorias'] = $this->entrada->arrCategorias();
			$data['categoria_crear'] = $categoria_crear;
			// vista, aqui tienes tu pedido
			$data['main_view'] 	= 'admin/entradas/editar';	
			$data['styles'] = array(array('stylesheet' => '996/admin'));			
			$this->load->view('layout_v2', $data);						
		} else {
			redirect('/auth/login/');
		}
	}
	
	public function mupload($entrada_id = null) {
		if (($this->ion_auth->logged_in()) and ($this->ion_auth->is_admin())) {		
			$oImagenes = $this->imagenes->fetch(array('entrada_id'=>$entrada_id));
			$data['entrada_id'] = $entrada_id;
			$data['oImagenes'] = $oImagenes;
			$data['oMensaje'] = $this->session->flashdata('mensaje');
			$data['arrCategorias'] = $this->entrada->arrCategorias();
			//var_dump($this->session->flashdata('mensaje'));
			$data['main_view'] 	= 'admin/entradas/mupload';
			$data['styles'] = array(array('stylesheet' => '996/admin'));			
			$this->load->view('layout_v2', $data);			
		} else {
			redirect('/auth/login/');
		}
	}
	
	public function do_mupload($entrada_id = null) {
		if (($this->ion_auth->logged_in()) and ($this->ion_auth->is_admin())) {			
			//Configure upload.
	        $this->upload->initialize(array(
	            'upload_path'   => $this->config->item('user_upload_path'),
	            'allowed_types'	=> 'gif|jpg|png',
	            'max_size' 		=> '1024',
	        	'max_width' 	=> '5000',
	        	'encrypt_name'	=> true
	        ));	
	        //Perform upload.
	        if($this->upload->do_multi_upload("files")) {
	            //Code to run upon successful upload.
	            $oImagenes = $this->upload->get_multi_upload_data();				
				foreach ($oImagenes as $imagen) {
					$oImagen = $this->imagenes->create();
					$oImagen->entrada_id = $entrada_id;

					$width_source = $imagen['image_width'];
					$height_source = $imagen['image_height'];
					if ($width_source > $this->config->item('width_maximo')) {
						echo 'width_source > '.$this->config->item('width_maximo').'<br />';
						/* INI RESIZE ORIGINAL */
						$config['image_library'] = 'gd2';
						$config['source_image'] = $this->config->item('user_upload_path').$imagen['file_name'];
						$config['new_image'] = $this->config->item('user_upload_path').'resize_'.$imagen['file_name'];	
						$config['quality'] = $this->config->item('calidad_jpg');		
						$config['maintain_ratio'] = TRUE;
						$config['width'] = $this->config->item('width_maximo');
						$pum = round($width_source / $this->config->item('width_maximo'));
						$config['height'] = $height_source * $pum;							
						if($width_source/$height_source > 1) {
							//landscape
							$config['width'] = $this->config->item('width_maximo');
							$config['height'] = $height_source * $pum;
						} else {
							//portrait
							$config['height'] = $this->config->item('height_maximo');
							$config['width'] = $width_source * $pum;
						}				
						$this->load->library('image_lib', $config); 
						$this->image_lib->initialize($config); 
						$this->image_lib->resize();
						$this->image_lib->clear();									
						$temp_img = $this->config->item('user_upload_path').$imagen['file_name'];
						if (is_file($temp_img)) {unlink($temp_img);}								
						/* FIN RESIZE */
						$oImagen->path = 'resize_'.$imagen['file_name'];
					} else {
						$oImagen->path = $imagen['file_name'];
					}
					/* INI RESIZE TN */
					$tamanio_imagen_listado = $this->config->item('tamanio_imagen_listado');
					$config_tn['image_library'] = 'gd2';
					$config_tn['source_image'] = $this->config->item('user_upload_path').$oImagen->path;
					$config_tn['new_image'] = $imagen['file_path'].$imagen['raw_name'].$tamanio_imagen_listado['tn_marker'].$imagen['file_ext'];		
					$config_tn['quality'] = '80%';		
					$config_tn['maintain_ratio'] = TRUE;
					$config_tn['width'] = $tamanio_imagen_listado['width'];
					$config_tn['height'] = $tamanio_imagen_listado['height'];
					$this->load->library('image_lib', $config_tn); 
					$this->image_lib->initialize($config_tn); 
					$this->image_lib->resize();
					$this->image_lib->clear();			
					/* FIN RESIZE */
					
					$oImagen->path_tn = $imagen['raw_name'].$tamanio_imagen_listado['tn_marker'].$imagen['file_ext'];
					$oImagen = $this->imagenes->save($oImagen);
				}
				redirect('/admin/entradas/mupload/'.$entrada_id);
				
	        } else {
	        	$errores = $this->upload->display_errors('<p>','</p>');
	        	$this->session->set_flashdata('mensaje', array('titulo' => 'Ocurrio un error', 'contenido' => '<p>No se pudieron grabar las imagenes</p>'.$errores, 'tipo' => 'error' ));
	        	redirect('/admin/entradas/mupload/'.$entrada_id);
			} 
		} else {
			redirect('/auth/login/');
		}
	}	
	public function editar_imagenes($entrada_id = null) {
		if (($this->ion_auth->logged_in()) and ($this->ion_auth->is_admin())) {
			$oImagenes = $this->imagenes->fetch(array('entrada_id'=>$entrada_id));
			foreach ($oImagenes as $oImagen) {
				$oImagen->titulo = $this->input->get_post('titulo'.$oImagen->id, TRUE);
				$oImagen->copete = $this->input->get_post('copete'.$oImagen->id, TRUE);
				$oImagen->orden = $this->input->get_post('orden'.$oImagen->id, TRUE);
				$oImagen = $this->imagenes->save($oImagen);			
			}	
			redirect('/admin/entradas/mupload/'.$oImagen->entrada_id);
		} else {
			redirect('/auth/login/');
		}
	}
	public function eliminar_imagen($imagen_id = null) {
		if (($this->ion_auth->logged_in()) and ($this->ion_auth->is_admin())) {	
			$oImagen = $this->imagenes->fetchById($imagen_id);	
			if(!empty($oImagen)) {
				$image_path 			= $this->config->item('user_upload_path').$oImagen->path;
				$tn_image_path 			= $this->config->item('user_upload_path').$oImagen->path_tn;
				if (is_file($image_path)) {unlink($image_path);}
				if (is_file($tn_image_path)) {unlink($tn_image_path);}					
				$entrada_id = $oImagen->entrada_id;
				$this->imagenes->destroy($oImagen);
				redirect('/admin/entradas/mupload/'.$entrada_id);			
			} else {
				redirect('/admin/entradas/');
			}
		} else {
			redirect('/auth/login/');
		}
	}
	public function eliminar($entrada_id = null) {
		if (($this->ion_auth->logged_in()) and ($this->ion_auth->is_admin())) {	
			$oEntrada = $this->entrada->fetchById($entrada_id);
			if(!empty($oEntrada)) {
				$img_portada 		= $this->config->item('user_upload_path').$oEntrada->img_portada;
				$img_portada_tn 	= $this->config->item('user_upload_path').$oEntrada->img_portada_tn;
				$img_slideshow 		= $this->config->item('user_upload_path').$oEntrada->img_slideshow;
				$img_slideshow_tn 	= $this->config->item('user_upload_path').$oEntrada->img_slideshow_tn;
				if (is_file($img_portada)) {unlink($img_portada);}
				if (is_file($img_portada_tn)) {unlink($img_portada_tn);}			
				if (is_file($img_slideshow)) {unlink($img_slideshow);}
				if (is_file($img_slideshow_tn)) {unlink($img_slideshow_tn);}					
				/* Busco las imagenes adicionales */
				$oImagenes = $this->imagenes->fetch(array('entrada_id'=>$entrada_id));
				foreach ($oImagenes as $oImagen) {
					$image_path 	= $this->config->item('user_upload_path').$oImagen->path;
					$tn_image_path 	= $this->config->item('user_upload_path').$oImagen->path_tn;
					if (is_file($image_path)) {unlink($image_path);}
					if (is_file($tn_image_path)) {unlink($tn_image_path);}				
					$this->imagenes->destroy($oImagen);
				}
				$this->entrada->destroy($oEntrada);
			}
			redirect('/admin/entradas/');
		} else {
			redirect('/auth/login/');
		}
	}
	public function cropearImagen($tipo_imagen = null, $id = null) {
		if (($tipo_imagen == null) or ($id == null)) { redirect('/admin/entradas/'); }
		if (($this->ion_auth->logged_in()) and ($this->ion_auth->is_admin())) {
			$data['oColor_fondo'] = $this->mod_sistema->fetchById(Mod_sistema::color_fondo);
			$data['oColor_contenedor'] = $this->mod_sistema->fetchById(Mod_sistema::color_contenedor);	
			$data['oColor_menu'] = $this->mod_sistema->fetchById(Mod_sistema::color_menu);
			$data['oLogoMenu'] = $this->mod_sistema->fetchById(Mod_sistema::logo_image_main_menu);

			$submit = $this->input->get_post('submit', TRUE);
			if ((isset($submit)) and ($submit == 'Recortar')) {				
				$x1 = $this->input->get_post('x1', TRUE);
				$y1 = $this->input->get_post('y1', TRUE);
				$x2 = $this->input->get_post('x2', TRUE);
				$y2 = $this->input->get_post('y2', TRUE);
				$width = $this->input->get_post('w', TRUE);
				$height = $this->input->get_post('h', TRUE);

				switch ($tipo_imagen) {
				    case 'portada':
						$oEntrada = $this->entrada->fetchById($id);	
						$config['source_image'] = $this->config->item('user_upload_path').$oEntrada->img_portada;
						$image_file = $oEntrada->img_portada;
				        break;
				    case 'slideshow':
						$oEntrada = $this->entrada->fetchById($id);	
						$config['source_image'] = $this->config->item('user_upload_path').$oEntrada->img_slideshow;
						$image_file = $oEntrada->img_slideshow;
				        break;
				    case 'adicional':
						$oImagen = $this->imagenes->fetchById($id);
						$config['source_image'] = $this->config->item('user_upload_path').$oImagen->path;
						$image_file = $oImagen->path;
				        break;
				    default:break;
				}
				$config['image_library'] = 'gd2';
				$config['new_image'] = $this->config->item('user_upload_path').'crop_'.$image_file;
				$config['x_axis'] = $x1;
				$config['y_axis'] = $y1;
				$config['width'] = round($width);
				$config['height'] = round($height);				
				$config['quality'] = '60%';		
				$config['maintain_ratio'] = false;		
				
				$this->load->library('image_lib', $config); 
				$this->image_lib->initialize($config); 
				if (!$this->image_lib->crop())
				{
				    echo $this->image_lib->display_errors();
				} else {
					switch ($tipo_imagen) {
					    case 'portada':
							$oEntrada->img_portada_tn = 'crop_'.$image_file;
							$oEntrada = $this->entrada->save($oEntrada);		
					        break;
					    case 'slideshow':
							$oEntrada->img_slideshow_tn = 'crop_'.$image_file;
							$oEntrada = $this->entrada->save($oEntrada);
					        break;
					    case 'adicional':
							$oImagen->path_tn = 'crop_'.$image_file; 
							$oImagen = $this->imagenes->save($oImagen);
					        break;
					    default:break;
					}
				}
			}

			$js_adicional = '<script type="text/javascript">';
			switch ($tipo_imagen) {
			    case 'portada':		
					$oEntrada = $this->entrada->fetchById($id);
					if($oEntrada->categoria_id == 1) {
						$js_adicional .= 'var xcrop = 243; var ycrop = 224;';						
					} else {
						switch ($oEntrada->orden) {
						    case 1:
						        $js_adicional .= 'var xcrop = 492; var ycrop = 359;';
						        break;
						    case 6:
						        $js_adicional .= 'var xcrop = 243; var ycrop = 358;';
						        break;
						    case 7:
						        $js_adicional .= 'var xcrop = 243; var ycrop = 133;';
						        break;
						    default:
						       $js_adicional .= 'var xcrop = 243; var ycrop = 224;';
						}					
					}					
					$data['oEntrada'] = $oEntrada;
			        break;
			    case 'slideshow':
			        $oEntrada = $this->entrada->fetchById($id);
					$data['oEntrada'] = $oEntrada;
					$js_adicional .= 'var xcrop = 996; var ycrop = 500;';
			        break;
			    case 'adicional':
			        $oImagen = $this->imagenes->fetchById($id);
					$data['oImagen'] = $oImagen;
					$js_adicional .= 'var xcrop = 243; var ycrop = 224;';
			        break;
			    default:
			}
			$js_adicional .= '</script>';	
			$data['tipo_imagen'] = $tipo_imagen;			
			$data['id'] = $id;	
			$this->trigger->registerText('end_of_body',$js_adicional);			

			$user = $this->ion_auth->user()->row();	
			$data['main_view'] = 'admin/crop';
			$data['user_id']	= $user->id;
			$data['username']	= $user->username;
			$data['styles'] = array(
				array('stylesheet' => '996/jquery.Jcrop.min'),
				array('stylesheet' => '996/admin')
				);
			$data['scripts'] = array(
				array('javascript' => 'vendor/jquery.1.9.0.min'),
				array('javascript' => 'vendor/jquery.Jcrop.min'),
				array('javascript' => '996/my_crop')
			);				
			$this->load->view('limpio_v2', $data);
			//$this->load->view('layout_v2', $data);
		} else {
			redirect('/auth/login/');
		}			
	}
	public function grabar_orden() {
		$this->output->enable_profiler(true);
		$categoria_id 	= $this->input->get_post('categoria_id', TRUE);
		$nuevo_orden 	= $this->input->get_post('orden', TRUE);
		$arrOrden 		= explode(",", $nuevo_orden);
		$step = 1;
		foreach ($arrOrden as $entrada_id) {
			$oEntrada = $this->entrada->fetchById(substr($entrada_id, 2));
			$oEntrada->orden = $step;
			$oEntrada = $this->entrada->save($oEntrada);
			echo 'Entrada '.substr($entrada_id, 2).' con orden '.$oEntrada->orden.' - ';
			$step++;
		}
		//echo 'ok';
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */