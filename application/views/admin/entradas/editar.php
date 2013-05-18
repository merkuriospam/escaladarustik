<?php echo $this->load->view('admin_main_menu');?>
	<form method="post" enctype="multipart/form-data" />
		<div class="clear"></div>
		<div class="grid_12">
		<p style="margin-left: 20px"><a href="<?php echo base_url('index.php/admin/entradas/'); ?>">Volver</a> | <input type="submit" value="Grabar" /></p>	
		<p><label>Título</label><input type="text" name="titulo" id="titulo" style="width: 90%" value="<?php echo $oEntrada->titulo; ?>" /></p>
		<p><label>Copete</label><input type="text" name="copete" id="copete" style="width: 90%" value="<?php echo $oEntrada->copete; ?>" /></p>
		<p>
			<label>Categoria</label><select name="categoria" id="categoria">
			<?php foreach ($arrCategorias as $cat_id => $cat_nombre) {?>
			<option value="<?php echo $cat_id; ?>" <?php echo (($oEntrada->categoria_id==$cat_id)or($categoria_crear == $cat_id))?' selected="selected"':''; ?>><?php echo $cat_nombre; ?></option>
			<?php }?>
			</select>
			<label>Publicado</label>
			<select name="publicado">
				<option value="0"<?php echo ($oEntrada->publicado=='0')?' selected="selected"':''; ?>>No</option>
				<option value="1"<?php echo ($oEntrada->publicado=='1')?' selected="selected"':''; ?>>Si</option>
			</select>
			<label>Imagenes Adicionales</label>
			<select name="carrousel">
				<option value="0"<?php echo ($oEntrada->carrousel=='0')?' selected="selected"':''; ?>>Listado</option>
				<option value="1"<?php echo ($oEntrada->carrousel=='1')?' selected="selected"':''; ?>>Carrousel</option>
			</select>
			<label>Orden</label><input name="orden" type="text" size="3" value="<?php echo $oEntrada->orden; ?>" />
			<label>Mostar Comentarios</label>
			<select name="comentar">
				<option value="0"<?php echo ($oEntrada->comentar=='0')?' selected="selected"':''; ?>>No</option>
				<option value="1"<?php echo ($oEntrada->comentar=='1')?' selected="selected"':''; ?>>Si</option>
			</select>			
			<label>Mostar Share</label>
			<select name="mostrar_share">
				<option value="0"<?php echo ($oEntrada->mostrar_share=='0')?' selected="selected"':''; ?>>No</option>
				<option value="1"<?php echo ($oEntrada->mostrar_share=='1')?' selected="selected"':''; ?>>Si</option>
			</select>
			<label>Mostar Imagen Portada</label>
			<select name="mostrar_img_portada">
				<option value="0"<?php echo ($oEntrada->mostrar_img_portada=='0')?' selected="selected"':''; ?>>No</option>
				<option value="1"<?php echo ($oEntrada->mostrar_img_portada=='1')?' selected="selected"':''; ?>>Si</option>
			</select>				
		</p>			
		<p><label>Imagen principal</label>
			<?php if (($oEntrada->categoria_id==Entrada::CONTENIDO_GENERAL) or ($categoria_crear == Entrada::CONTENIDO_GENERAL)) { echo '(243x224px)'; } ?>		
			<?php if (($oEntrada->categoria_id==Entrada::CONTENIDO_SLIDESHOW) or ($categoria_crear == Entrada::CONTENIDO_SLIDESHOW)) { echo '(243x224px)'; } ?>						
			<?php if (($oEntrada->categoria_id==Entrada::CONTENIDO_MENU) or ($categoria_crear == Entrada::CONTENIDO_MENU)) { echo '(243x224px)'; } ?>						
			<input type="file" name="userfile" size="70" />
			<a href="<?php echo site_url('admin/entradas/cropearImagen/portada/'.$oEntrada->id); ?>">Recortar</a>
			<br />
			<?php if (($oEntrada->categoria_id==Entrada::CONTENIDO_DESTACADO) or ($categoria_crear == Entrada::CONTENIDO_DESTACADO)) { ?>
			<ul id="medidas_featured_content">
				<li>1 = 492x359px</li>
				<li>2 = 243x224px</li>
				<li>3 = 243x224px</li>
				<li>4 = 243x224px</li>
				<li>5 = 243x224px</li>
				<li>6 = 243x358px</li>
				<li>7 = 243x133px</li>
				<li>8 = 243x224px</li>
			</ul>		
			<?php } ?>		
		</p>
		<?php if (($oEntrada->categoria_id==Entrada::CONTENIDO_SLIDESHOW) or ($categoria_crear == Entrada::CONTENIDO_SLIDESHOW)) { ?>
		<p><label>Imagen Slideshow (996x500px)</label><input type="file" name="userfile2" size="70" /><a href="<?php echo site_url('admin/entradas/cropearImagen/slideshow/'.$oEntrada->id); ?>">Recortar</a></p>	
		<?php } ?>
		<?php if (is_numeric($oEntrada->id)) { ?>	
		<p style="margin-left: 20px"><a href="<?php echo site_url('admin/entradas/mupload/'.$oEntrada->id); ?>">Imágenes Adicionales</a></p>	
		<?php } ?>
		<?php echo $fck1; ?>
		</div>	
		<div class="clear"></div>
		<div>
			<img src="<?php echo usrf_url('portadas/'.$oEntrada->img_portada_tn); ?>" />
		</div>
		<div>
			<img src="<?php echo usrf_url('portadas/'.$oEntrada->img_slideshow_tn); ?>" />
		</div>
	</form>