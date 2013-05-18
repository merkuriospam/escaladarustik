	<?php $mi=1; foreach ($oGeneralContent as $entrada) { ?>
	<?php if ($mi==1) { ?><div class="clear"></div><?php } ?>
	<div class="grid_3 overlay_wrapper" onmouseover="$('#capgral_<?php echo $entrada->id; ?>').show();" onmouseout="$('#capgral_<?php echo $entrada->id; ?>').hide();" onclick="ir('<?php echo site_url('entradas/ver/'.$entrada->id); ?>')">
		<img class="lazy" data-original="<?php echo usrf_url('portadas/'.$entrada->img_portada_tn); ?>" src="<?php echo img_url('grey.gif'); ?>" />
	    <div class="description">  
	    	<?php $titulo = (substr($entrada->titulo, 0,4)=='nada')?substr($entrada->titulo, 5):$entrada->titulo; ?>
	        <p class="description_content titulo"><?php echo $titulo; ?></p>
	       <?php if(!empty($entrada->copete)) { ?><p id="capgral_<?php echo $entrada->id; ?>" class="description_content copete hide"><?php echo $entrada->copete; ?></p><?php } ?>
	    </div>			
	</div>
	<?php if ($mi<=3){$mi++;}else{$mi=1;} ?>
	<?php } ?>