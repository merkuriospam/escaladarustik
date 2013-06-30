<?php echo $this->load->view('admin_main_menu');?>
<div class="clear"></div>
<div class="grid_12">
	<h1>Comunicaciones</h1>
	<p><a href="<?php echo site_url('admin/comunicaciones/'); ?>">Volver</a></p>
	<p><a href="<?php echo site_url('admin/comunicaciones/crear'); ?>">Crear Comunicacion</a></p>
	<table>
		<thead>
			<tr>
				<th>Id</th>
				<th>Asunto</th>
				<th>Nombre</th>
				<th>Accion</th>				
			</tr>
		</thead>
		<tbody>
			<?php foreach($oComunicaciones as $oComunicacion) { ?>
			<tr>
				<td><?php echo $oComunicacion->id; ?></td>
				<td><?php echo $oComunicacion->asunto; ?></td>
				<td><a href="<?php echo site_url('admin/comunicaciones/editar/'.$oComunicacion->id); ?>"><?php echo $oComunicacion->fecha_salida; ?></a></td>
				<td><a href="javascript: void(0)" onclick="confirmar('Confirmar la cancelación del envío','<?php echo site_url('admin/comunicaciones/cancelar/'.$oComunicacion->id); ?>')"><?php echo $arrEstCom[$oComunicacion->estado]; ?></a></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>