<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function getArbol($oMenu = NULL, $conId = FALSE, $oLoggedUser = NULL) {
	$html = '';
	if(($oMenu==NULL) or (empty($oMenu))) { return $html; }
	$cadenaId = ($conId == TRUE)?' id="ul_main_menu"':'';
	$html.= '<ul'.$cadenaId.' class="navigation">';
	foreach($oMenu as $parent_id => $item) {
		 if ($parent_id == 0) {
		 	//Recorro nivel 0
		 	foreach($item as $key => $oNivel0) {
		 		if((is_numeric($oNivel0['destino_entrada_id'])) and ($oNivel0['destino_entrada_id']!=0)) {
		 			$link0 = '<a href="'.site_url('entradas/ver/'.$oNivel0['destino_entrada_id']).'">'.$oNivel0['texto'].'</a>';	
		 		} else { $link0 = '<a href="javascript: void(0)">'.$oNivel0['texto'].'</a>'; }
		 		$html.= '<li>'.$link0;		 		
		 		if (array_key_exists($oNivel0['id'], $oMenu)) {
					//Recorro nivel 1
					$html.= '<ul style="position: inherit">';
					foreach($oMenu[$oNivel0['id']] as $key => $oNivel1) {
						if((is_numeric($oNivel1['destino_entrada_id'])) and ($oNivel1['destino_entrada_id']!=0)) {
							$link1 = '<a href="'.site_url('entradas/ver/'.$oNivel1['destino_entrada_id']).'">'.$oNivel1['texto'].'</a>';
						} else { $link1 = '<a href="javascript: void(0)">'.$oNivel1['texto'].'</a>'; }		
						$html.= '<li>'.$link1.'</li>';
					}
					$html.= '</ul>';
				}
				$html.= '</li>';
		 	}
		 }
	}
	if(isset($oLoggedUser['email'])) {
		$html.= '<li><a href="javascript: void(0)">'.$oLoggedUser['username'].'</a>';
		$html.= '<ul style="position: inherit">';
		$html.= '<li><a href="'.site_url('miembros/activo/comunicaciones').'">Comunicaciones</a></li>';
		$html.= '<li><a href="'.site_url('auth/logout/').'">Cerrar Sesión</a></li>';
		$html.= '</ul></li>';
	} else {
		$html.= '<li><a href="'.site_url('auth/login/').'">Ingresar</a>';
	}
	$html.= '</ul>';
	return $html;	
}
function getArbolMobile($oMenu = null, $conId = FALSE, $oLoggedUser = FALSE) {
	$html = '';
	if(($oMenu==null) or (empty($oMenu))) { return $html; }
	$cadenaId = ($conId == TRUE)?' id="sl_main_menu"':'';
	$html.= '<select'.$cadenaId.' class="sl_main_menu" onchange="ir(this.value)">';
	$html.= '<option value="">MENU PRINCIPAL</option>';
	$html.= '<option value="'.site_url('home').'">Inicio</option>';
	foreach($oMenu as $parent_id => $item) {
		 if ($parent_id == 0) {
		 	//Recorro nivel 0
		 	foreach($item as $key => $oNivel0) {
		 		if((is_numeric($oNivel0['destino_entrada_id'])) and ($oNivel0['destino_entrada_id']!=0)) {
		 			$link0 = '<option value="'.site_url('entradas/ver/'.$oNivel0['destino_entrada_id']).'">'.$oNivel0['texto'].'</option>';	
		 		} else { $link0 = '<option value="">'.$oNivel0['texto'].'</option>'; }
		 		$html.= $link0;		 		
		 		if (array_key_exists($oNivel0['id'], $oMenu)) {
					//Recorro nivel 1
					foreach($oMenu[$oNivel0['id']] as $key => $oNivel1) {
						if((is_numeric($oNivel1['destino_entrada_id'])) and ($oNivel1['destino_entrada_id']!=0)) {
							$link1 = '<option value="'.site_url('entradas/ver/'.$oNivel1['destino_entrada_id']).'">&nbsp;&nbsp;&nbsp;&nbsp;'.$oNivel1['texto'].'</option>';
						} else { $link1 = '<option value="">&nbsp;&nbsp;&nbsp;&nbsp;'.$oNivel1['texto'].'</option>'; }		
						$html.= $link1;
					}
				}
		 	}
		 }
	} 
	$html.= '</select>';
	return $html;	
}































/* End of file menu_helper.php */
/* Location: ./application/helpers/menu_helper.php */