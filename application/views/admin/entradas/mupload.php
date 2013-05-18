<?php echo $this->load->view('admin_main_menu');?>
<?php if (isset($oMensaje)) { ?>
<div>
<p><?php echo $oMensaje['titulo']; ?></p>
<?php echo $oMensaje['contenido']; ?>
</div>
<?php } ?>
<div class="clear"></div>
<div class="grid_12">
	<p><a href="<?php echo site_url('admin/entradas/editar/'.$entrada_id); ?>">Volver</a></p>
	<p>El tamaño debe ser 243x224px para que se muestren de forma correcta</p>
	<form method="post" action="<?php echo base_url('index.php/admin/entradas/do_mupload/'.$entrada_id); ?>" enctype="multipart/form-data" />
	    <input type="file" name="files[]" multiple /><input type="submit" name="submit" value="Cargar Imagenes" />    
	</form>
</div>

<form method="post" action="<?php echo base_url('index.php/admin/entradas/editar_imagenes/'.$entrada_id); ?>" />
<div class="clear"></div>
<div class="grid_12">
	<?php if (count($oImagenes) > 0) {?><p><input type="submit" name="submit" value="Grabar cambios de las Imágenes" /></p>
	<?php } else { ?><label>No hay imágenes adicionales cargadas</label><?php } ?>
	<?php foreach($oImagenes as $imagen) { ?>
		<div style="float: left; width: 230px; margin: 0px; padding: 4px; overflow: hidden; border: 1px solid #666">
			<p><input class="npt_mupload" placeholder="Orden" type="text" name="orden<?php echo $imagen->id; ?>" id="orden<?php echo $imagen->id; ?>" size="3" value="<?php echo $imagen->orden; ?>" /></p>
			<p><input class="npt_mupload" placeholder="Título" p type="text" name="titulo<?php echo $imagen->id; ?>" id="titulo<?php echo $imagen->id; ?>" size="20" value="<?php echo $imagen->titulo; ?>" /></p>
			<p><input class="npt_mupload" placeholder="Copete" type="text" name="copete<?php echo $imagen->id; ?>" id="copete<?php echo $imagen->id; ?>" size="20" value="<?php echo $imagen->copete; ?>" /></p>
		    <p><img class="imagen_mupload" src="<?php echo usrf_url('portadas/'.$imagen->path_tn); ?>" /><a href="<?php echo site_url('admin/entradas/cropearImagen/adicional/'.$imagen->id); ?>">Recortar</a></p>
		    <p><a href="<?php echo base_url('index.php/admin/entradas/eliminar_imagen/'.$imagen->id); ?>">Eliminar</a></p>
		</div>
	<?php } ?>
</div>
</form>