<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trigger {

	static $CadenaTexto = array();
	static $CadenaPHP   = array();

	function Trigger(){
		
	}
	
    function registerText($trigger_name,$texto)
    {
    	$this->CadenaTexto[$trigger_name][]=$texto;
	}
    
    function registerPHP($trigger_name,$phpCode)
    {
		$this->CadenaPHP[$trigger_name][]=$phpCode;
    }
	function fire($trigger_name,$return = false){
		$allCode="";
		if(isset($this->CadenaPHP[$trigger_name])){
			 foreach($this->CadenaPHP[$trigger_name] as $phpCode){
			 	$allCode.=$phpCode;
			 }
		};
		if(!$return){
			eval($allCode);
			$allCode="";
		};
		if(isset($this->CadenaTexto[$trigger_name])){
			 foreach($this->CadenaTexto[$trigger_name] as $texto){
			 	$allCode.=$texto;
			 }
		};
		if(!$return){
			print($allCode);
			$allCode="";
		};
		return $allCode;
	}
}

// END Trigger Class

/* End of file  Trigger.php */
/* Location: ./system/libraries/Trigger.php */