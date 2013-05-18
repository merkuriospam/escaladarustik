	<div class="clear"></div>
	<div id="wrapper-main-menu" class="grid_12">
		<ul id="main-menu">
			<li><a href="<?php echo site_url('home'); ?>" target="_blank">Home</a></li>
			<?php foreach ($arrCategorias as $cat_id => $cat_nombre) {?>
			<li><a href="<?php echo site_url('admin/entradas/categoria/'.$cat_id); ?>"><?php echo $cat_nombre; ?></a></li>
			<?php }?>
			<li><a href="<?php echo site_url('admin/menu/'); ?>">Arbol Nav</a></li>
			<li><a href="<?php echo site_url('admin/backup/'); ?>">Backup</a></li>
			<li><a href="<?php echo site_url('admin/sistema/'); ?>">Sistema</a></li>
			<li><a href="<?php echo site_url('admin/dev/'); ?>">DEV</a></li>
			<li><a href="<?php echo site_url('auth/logout/'); ?>">Salir</a></li>		
		</ul>
	</div>