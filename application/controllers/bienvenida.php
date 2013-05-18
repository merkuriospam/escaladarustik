<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bienvenida extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//$this->load->library('mobiledetection');
		//$data['isMobile'] = $this->mobiledetection->isMobile();
		$this->load->library('mobiledetect');
		$mobile = new stdClass();
		$mobile->isMobile = $this->mobiledetect->isMobile();
		$mobile->isTablet = $this->mobiledetect->isTablet();
		$mobile->isiOS = $this->mobiledetect->isiOS();
		$mobile->isAndroidOS = $this->mobiledetect->isAndroidOS();
		$mobile->mobileGrade = $this->mobiledetect->mobileGrade();
		$mobile->isBlackBerry = $this->mobiledetect->isBlackBerry();
		

		$data['mobile'] = $mobile;
		$data['entrada'] = array();
		$data['main_view'] = 'bienvenida';		
		/*$data['historias'] = $this->entrada->fetchFull();		
		$data['styles'] = array(array('stylesheet' => 'main-full-multi-column'),
								array('stylesheet' => 'modal-basic'),
								array('stylesheet' => 'categorias'),
								array('stylesheet' => 'sticky-navigation')
		);
		$data['scripts'] = array(array('javascript' => 'jquery.masonry.min'),
								 array('javascript' => 'jquery.simplemodal.1.4.3.min'),
								 array('javascript' => 'main-one')
		);*/
		
		$this->load->view('layout', $data);			
	}	 
	 
	public function test_doctrine()
	{
		$this->load->library('doctrine');
		$em = $this->doctrine->em;
		
		$data['entrada'] = $em;
		$data['main_view'] = 'bienvenida';		
		$this->load->view('layout', $data);			
	}	
	 
	public function test_datamapper()
	{
		/*$this->output->enable_profiler(false);*/
		/*$this->load->model('entrada');*/
		$this->load->library('datamapper');
		
 		$e = new Entrada();
        //$e->where('id', 34)->get();
		//$e->get_by_id(34);
		//$e->get();
		$e->get_iterated();
		//$e->usuario = new Usuario();
		//$e->usuario->get();
		
		// Loop through all users
		/*foreach ($e as $entrada)
		{
			$e->usuario = new Usuario();
		    $e->usuario->get();
		}	*/
			
		$data['entrada'] = $e;
		$data['main_view'] = 'bienvenida';		
		$this->load->view('layout', $data);		
	}
	
	public function v2() 
	{
		//$this->load->library('mobiledetection');
		//$data['isMobile'] = $this->mobiledetection->isMobile();
		$this->load->library('mobiledetect');
		$mobile = new stdClass();
		$mobile->isMobile = $this->mobiledetect->isMobile();
		$mobile->isTablet = $this->mobiledetect->isTablet();
		$mobile->isiOS = $this->mobiledetect->isiOS();
		$mobile->isAndroidOS = $this->mobiledetect->isAndroidOS();
		$mobile->mobileGrade = $this->mobiledetect->mobileGrade();
		$mobile->isBlackBerry = $this->mobiledetect->isBlackBerry();
		

		$data['mobile'] = $mobile;
		$data['entrada'] = array();
		$data['main_view'] = 'base_v2';				
		$this->load->view('layout_v2', $data);
	}
		
	public function grilla996() 
	{
		//$this->load->library('mobiledetection');
		//$data['isMobile'] = $this->mobiledetection->isMobile();
		$this->load->library('mobiledetect');
		$mobile = new stdClass();
		$mobile->isMobile = $this->mobiledetect->isMobile();
		$mobile->isTablet = $this->mobiledetect->isTablet();
		$mobile->isiOS = $this->mobiledetect->isiOS();
		$mobile->isAndroidOS = $this->mobiledetect->isAndroidOS();
		$mobile->mobileGrade = $this->mobiledetect->mobileGrade();
		$mobile->isBlackBerry = $this->mobiledetect->isBlackBerry();
		

		$data['mobile'] = $mobile;
		$data['entrada'] = array();
		$data['main_view'] = 'grilla996';				
		$this->load->view('layout_v2', $data);
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */