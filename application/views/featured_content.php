	<div class="clear"></div>
	<div class="grid_6" style="margin-bottom: 0">
		<?php if (isset($oFeaturedContent['1'])) { ?>
		<div class="grid_6 alpha overlay_wrapper" onmouseover="$('#cap_1').show();" onmouseout="$('#cap_1').hide();" onclick="ir('<?php echo site_url('entradas/ver/'.$oFeaturedContent['1']->id); ?>')">
			<img class="lazy" data-original="<?php echo usrf_url('portadas/'.$oFeaturedContent['1']->img_portada_tn); ?>" src="<?php echo img_url('grey.gif'); ?>" />
		    <div class="description">
		    	<?php $titulo = (substr($oFeaturedContent['1']->titulo, 0,4)=='nada')?substr($oFeaturedContent['1']->titulo, 5):$oFeaturedContent['1']->titulo; ?>
		        <p class="description_content titulo"><?php echo $titulo; ?></p>
		        <?php if(!empty($oFeaturedContent['1']->copete)) { ?><p id="cap_1" class="description_content copete hide"><?php echo $oFeaturedContent['1']->copete; ?></p><?php } ?> 
		    </div>	
		    <!--<iframe width="490" height="358" src="http://www.youtube.com/embed/v3nkzjACUG4" frameborder="0" allowfullscreen></iframe>-->
		</div>
		<?php } ?>
		<div class="clear"></div>	
		<div class="grid_6 alpha" style="margin-bottom: 0">
			<?php if (isset($oFeaturedContent['4'])) { ?>
			<div class="grid_3 alpha overlay_wrapper" onmouseover="$('#cap_4').show();" onmouseout="$('#cap_4').hide();" onclick="ir('<?php echo site_url('entradas/ver/'.$oFeaturedContent['4']->id); ?>')">
				<img class="lazy" data-original="<?php echo usrf_url('portadas/'.$oFeaturedContent['4']->img_portada_tn); ?>" src="<?php echo img_url('grey.gif'); ?>" />
				
			    <div class="description"> 
			    	<?php $titulo = (substr($oFeaturedContent['4']->titulo, 0,4)=='nada')?substr($oFeaturedContent['4']->titulo, 5):$oFeaturedContent['4']->titulo; ?>
			        <p class="description_content titulo"><?php echo $titulo; ?></p>
			        <?php if(!empty($oFeaturedContent['4']->copete)) { ?><p id="cap_4" class="description_content hide copete"><?php echo $oFeaturedContent['4']->copete; ?></p><?php } ?> 
			    </div>							
			</div>
			<?php } ?>
			<?php if (isset($oFeaturedContent['5'])) { ?>
			<div class="grid_3 omega overlay_wrapper" onmouseover="$('#cap_5').show();" onmouseout="$('#cap_5').hide();" onclick="ir('<?php echo site_url('entradas/ver/'.$oFeaturedContent['5']->id); ?>')">
				<img class="lazy" data-original="<?php echo usrf_url('portadas/'.$oFeaturedContent['5']->img_portada_tn); ?>" src="<?php echo img_url('grey.gif'); ?>" />
			    <div class="description">  
			    	<?php $titulo = (substr($oFeaturedContent['5']->titulo, 0,4)=='nada')?substr($oFeaturedContent['5']->titulo, 5):$oFeaturedContent['5']->titulo; ?>
			        <p class="description_content titulo"><?php echo $titulo; ?></p>
			        <?php if(!empty($oFeaturedContent['5']->copete)) { ?><p id="cap_5" class="description_content hide copete"><?php echo $oFeaturedContent['5']->copete; ?></p><?php } ?> 
			    </div>					
			</div>  
			<?php } ?>
		</div>    		
	</div>
	<div class="grid_6" style="margin-bottom: 0">
			<?php if (isset($oFeaturedContent['2'])) { ?>
			<div class="grid_3 alpha overlay_wrapper" onmouseover="$('#cap_2').show();" onmouseout="$('#cap_2').hide();" onclick="ir('<?php echo site_url('entradas/ver/'.$oFeaturedContent['2']->id); ?>')">
				<img class="lazy" data-original="<?php echo usrf_url('portadas/'.$oFeaturedContent['2']->img_portada_tn); ?>" src="<?php echo img_url('grey.gif'); ?>" />
			    <div class="description">  
			    	<?php $titulo = (substr($oFeaturedContent['2']->titulo, 0,4)=='nada')?substr($oFeaturedContent['2']->titulo, 5):$oFeaturedContent['2']->titulo; ?>
			        <p class="description_content titulo"><?php echo $titulo; ?></p>
			        <?php if(!empty($oFeaturedContent['2']->copete)) { ?><p id="cap_2" class="description_content hide copete"><?php echo $oFeaturedContent['2']->copete; ?></p><?php } ?> 
			    </div>					
			</div>
			<?php } ?>
			<?php if (isset($oFeaturedContent['3'])) { ?>			    
			<div class="grid_3 omega overlay_wrapper" onmouseover="$('#cap_3').show();" onmouseout="$('#cap_3').hide();" onclick="ir('<?php echo site_url('entradas/ver/'.$oFeaturedContent['3']->id); ?>')">
				<img class="lazy" data-original="<?php echo usrf_url('portadas/'.$oFeaturedContent['3']->img_portada_tn); ?>" src="<?php echo img_url('grey.gif'); ?>" />
			    <div class="description">
			    	<?php $titulo = (substr($oFeaturedContent['3']->titulo, 0,4)=='nada')?substr($oFeaturedContent['3']->titulo, 5):$oFeaturedContent['3']->titulo; ?>
			        <p class="description_content titulo"><?php echo $titulo; ?></p>
			        <?php if(!empty($oFeaturedContent['3']->copete)) { ?><p id="cap_3" class="description_content hide copete"><?php echo $oFeaturedContent['3']->copete; ?></p><?php } ?> 
			    </div>				
			</div>
			<?php } ?>
		<?php if (isset($oFeaturedContent['6'])) { ?>
		<div class="clear"></div>
		<div class="grid_3 alpha overlay_wrapper" style="margin-bottom: 0" onmouseover="$('#cap_6').show();" onmouseout="$('#cap_6').hide();" onclick="ir('<?php echo site_url('entradas/ver/'.$oFeaturedContent['6']->id); ?>')">
			<img class="lazy" data-original="<?php echo usrf_url('portadas/'.$oFeaturedContent['6']->img_portada_tn); ?>" src="<?php echo img_url('grey.gif'); ?>" />
		    <div class="description">
		    	<?php $titulo = (substr($oFeaturedContent['6']->titulo, 0,4)=='nada')?substr($oFeaturedContent['6']->titulo, 5):$oFeaturedContent['6']->titulo; ?>
		        <p class="description_content titulo"><?php echo $titulo; ?></p>
		        <?php if(!empty($oFeaturedContent['6']->copete)) { ?><p id="cap_6" class="description_content hide copete"><?php echo $oFeaturedContent['6']->copete; ?></p><?php } ?> 
		    </div>				
		</div>
		<?php } ?>
		<div class="grid_3 omega">
			<?php if (isset($oFeaturedContent['7'])) { ?>
			<div class="grid_3 alpha overlay_wrapper" style="margin-bottom: 0" onmouseover="$('#cap_7').show();" onmouseout="$('#cap_7').hide();" onclick="ir('<?php echo site_url('entradas/ver/'.$oFeaturedContent['7']->id); ?>')">
				<img class="lazy" data-original="<?php echo usrf_url('portadas/'.$oFeaturedContent['7']->img_portada_tn); ?>" src="<?php echo img_url('grey.gif'); ?>" />
			    <div class="description"> 
			    	<?php $titulo = (substr($oFeaturedContent['7']->titulo, 0,4)=='nada')?substr($oFeaturedContent['7']->titulo, 5):$oFeaturedContent['7']->titulo; ?>
			        <p class="description_content titulo"><?php echo $titulo; ?></p>
			        <?php if(!empty($oFeaturedContent['7']->copete)) { ?><p id="cap_7" class="description_content hide copete"><?php echo $oFeaturedContent['7']->copete; ?></p><?php } ?> 
			    </div>					
			</div>
			<?php } ?>
			<?php if (isset($oFeaturedContent['8'])) { ?>
			<div class="clear"></div>	
			<div class="grid_3 alpha overlay_wrapper" style="margin-bottom: 0" onmouseover="$('#cap_8').show();" onmouseout="$('#cap_8').hide();" onclick="ir('<?php echo site_url('entradas/ver/'.$oFeaturedContent['8']->id); ?>')">
				<img class="lazy" data-original="<?php echo usrf_url('portadas/'.$oFeaturedContent['8']->img_portada_tn); ?>" src="<?php echo img_url('grey.gif'); ?>" />
			    <div class="description">  
			    	<?php $titulo = (substr($oFeaturedContent['8']->titulo, 0,4)=='nada')?substr($oFeaturedContent['8']->titulo, 5):$oFeaturedContent['8']->titulo; ?>
			        <p class="description_content titulo"><?php echo $titulo; ?></p>
			        <?php if(!empty($oFeaturedContent['8']->copete)) { ?><p id="cap_8" class="description_content hide copete"><?php echo $oFeaturedContent['8']->copete; ?></p><?php } ?> 
			    </div>					
			</div>
			<?php } ?>		
		</div>
	</div> 