<?php echo $this->load->view('main_menu');?>
	<div class="clear"></div>
	<div class="grid_12">
		<h2 style="text-align: left">Hola <?php echo $oLoggedUser['username']; ?></h2>
		<p style="text-decoration: underline">Comunicaciones enviadas a vos por el Rutstik Team</p>
		<p>&nbsp;</p>
		<table>
<?php if (!empty($oComunicaciones)) { ?>
		<thead>
			<tr>
				<th>Fecha</th>
				<th>Asunto</th>
			</tr>
		</thead>
		<tbody>
<?php foreach ($oComunicaciones as $oCom) { ?>
		<tr><td><?php echo $oCom->fecha_salida; ?></td><td><a href="<?php echo site_url('entradas/ver/'.$oCom->entrada_id); ?>"><?php echo $oCom->asunto; ?></a></td></tr>
<?php } 
} else { ?>
		<td><tr>Sin novedades</td></tr>	
<?php } ?>
		</tbody></table>
	</div>