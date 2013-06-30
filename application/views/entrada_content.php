
	<div class="clear"></div>
	<div class="grid_9">
		<?php if ($oEntrada->mostrar_img_portada == '1') { ?>
			<?php if (substr($oEntrada->titulo, 0, 4) != 'nada') { ?>
			<div class="grid_5 alpha">
				<p class="titulo_entrada"><?php echo $oEntrada->titulo; ?></p>	
			</div>
			<div class="grid_4 omega">
				<img class="lazy" data-original="<?php echo usrf_url('portadas/'.$oEntrada->img_portada_tn); ?>" src="<?php echo img_url('grey.gif'); ?>" />
			</div>
			<?php } else { ?>
			<div class="grid_9 alpha">
				<img class="lazy" data-original="<?php echo usrf_url('portadas/'.$oEntrada->img_portada_tn); ?>" src="<?php echo img_url('grey.gif'); ?>" />
			</div>			
			<?php } ?>	
		<?php } else { ?>
			<?php if (substr($oEntrada->titulo, 0, 4) != 'nada') { ?>
			<div class="grid_9 alpha">
				<p class="titulo_entrada"><?php echo $oEntrada->titulo; ?></p>	
			</div>
			<?php } ?>			
		<?php } ?>
		<div class="grid_9 alpha">
			<?php if ($oEntrada->copete != '') { ?><p class="copete_entrada"><?php echo $oEntrada->copete; ?></p><?php } ?>
			<?php if ($oEntrada->cuerpo != '') { ?><div class="cuerpo_entrada"><?php echo $oEntrada->cuerpo; ?></div><?php } ?>
			<?php if (!empty($oImagenes)) { ?>			
				<?php $stc = ''; if ($oEntrada->carrousel == '1') { $stc = 'slide'; ?>
				<span id="prevSlide">Anterior -</span><span id="nextSlide"> Siguiente</span>
				<div class='iosSliderEntrada'><div class='slider'>
				<?php } ?>
				<?php foreach($oImagenes as $imagen) { ?>
					<div class="grid_3 omega overlay_wrapper <?php echo $stc; ?>">
						<a href="<?php echo site_url('entradas/modal/'.$imagen->id); ?>" data-fancybox-type="ajax" class="various fancybox.ajax">
							<img class="lazy" data-original="<?php echo usrf_url('portadas/'.$imagen->path_tn); ?>" src="<?php echo img_url('grey.gif'); ?>" />
						</a>
						<!--<div id="basic-modal-<?php echo $imagen->id; ?>">
							<div class="modal_titulo"><?php echo $imagen->titulo; ?></div>
							<div class="modal_imagen"><img src="<?php echo usrf_url('portadas/'.$imagen->path); ?>" /></div>
							<div class="modal_copete"><?php echo $imagen->copete; ?></div>	
						</div>-->							
						<!--<img class="lazy" data-original="<?php echo usrf_url('portadas/'.$imagen->path_tn); ?>" src="<?php echo img_url('grey.gif'); ?>" />-->
						<?php if ((isset($imagen->titulo)) and ($imagen->titulo != '')) { ?>
					    <div class="description">  
					        <p class="description_content titulo"><?php echo $imagen->titulo; ?></p>
					    </div>
					    <?php } ?>
					</div>
				<?php } ?>
				<?php if ($oEntrada->carrousel == '1') { ?>
				</div></div>
				<?php } ?>
			<?php } ?>			
		<?php if ($oEntrada->mostrar_share == '1') { ?>
			<div class="clear"></div>
			<!-- AddThis Button BEGIN -->
			<div class="addthis_toolbox addthis_default_style" style="margin: 10px 0">
				<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
				<a class="addthis_button_tweet"></a>
				<a class="addthis_button_pinterest_pinit"></a>
				<a class="addthis_counter addthis_pill_style"></a>
			</div>
			<!-- AddThis Button END -->			
		<?php } ?>		
		</div>	
	</div>
	<!--<div class="grid_1">
		<div class="addthis_toolbox addthis_floating_style addthis_counter_style">
		<a class="addthis_button_facebook_like" fb:like:layout="box_count"></a>
		<a class="addthis_button_tweet" tw:count="vertical"></a>
		<a class="addthis_button_google_plusone" g:plusone:size="tall"></a>
		<a class="addthis_counter"></a>
		</div>
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-51558f324d8535a5"></script>	
	</div>-->
	<div class="grid_3" style="text-align: right">
		<div class="fb-like-box" data-href="http://www.facebook.com/pages/Escalada-Rustik/279547605510546" data-width="243" data-height="500" data-show-faces="true" data-stream="false" data-header="false"></div>		
	</div>	
	<?php if ($oEntrada->comentar == '1') { ?>
	<div class="clear"></div>
	<div class="grid_12">
		<div class="fb-comments" data-href="<?php echo site_url('entradas/ver/').'/'.$oEntrada->id; ?>" data-width="470" data-num-posts="10"></div>
		<!--<div class="fb-comments" data-href="http://www.facebook.com/pages/Escalada-Rustik/279547605510546" data-width="740" data-num-posts="10"></div>-->
	</div>
	<?php } ?>