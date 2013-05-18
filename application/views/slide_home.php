<?php if (count($oSlideShow)>0) {?>
	<div class="rslides_container grid_12">
		<ul class="rslides" id="slider1">
		  <?php foreach ($oSlideShow as $slide) {?>
		  	<li onmouseover="$('#cap_slide_<?php echo $slide->id; ?>').show();" onmouseout="$('#cap_slide_<?php echo $slide->id; ?>').hide();" onclick="ir('<?php echo site_url('entradas/ver/'.$slide->id); ?>')">
		  		<img alt="" src="<?php echo usrf_url('portadas/'.$slide->img_slideshow_tn); ?>" />
			    <div class="description">
			    	<?php $titulo = (substr($slide->titulo, 0,4)=='nada')?substr($slide->titulo, 5):$slide->titulo; ?>
			        <p class="description_content titulo_slide"><?php echo $titulo; ?></p>
			        <?php if(!empty($slide->copete)) { ?><p id="cap_slide_<?php echo $slide->id; ?>" class="description_content hide copete"><?php echo $slide->copete; ?></p><?php } ?> 
			    </div>				  
			</li>		  	
		  <?php } ?>			       		        
		</ul>
	</div>
<?php } ?>