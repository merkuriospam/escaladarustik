<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mod_sistema extends MY_Model 
{
	const color_fondo 		= 1;
	const color_contenedor 	= 2;
	const color_menu 		= 3;
	const logo_image_main_menu = 4;

	public function __construct() {
		parent::__construct();
	}
	
	protected function getTableName() {
		return "sistema";
	}

	public function arrSistema() {
		$arrSis = array(
			Mod_sistema::color_fondo 		=> "color_fondo",
			Mod_sistema::color_contenedor 	=> "color_contenedor",
			Mod_sistema::color_menu 		=> "color_menu",
			Mod_sistema::logo_image_main_menu => "logo_image_main_menu"
		);
		return $arrSis;
	}	
}