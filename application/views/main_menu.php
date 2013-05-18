	<div class="clear"></div>
	<div id="wrapper-main-menu" class="grid_12 push_12">
		<div class="grid_9 alpha">
			<?php echo $htmlMenu; ?> 		
		</div>
		<div class="grid_3 omega"> 
			<div id="wrapper-logo-mm">
				<a href="<?php echo site_url('home'); ?>">
				<?php if(isset($oLogoMenu->valor)) { ?>
				<img alt="" src="<?php echo usrf_url('portadas/'.$oLogoMenu->valor); ?>" />
				<?php } else { ?>
				<img alt="" src="<?php echo img_url('articulos/logo_header.png'); ?>" />
				<?php }?>
				</a>
			</div>
		</div> 
	</div>
	
	
	
	<div class="clear solomobile"></div>
	<div class="grid_12 solomobile">
		<a href="https://maps.google.com.ar/maps?q=Pasaje+Rufino+3086&hl=es-419&sll=-38.452918,-63.598921&sspn=37.248188,86.572266&hnear=Rufino+3086,+Villa+Urquiza,+Buenos+Aires&t=m&z=16">
			<img alt="" src="<?php echo img_url('articulos/gmap_238x150.gif'); ?>" />
		</a>
	</div>	
	<div class="clear solomobile"></div>
	<div class="grid_12 solomobile" style="width: 100%; text-align: center; margin: 18px 0; padding: 0; font-size: 1.5em">
		<?php echo $htmlMenuMobile; ?> 		
	</div>	
	<div class="clear solomobile"></div>
	<div id="wrapper-mobile-main-menu" class="grid_12">
			<a href="<?php echo site_url('home'); ?>">
			<?php if(isset($oLogoMenu->valor)) { ?>
			<img alt="" src="<?php echo usrf_url('portadas/'.$oLogoMenu->valor); ?>" />
			<?php } else { ?>
			<img alt="" src="<?php echo img_url('articulos/logo_header.png'); ?>" />
			<?php }?>
		</a> 
	</div>		