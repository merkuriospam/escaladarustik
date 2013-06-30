<?php echo $this->load->view('admin_main_menu');?>
<div class="clear"></div>
<div class="grid_12">
	<h1>Comunicaciones</h1>
	<!--<h2 style="text-align: left; margin-left: 16px">Infraestructura</h2>-->
	<ul>
		<li><a target="_blank" href="<?php echo site_url('crons/demonio_envios/procesar')?>">Procesar Todo</a></li>
		<li><a target="_blank" href="<?php echo site_url('crons/demonio_envios/enviar')?>">Enviar Todo</a></li>		
		<li>&nbsp;</li>
		<li>&nbsp;</li>		
		<li><a href="<?php echo site_url('admin/comunicaciones/segmentos')?>">Segmentos</a></li>
		<li><a href="<?php echo site_url('admin/comunicaciones/listar')?>">Envios</a></li>
	</ul>	
</div>