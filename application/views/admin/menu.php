<?php echo $this->load->view('admin_main_menu');?>
<div class="clear"></div>
<div class="grid_12">
	<form method="post" action="<?php echo site_url('admin/menu/grabar_navegacion/'); ?>">
	<?php
	//echo $htmlMenu;
	echo '<ul>';
	echo '<a href="'.site_url('admin/menu/crear_nodo/0').'">+</a>';
	foreach($oMenu as $parent_id => $item) {
		 if ($parent_id == 0) {
		 	//Recorro nivel 0
		 	foreach($item as $key => $oNivel0) { ?>
				<li>
				<a href="javascript:confirmar('Confirma eliminar el Boton?', '<?php echo site_url('admin/menu/eliminar_nodo/'.$oNivel0['id']) ?>')">-</a> | <a href="<?php echo site_url('admin/menu/crear_nodo/'.$oNivel0['id']) ?>">+</a>
				<input name="orden_<?php echo $oNivel0['id']; ?>" value="<?php echo $oNivel0['orden']; ?>" size=3 />
				<input name="texto_<?php echo $oNivel0['id']; ?>" value="<?php echo $oNivel0['texto']; ?>" />
				<select name="menu_<?php echo $oNivel0['id']; ?>">
					<option value="0">Sin Vínculo</option>
					<?php foreach($oEntradas as $oEntrada) { ?>
					<option value="<?php echo $oEntrada->id; ?>" <?php if ($oEntrada->id==$oNivel0['destino_entrada_id']) { ?>selected="selected"<?php } ?>><?php echo $oEntrada->titulo; ?></option>
					<?php } ?>
				</select>
				<?php		 		
		 		if (array_key_exists($oNivel0['id'], $oMenu)) {
					//Recorro nivel 1
					echo '<ul>';
					foreach($oMenu[$oNivel0['id']] as $key => $oNivel1) { ?>
					<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="javascript:confirmar('Confirma eliminar el Boton?', '<?php echo site_url('admin/menu/eliminar_nodo/'.$oNivel1['id']) ?>')">-</a>
					<input name="orden_<?php echo $oNivel1['id']; ?>" value="<?php echo $oNivel1['orden']; ?>" size=3 />
					<input name="texto_<?php echo $oNivel1['id']; ?>" value="<?php echo $oNivel1['texto']; ?>" />			
					<select name="menu_<?php echo $oNivel1['id']; ?>">
						<option value="0">Sin Vínculo</option>
						<?php foreach($oEntradas as $oEntrada) { ?>
						<option value="<?php echo $oEntrada->id; ?>" <?php if ($oEntrada->id==$oNivel1['destino_entrada_id']) { ?>selected="selected"<?php } ?>><?php echo $oEntrada->titulo; ?></option>
						<?php } ?>
					</select>
					<?php						
						echo '</li>';
					}
					echo '</ul>';
					}
				echo '</li>';
			 }
		 }
	} 
	echo '</ul>';	
	?>
	<p><input type="submit" value="Grabar" /></p>
	</form>
</div>