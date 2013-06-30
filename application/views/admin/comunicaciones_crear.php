<style>
	/*#cke_mi-textarea{
		display:none;
	}*/
</style>
<?php echo $this->load->view('admin_main_menu');?>
<div class="clear"></div>
<div class="grid_12">
	<h1>Comunicaciones</h1>
	<p><a href="<?php echo site_url('admin/comunicaciones/listar'); ?>">Volver</a></p>
	<p>Estado: <strong><?php echo $arrEstCom[$oComunicacion->estado]; ?></strong></p>
	<form method="post" action="<?php echo site_url('admin/comunicaciones/editar/'.$id); ?>" />
		<label>Entrada</label>
		<select name="slct_entrada_id">
			<option value="0"<?php if($oComunicacion->entrada_id == '0') echo ' selected="selected"'; ?>>No utilizar entrada</option>
		<?php foreach($oEntradas as $oEntrada) {?>
			<option value="<?php echo $oEntrada->id; ?>"<?php if($oComunicacion->entrada_id == $oEntrada->id) echo ' selected="selected"'; ?>><?php echo $oEntrada->titulo; ?></option>		
		<?php } ?>
		</select>
		<label>Segmento Destino</label>
		<select name="slct_segmento_id">
			<option value="0"<?php if($oComunicacion->segmento_id == '0') echo ' selected="selected"'; ?>>No utilizar segmento</option>
		<?php foreach($oSegmentos as $oSegmento) {?>
			<option value="<?php echo $oSegmento->id; ?>"<?php if($oComunicacion->segmento_id == $oSegmento->id) echo ' selected="selected"'; ?>><?php echo $oSegmento->nombre; ?></option>		
		<?php } ?>
		</select>	
		<label>Usuario Destino</label>		
		<select name="slct_user_destino">
			<option value="0"<?php if($oComunicacion->usuario_id == '0') echo ' selected="selected"'; ?>>No utilizar usuario</option>
		<?php foreach($arrUsers as $user) { ?>
			<option value="<?php echo $user['id']; ?>"<?php if($oComunicacion->usuario_id == $user['id']) echo ' selected="selected"'; ?>><?php echo $user['username']; ?></option>
		<?php } ?>
		</select>				
		<label>Día-Hora de Salida</label>
		<input type="text" name="fecha_envio" value="<?php echo $oComunicacion->fecha_salida; ?>"><br />
		<label>Email Destino</label>
		<input type="text" name="destinatarios" value="<?php echo $oComunicacion->to; ?>" style="width:80%" /><br />
		<label>Asunto</label>
		<input type="text" name="npt_asunto" value="<?php echo $oComunicacion->asunto; ?>" style="width:80%" />


		
		<?php
		$js_adicional = '<script type="text/javascript">$(function(){$("*[name=fecha_envio]").appendDtpicker({"minute_interval": 10});});</script>	';
		$this->trigger->registerText('end_of_body',$js_adicional)
		?>
		<?php echo $fck1; ?>
		<input type="hidden" name="hddn_submit" value="grabar" />	
		<input type="submit" value="Grabar" />	
	</form>
<pre><?php //print_r($arrUsers); ?></pre>
</div>