<?php 
/* -----------------------------------------------------------------------------------------
   IdiotMinds - http://idiotminds.com
   -----------------------------------------------------------------------------------------
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//include the facebook.php from libraries directory
require_once APPPATH.'libraries/facebook/facebook.php';

class Fbci extends CI_Controller {

   public function __construct(){
	    parent::__construct();
	    $this->load->library('session');  //Load the Session 
		$this->config->load('facebook'); //Load the facebook.php file which is located in config directory
		$this->load->model('mod_sistema');
		$this->load->model('mod_menu');
		$this->load->library('mobiledetection');	
		$this->load->helper('menu');			
		
    }
	public function index()
	{
		$data['oColor_fondo'] = $this->mod_sistema->fetchById(Mod_sistema::color_fondo);
		$data['oColor_contenedor'] = $this->mod_sistema->fetchById(Mod_sistema::color_contenedor);	
		$data['oColor_menu'] = $this->mod_sistema->fetchById(Mod_sistema::color_menu);	
		$data['oLogoMenu'] = $this->mod_sistema->fetchById(Mod_sistema::logo_image_main_menu);	
		$data['oMenu'] = $this->mod_menu->fetchjerarquico();
		$data['htmlMenu'] = getArbol($data['oMenu']);		
		$data['htmlMenuMobile'] = getArbolMobile($data['oMenu']);
		$data['isMobile'] 			= $this->mobiledetection->isMobile();

		$data['styles'] = array(array('stylesheet' => '996/miembros'));
		$data['scripts'] = array(
			//array('javascript' => 'vendor/jquery.jlnav'),
			//array('javascript' => 'vendor/jquery.detachit'),
			//array('javascript' => 'vendor/jquery.lazyload.min'),
			//array('javascript' => '996/home')
		);	

			  
	  $data['main_view'] = 'main';	
	  $this->load->view('layout_v2', $data);	
	  
	}
	
	function logout(){
		$base_url=$this->config->item('base_url'); //Read the baseurl from the config.php file
		$this->session->sess_destroy();  //session destroy
		//header('Location: '.$base_url);  //redirect to the home page
		redirect('fbci');
		
	}
	function fblogin(){
		$base_url=$this->config->item('base_url'); //Read the baseurl from the config.php file
		//get the Facebook appId and app secret from facebook.php which located in config directory for the creating the object for Facebook class
    	$facebook = new Facebook(array(
		'appId'		=>  $this->config->item('appID'), 
		'secret'	=> $this->config->item('appSecret'),
		));
		
		$user = $facebook->getUser(); // Get the facebook user id 
		
		if($user){
			
			try{
				$user_profile = $facebook->api('/me');  //Get the facebook user profile data
				
				$params = array('next' => $base_url.'fbci/logout');
				
				$ses_user=array('User'=>$user_profile,
				   'logout' =>$facebook->getLogoutUrl($params)   //generating the logout url for facebook 
				);
		        $this->session->set_userdata($ses_user);




				
				//header('Location: '.$base_url.'fbci');
				redirect('fbci');				
			}catch(FacebookApiException $e){
				error_log($e);
				$user = NULL;
			}		
		}	
		$this->load->view('main');
	}
	
}

/* End of file fbci.php */
/* Location: ./application/controllers/fbci.php */