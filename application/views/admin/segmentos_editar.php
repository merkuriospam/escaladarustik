<?php echo $this->load->view('admin_main_menu');?>
<div class="clear"></div>
<div class="grid_12">
	<h1>Segmentos Editar</h1>
	<p><a href="<?php echo site_url('admin/comunicaciones/segmentos/'); ?>">Segmentos</a></p>
	<form method="post" action="<?php echo site_url('admin/comunicaciones/grabar_nombre_segmento/'); ?>">
	<p><input name="hddn_segmento_id" type="hidden" value="<?php echo $segmento_id; ?>" /></p>
	<p><input name="npt_nombre" type="text" value="<?php echo ($segmento_id>0)?$oSegmento->nombre:'Segmento Nuevo'; ?>" /></p>
	<p><input type="submit" value="Grabar" /></p>
	</form>		
</div>
<?php if ($segmento_id > 0) { ?>
<div class="clear"></div>
<div class="grid_6">
	<h2>Origen</h2>
	<form method="post" action="<?php echo site_url('admin/comunicaciones/usuarioAsegmento/'); ?>">
	<p><input name="hddn_segmento_id" type="hidden" value="<?php echo $segmento_id; ?>" /></p>
	<select name="slct_user_source[]" multiple="multiple" class="slct_segmento">
	<?php foreach($arrUsers as $user) { ?>
		<option value="<?php echo $user['id']; ?>"><?php echo $user['username']; ?></option>
	<?php } ?>
	</select>
	<p><input type="submit" value="Ingresar usuarios a segmento" /></p>
	</form>	
</div>
<div class="grid_6">
	<h2>Segmento</h2>
	<form method="post" action="<?php echo site_url('admin/comunicaciones/usuarioDsegmento/'); ?>">
	<p><input name="hddn_segmento_id" type="hidden" value="<?php echo $segmento_id; ?>" /></p>
	<select name="slct_user_segmento[]" multiple="multiple" class="slct_segmento">
	<?php foreach($oSegmentos_usuarios as $userSeg) { ?>
		<option value="<?php echo $userSeg['id']; ?>"><?php echo $userSeg['username']; ?></option>
	<?php } ?>
	</select>
	<p><input type="submit" value="Remover usuarios del segmento" /></p>
	</form>	
</div>
<?php } ?>
<div class="clear"></div>
<div class="grid_12">
	<pre><?php //print_r($arrUsers); ?></pre>
</div>
