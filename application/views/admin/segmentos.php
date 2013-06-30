<?php echo $this->load->view('admin_main_menu');?>
<div class="clear"></div>
<div class="grid_12">
	<h1>Segmentos</h1>
	<p><a href="<?php echo site_url('admin/comunicaciones/'); ?>">Comunicaciones</a></p>
	<p><a href="<?php echo site_url('admin/comunicaciones/crear_segmento'); ?>">Crear Segmento</a></p>
	<table>
		<thead>
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>Accion</th>				
			</tr>
		</thead>
		<tbody>
			<?php foreach($segmentos as $segmento) { ?>
			<tr>
				<td><?php echo $segmento->id; ?></td>
				<td><a href="<?php echo site_url('admin/comunicaciones/editar_segmento'.'/'.$segmento->id); ?>"><?php echo $segmento->nombre; ?></a></td>
				<td><a href="javascript: void(0)" onclick="confirmar('Confirma eliminar el segmento','<?php echo site_url('admin/comunicaciones/eliminar_segmento'.'/'.$segmento->id); ?>')">eliminar</a></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
<pre><?php //print_r($arrUsers); ?></pre>
</div>