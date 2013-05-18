<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Code Igniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package		CodeIgniter
 * @author		Rick Ellis
 * @copyright	Copyright (c) 2006, pMachine, Inc.
 * @license		http://www.codeignitor.com/user_guide/license.html
 * @link		http://www.codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Code Igniter Asset Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		Nick Cernis | www.goburo.com
 * @author 		Matias Montes | http://codeigniter.com/forums/member/39927/
 * @author 		Santiago Guinle | http://codeigniter.com/forums/member/160116/
 */

// ------------------------------------------------------------------------


/* 26/10/2010 Agregado para panel de controla
-- Santiago Mariano Guinle. */
/*
	a = link
	b = tooltip title
	c = parameters link
*/
function icon_tooltip($a,$b,$c){
	if(!isset($c['class']))$c['class']="";
	$c['class'].=" tt";
	if(is_array($b)){
		return anchor($a,"<span class='tooltip'><span class='title' >".$b["title"]."</span><span class='text' >".$b["content"]."</span></span>",$c);
	} else {
		return anchor($a,"<span class='tooltip'><span class='title' >".$b."</span></span>",$c);
	}
}

function text_tooltip($a,$b,$c,$d){
	if(!isset($d['class']))$d['class']="";
	$d['class'].=" text_tt";
	return anchor($a,$b."<span class='tooltip'><span class='title' >".$c."</span></span>",$d);
}

 /**
  * Image tag helper
  *
  * Generates an img tag with a full base url to add images within your views.
  *
  * @access	public
  * @param	string	the image name
  * @param	mixed 	any attributes
  * @return	string
  */

 function img_tag($image_name, $attributes = '')
 {
 	   /*if (is_array($attributes))
 	   {

 	   	if (!isset($attributes['alt'])) $attributes['alt'] = '';
 		   $attributes = parse_tag_attributes($attributes);
 	   } elseif (is_string($attributes)) {
 	   		$attributes = ' alt="' . $attributes . '"';
 	   }*/

	   return '<img src="'.img_url($image_name).'" '.$attributes.' />';
 }

 function img_url($image_name = '') {
		$obj =& get_instance();
		$img_folder = $obj->config->item('image_path');
		$base = _is_secure() ? $obj->config->item('secure_base_url') : $obj->config->item('base_url');
		if(strpos($img_folder,'http')==0){
			return $img_folder.$image_name;
		} else{
			return $base.$img_folder.$image_name;
		}
	}

	function img_path($image_name = '') {
		$obj =& get_instance();
		$img_folder = $obj->config->item('image_path');
		$base = dirname(rtrim(BASEPATH,'/')).'/';

//		return $base.$img_folder.$image_name;
		return $base.str_replace($obj->config->item('common_path'),"",$obj->config->item('common_path_local').$img_folder).$image_name;
	}
 	function usrf_url($image_name = '') {
		$obj =& get_instance();
		$img_folder = $obj->config->item('userfiles_path');
		$base = _is_secure() ? $obj->config->item('secure_base_url') : $obj->config->item('base_url');
		if(strpos($img_folder,'http')==0){
			return $img_folder.$image_name;
		} else{
			return $base.$img_folder.$image_name;
		}
	}
	function usrf_path($image_name = '') {
		$obj =& get_instance();
		$img_folder = $obj->config->item('userfiles_path');
		$base = dirname(rtrim(BASEPATH,'/')).'/';

//		return $base.$img_folder.$image_name;
		return $base.str_replace($obj->config->item('common_path'),"",$obj->config->item('common_path_local').$img_folder).$image_name;
	}
 // ------------------------------------------------------------------------

  /**
   * Stylesheets include helper
   *
   * Generates a link tag using the base url that points to an external stylesheet
   *
   * @access	public
   * @param	   string	the stylesheet name - leave the '.css' off
   * @param	   mixed 	any attributes
   * @return	string
   */

  function add_style($stylesheet, $versionado = '', $attributes = '')
  {
  	   if (is_array($attributes))
  	   {
  		   $attributes = parse_tag_attributes($attributes);
  	   }
  	   $obj =& get_instance();
 	   $base = _is_secure() ? $obj->config->item('secure_base_url') : $obj->config->item('base_url');
 	   $style_folder = $obj->config->item('stylesheet_path');
		
	   if(strpos($style_folder,'http')==0){
	//		if(_is_secure())$style_folder=str_replace("http://images2.ventas-privadas.com/","https://www.ventas-privadas.com/",$style_folder);
		 	return '<link rel="stylesheet" type="text/css" href="'.$style_folder.$stylesheet.'.css'.$versionado.'"'.$attributes.' />'."\r\n";
		} else{
	 		return '<link rel="stylesheet" type="text/css" href="'.$base.$style_folder.$stylesheet.'.css'.$versionado.'"'.$attributes.' />'."\r\n";
	 	}
  	  
  }
	
 //added by santiago to minify
 function add_style_min($stylesheet)
  {
  		// CHANGEME : funcion modificada para no minificar.
  		$return="";
  		if(is_array($stylesheet)){
  			foreach($stylesheet as $file){
  				$return.=add_style($file);
  			};
  		}else{
			$return=add_style($stylesheet);
 		}
		return $return;
  		
		// por ahora no va mas;
		
		if(is_array($stylesheet)){
			$stylePartes=explode("/",$stylesheet[0]); 
			$stylesheet=implode(".css&s[]=",$stylesheet);
		} else{
			$stylePartes=explode("/",$stylesheet); 
		}
	   
	   // aca lo que hago es tomar la carpeta del estilo para que quede la referencia relativa
		array_pop($stylePartes);
		if(count($stylePartes)>0){
		   $stylePartes=implode("/",$stylePartes)."/";
		} else{
			   $stylePartes=implode("/",$stylePartes);
		}
	   
	   $stylesheet.='.css';
  	   
  	   $obj =& get_instance();
 	   $base = _is_secure() ? $obj->config->item('secure_base_url') : $obj->config->item('base_url');
	   $style_folder = $obj->config->item('stylesheet_path');
 	   $minifier = $obj->config->item('stylesheet_path_min');

  	   return '<link rel="stylesheet" type="text/css" href="'.$base.$style_folder.$stylePartes.$minifier.$stylesheet.'"/>'."\r\n";
  }


  function style_url($stylesheet = '') {
		$obj =& get_instance();
		$base = _is_secure() ? $obj->config->item('secure_base_url') : $obj->config->item('base_url');
		$style_folder = $obj->config->item('stylesheet_path');
		$stylesheet = preg_match('/\.css$|^$/',$stylesheet) ? $stylesheet : $stylesheet.'.css';

		if(strpos($style_folder,'http')==0){
//			if(_is_secure())$style_folder=str_replace("http://images2.ventas-privadas.com/","https://www.ventas-privadas.com/",$style_folder);
			return $style_folder.$stylesheet;
		} else{
			return $base . $style_folder . $stylesheet;
		}
	}

	function style_path($stylesheet = '') {
		$obj =& get_instance();
		$base = dirname(rtrim(BASEPATH,'/')).'/';
		$style_folder = $obj->config->item('stylesheet_path');
		$stylesheet = preg_match('/\.css$|^$/',$stylesheet) ? $stylesheet : $stylesheet.'.css';
		return $base . str_replace($obj->config->item('common_path'),"",$obj->config->item('common_path_local').$style_folder) . $stylesheet;
	}

// ------------------------------------------------------------------------

   /**
    * Javascript include helper
    *
    * Generates a link tag using the base url that points to external javascript
    *
    * @access	public
    * @param	string	the javascript name - leave the '.js' off
    * @param	mixed 	any attributes
    * @return	string
    */

    function add_jscript($javascript, $versionado = '', $attributes = '')
    {
    	   if (is_array($attributes))
    	   {
    		   $attributes = parse_tag_attributes($attributes);
    	   }
    	   $obj =& get_instance();
   	   $base = _is_secure() ? $obj->config->item('secure_base_url') : $obj->config->item('base_url');
   	   $jscript_folder = $obj->config->item('javascript_path');

	   if(strpos($jscript_folder,'http')==0){
	//	   if(_is_secure())$jscript_folder=str_replace("http://images2.ventas-privadas.com/","https://www.ventas-privadas.com/",$jscript_folder);
    	   return '<script type="text/javascript" src="'.$jscript_folder.$javascript.'.js'.$versionado.'"'.$attributes.'></script>'."\r\n";
		}else{
		   return '<script type="text/javascript" src="'.$base.$jscript_folder.$javascript.'.js'.$versionado.'"'.$attributes.'></script>'."\r\n";
		}
    }

    // added function to minify
    function add_jscript_min($javascript)
    {
    
    	  // CHANGEME : funcion modificada para no minificar.
  		$return="";
  		if(is_array($javascript)){
  			foreach($javascript as $file){
  				$return.=add_jscript($file);
  			}
  		}else{
			$return=add_jscript($javascript);
 		}
		return $return;
  		
		// por ahora no va mas;

	   $obj =& get_instance();
   	   $base = _is_secure() ? $obj->config->item('secure_base_url') : $obj->config->item('base_url');
   	   $jscript_folder_min = $obj->config->item('javascript_path_min');
   	   $jscript_folder = $obj->config->item('javascript_path');
	   
	   if(is_array($javascript))
	   	$javascript=implode(".js&s[]=",$javascript);
	   
	   $javascript.='.js';
	   return '<script type="text/javascript" src="'.$base.$jscript_folder_min.$javascript.'"></script>'."\r\n";
    }

    function jscript_url($javascript = '') {
			$obj =& get_instance();
			$base = _is_secure() ? $obj->config->item('secure_base_url') : $obj->config->item('base_url');
			$jscript_folder = $obj->config->item('javascript_path');
			
		   if(strpos($jscript_folder,'http')==0){
//			 if(_is_secure())$jscript_folder=str_replace("http://images2.ventas-privadas.com/","https://www.ventas-privadas.com/",$jscript_folder);
    		 return $jscript_folder . $javascript . '.js';
    	   }else{
    		 return $base . $jscript_folder . $javascript . '.js';
    	   }
		}

		function jscript_path($javascript = '') {
			$obj =& get_instance();
			$base = dirname(rtrim(BASEPATH,'/')).'/';
			$jscript_folder = $obj->config->item('javascript_path');
			$javascript = preg_match('/\.js$|^$/',$javascript) ? $javascript : $javascript.'.js';
			return $base . 	str_replace($obj->config->item('common_path'),"",$obj->config->item('common_path_local').$jscript_folder) . $javascript ;

		}

 // ------------------------------------------------------------------------

 /**
  * Parse out the attributes
  *
  * Some of the functions use this
  * (duplicate from Rick Ellis' parse_url_attributes function in URL Helper.)
  *
  * @access	private
  * @param	array
  * @param	bool
  * @return	string
  */
 function parse_tag_attributes($attributes, $javascript = FALSE)
 {
 	$att = '';
 	foreach ($attributes as $key => $val)
 	{
 		if ($javascript == TRUE)
 		{
 			$att .= $key . '=' . $val . ',';
 		}
 		else
 		{
 			$att .= ' ' . $key . '="' . $val . '"';
 		}
 	}

 	if ($javascript == TRUE)
 	{
 		$att = substr($att, 0, -1);
 	}

 	return $att;
 }

 // ------------------------------------------------------------------------

  /**
   * Favicon include helper
   *
   * Generates a link tag using the base url that points to favicon
   *
   * @access    public
   * @return    string
   */

  function add_favicon()
  {
     	$obj =& get_instance();
        $base = _is_secure() ? $obj->config->item('secure_base_url') : $obj->config->item('base_url');
        $img_folder = $obj->config->item('image_path');

        return '<link rel="shortcut icon" href="'.$base.$img_folder.'favicon.ico" />'."\r\n";
  }

  // ------------------------------------------------------------------------

  /**
   *  Flash include helper
   *
   * Generates an object tag and possibly an embed tag using the base url
   * that points to media.
   * $params must be an associative array which will be used to generate the
   * param tags needed
   *
   * @access    public
   * @param     string
   * @param     array
   * @param     string/array
   * @param			string
   * @return    string
   */
  function add_flash($flash, $params = array(), $attributes = '', $innerHTML = '')
  {

	if (is_array($attributes))
	{
		$attributes = parse_tag_attributes($attributes);
	}

	$obj =& get_instance();
	$base = _is_secure() ? $obj->config->item('secure_base_url') : $obj->config->item('base_url');

//	$media_folder = $obj->config->item("media_path");	
	$media_folder = str_replace($obj->config->item('common_path'),"",$obj->config->item('common_path_local').$obj->config->item("media_path"));
	
	$tag  = "<object ";
	$tag .= "type=\"application/x-shockwave-flash\" ";
	$tag .= "data=\"{$base}{$media_folder}{$flash}.swf\" ";
	$tag .= $attributes;
	$tag .= ">";
	$tag .= "<param name=\"movie\" value=\"{$base}{$media_folder}{$flash}.swf\" />";

	foreach ($params as $k=>$v)
	{
		$tag .= "<param name=\"{$k}\" value=\"{$v}\" />";
	}

	$tag .= $innerHTML;

	$tag .= "</object>";

	return $tag;

  }

  // ------------------------------------------------------------------------

  function media_url($media = '') {
			$obj =& get_instance();
			$base = _is_secure() ? $obj->config->item('secure_base_url') : $obj->config->item('base_url');
			$media_folder = $obj->config->item('media_path');
			return  $media_folder . $media;
		}

		function media_path($media = '') {
			$obj =& get_instance();
			$base = dirname(rtrim(BASEPATH,'/')).'/';
			$media_folder = $obj->config->item('media_path');
			
			return $base . str_replace($obj->config->item('common_path'),"",$obj->config->item('common_path_local').$media_folder) . $media ;
		}

  // ------------------------------------------------------------------------

  function callToPhone($number){
  	$number = strtr($number,"()-+","    ");
  	if(substr($number,0,1)==0)$number=substr($number,1,99);
  	if(substr($number,0,2)==54 and strlen($number)>10)$number=substr($number,2,99);
  	if(substr($number,0,1)==0)$number=substr($number,1,99);
  	if(substr($number,0,2)==11)$number=substr($number,2,99);
  	if(substr($number,0,1)==0)$number=substr($number,1,99);
//  	if(substr($number,0,2)==15)$number=substr($number,2,99);
//  	if(substr($number,0,1)==0)$number=substr($number,1,99);
  	$number=str_replace(" ","",$number);
  	return "sip:".$number;
  }
  //-------------------------------------------------------------------------
  
  
  /**
   * Frameset include helper
   *
   * Generates a frame
   *
   * @access    public
   * @return    string
   */

  function add_frame($path,$name)
  {
        $obj =& get_instance();
        $base = $base = _is_secure() ? $obj->config->item('secure_base_url') : $obj->config->item('base_url');
        $index_page = $obj->config->item('index_page');
        if (!empty($index_page)) $base .= $index_page."/";

        return '<frame src="'.$base.$path.'" name="'.$name.'"  scrolling="auto" noresize="noresize" />';
  }

  // ------------------------------------------------------------------------

  function _is_secure() {
	return (isset($_SERVER["HTTPS"]) and strtolower($_SERVER["HTTPS"]) == "on");
  }

function not_public_full_path($folder){
	$obj =& get_instance();
	//$base = dirname(rtrim(BASEPATH,'/')).'/';
	$not_public_folder = $obj->config->item('not_public_path');
	return rtrim($not_public_folder,'/').'/'.$folder;
	//return $base . str_replace($obj->config->item('common_path'),"",$obj->config->item('common_path_local').$not_public_folder) . $folder ;
}

$CI =& get_instance();
$CI->config->load("assets");
?>