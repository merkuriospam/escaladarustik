<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Demonio_envios extends CI_Controller
{
	function __construct() {
		parent::__construct();
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$this->load->model('users');
		$this->load->model('entrada');
		$this->load->model('segmento');
		$this->load->model('comunicacion');
		$this->load->model('comunicaciones_buffer');
		$this->load->model('segmentos_usuarios');
		//$this->output->enable_profiler(TRUE);		
	}

	public function index()	{ redirect('home'); }
	
	public function procesar()	
	{
		$oComunicaciones = $this->comunicacion->fetch(array('estado'=>Comunicacion::PENDIENTE));
		$step = 0;
		foreach ($oComunicaciones as $oComunicacion) {
			$step++;
			if ($oComunicacion->segmento_id > 0) {
				//Es un segmento, iterar
				$oSegmentos_usuarios = $this->segmentos_usuarios->traer_con_user($oComunicacion->segmento_id);
				foreach($oSegmentos_usuarios as $usuario_id => $arr_usuario){
					$oBuffer = $this->comunicaciones_buffer->create();
					$oBuffer->entrada_id 		= $oComunicacion->entrada_id;
					$oBuffer->usuario_id 		= $usuario_id;
					$oBuffer->asunto 			= $oComunicacion->asunto;
					$oBuffer->html_body 		= $oComunicacion->html_body;
					$oBuffer->text_body 		= $oComunicacion->text_body;
					$oBuffer->fecha_salida		= $oComunicacion->fecha_salida;
					$oBuffer->estado			= Comunicaciones_buffer::PENDIENTE;
					$oBuffer = $this->comunicaciones_buffer->save($oBuffer);					
				}
			}	
			if ($oComunicacion->usuario_id > 0) {
				//Es un usuario
				$oBuffer = $this->comunicaciones_buffer->create();
				$oBuffer->entrada_id 		= $oComunicacion->entrada_id;
				$oBuffer->usuario_id 		= $oComunicacion->usuario_id;
				$oBuffer->html_body 		= $oComunicacion->html_body;
				$oBuffer->text_body 		= $oComunicacion->text_body;
				$oBuffer->fecha_salida		= $oComunicacion->fecha_salida;
				$oBuffer->asunto 			= $oComunicacion->asunto;
				$oBuffer->estado			= Comunicaciones_buffer::PENDIENTE;
				$oBuffer = $this->comunicaciones_buffer->save($oBuffer);
			}	
			if ($oComunicacion->to != '') {
				//Es destinatario email
				$oBuffer = $this->comunicaciones_buffer->create();
				$oBuffer->to		 		= $oComunicacion->to;				
				$oBuffer->html_body 		= $oComunicacion->html_body;
				$oBuffer->text_body 		= $oComunicacion->text_body;
				$oBuffer->fecha_salida		= $oComunicacion->fecha_salida;
				$oBuffer->asunto 			= $oComunicacion->asunto;
				$oBuffer->estado			= Comunicaciones_buffer::PENDIENTE;
				$oBuffer = $this->comunicaciones_buffer->save($oBuffer);
			}
			$oComunicacion->estado 	= Comunicacion::PROCESADO;
			$oComunicacion 			= $this->comunicacion->save($oComunicacion);	
		}
		echo 'Se procesaron: '.$step.' comunicaciones';
	}
	public function enviar()	
	{
		$this->load->config('smtp');		
		$this->load->library('email');
	
		$config_smtp =  $this->config->item('smtp_config_array');
				
		$oMailBuffer = $this->comunicaciones_buffer->fetch(array('estado'=>Comunicaciones_buffer::PENDIENTE));
		//var_dump($oMailBuffer);
		foreach ($oMailBuffer as $oMail) {
			$oUser = NULL;
			if ($oMail->usuario_id > 0) {
				$oUser = $this->users->fetchById($oMail->usuario_id);
			}

			$destino = (!empty($oUser))?$oUser->email:$oMail->to;			
			
		    $this->email->clear();
			$this->email->initialize($config_smtp);	
			$this->email->from('martin@merkurio.com.ar');
			//$this->email->from('info@escaladarustik.com.ar');
			$this->email->to($destino);
			$this->email->subject($oMail->asunto);
			
			$data['oMail'] = $oMail;
			$this->email->message($this->load->view('email/comunicacion', $data, true));
			$this->email->send();

			echo 'mail enviado a '.$destino.'<br />';
			$oMail->estado = Comunicaciones_buffer::ENVIADO;
			$oMail = $this->comunicaciones_buffer->save($oMail);			
		}
	}	
}

/* End of file demonio_envios.php */
/* Location: ./application/controllers/crons/demonio_envios.php */



