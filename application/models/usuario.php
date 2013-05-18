<?php

class Usuario extends DataMapper {
	var $table = 'usuarios';
    var $has_many = array('entradas');
    /*var $has_one = array('country');*/
    
    // Optionally, you can add post model initialisation code
    function post_model_init($from_cache = FALSE)
    {
    	
    }       
}

/* End of file user.php */
/* Location: ./application/models/usuario.php */