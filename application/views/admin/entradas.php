<div id="myoverlay" style="display: none">
     <div id="txtmyoverlay"><img src="<?php echo img_url('loading_bar.gif'); ?>" /></div>
</div>
<?php echo $this->load->view('admin_main_menu');?>
<div class="grid_12">
	<p>Hola <?php echo $username; ?><p>
	<p><a href="<?php echo site_url('admin/entradas/crear/'.$categoria_id); ?>">Crear Entrada</a></p>
</div>
<div class="clear"></div>
<div class="grid_12">
<table id="tbl_listado_admin" class="tabla-admin">
	 <thead>
		<tr class="nodrag">
			<th>Id</th>
			<th>Publicado</th>
			<?php if($categoria_id==Entrada::CONTENIDO_DESTACADO){ ?><th>Orden</th><?php } ?>
			<th>Comentarios</th>
			<th>Categoria</th>		
			<th>Titulo</th>
			<th>Eliminar</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($historias as $historia) {?>
		<tr id="h_<?php echo $historia->id; ?>">
			<td><?php echo $historia->id; ?></td>
			<td><?php echo $historia->publicado; ?></td>
			<?php if($categoria_id==Entrada::CONTENIDO_DESTACADO){ ?><td><?php echo $historia->orden; ?></td><?php } ?>
			<td><?php echo $historia->comentar; ?></td>
			<td><?php echo $arrCategorias[$historia->categoria_id]; ?></td>			
			<td><a href="<?php echo base_url('index.php/admin/entradas/editar/'.$historia->id); ?>"><?php echo $historia->titulo; ?></a></td>
			<td><a href="javascript:confirmar('Confirma eliminar la entrada?', '<?php echo base_url('index.php/admin/entradas/eliminar/'.$historia->id); ?>')">eliminar</a></td>
		</tr>
		<?php } ?>
	</tbody>	
</table>
</div>