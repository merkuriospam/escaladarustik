<?php echo $this->load->view('admin_main_menu');?>
<div class="clear"></div>
<div class="grid_12">
	<h1>Tecnologías Utilizadas</h1>
	<h2 style="text-align: left; margin-left: 16px">Infraestructura</h2>
	<ul>
		<li><a href="http://www.linux.org/" target="_blank">Linux</a></li>
		<li><a href="http://www.apache.org/" target="_blank">Apache Server</a></li>
		<li><a href="http://php.net/" target="_blank">PHP: Hypertext Preprocessor</a></li>
		<li><a href="http://www.mysql.com/" target="_blank">MySQL Database</a></li>
	</ul>	
	
	<h2 style="text-align: left; margin-left: 16px">PHP</h2>
	<ul>
		<li><a href="<?php echo base_url('user_guide'); ?>" target="_blank">CodeIgniter Framework (User Guide)</a></li>
	</ul>
	<h2 style="text-align: left; margin-left: 16px">Javascript</h2>
	<ul>
		<li><a href="http://jquery.com/" target="_blank">Jquery</a></li>
		<li><a href="http://modernizr.com/" target="_blank">Modernizr</a></li>
		<li><a href="http://996grid.com/" target="_blank">996 Responsive Grid</a></li>
		<li><a href="http://www.appelsiini.net/projects/lazyload" target="_blank">Lazy Loading Images</a></li>	
		<li><a href="http://responsive-slides.viljamis.com/" target="_blank">Responsive Slide Show</a></li>
		<li><a href="http://iosscripts.com/iosslider/" target="_blank">Responsive Carousel</a></li>
		<li><a href="http://acko.net/blog/farbtastic-jquery-color-picker-plug-in/" target="_blank">Farbtastic Color Picker</a></li>
		<li><a href="http://ckeditor.com/" target="_blank">Ckeditor</a></li>
		<li><a href="http://cksource.com/ckfinder" target="_blank">Ckfinder</a></li>
	</ul>	

	<p>Main Config path: '/application/config/config.php'</p>
	<pre>
		$config['base_url']	= 'http://localhost/escaladarustik/';
		$config['index_page'] 	= 'index.php';
	</pre>	
	<p>DB path: '/application/config/database.php'</p>
	<pre>
		$db['default']['username'] = 'root';
		$db['default']['password'] = '';
		$db['default']['database'] = 'merkuri2_escaladarustik';
	</pre>	
	<p>Assets path: '/application/config/asset.php'</p>
	<pre>
		$config['common_path'] = "http://www.merkurio.com.ar/escaladarustik";
	</pre>	
	<h2 style="text-align: left; margin-left: 16px"><a href="<?php echo site_url('admin/backup/db'); ?>">Backup Base de Datos</a></h2>
	<h2 style="text-align: left; margin-left: 16px"><a href="<?php echo site_url('admin/backup/files'); ?>">Backup de Aplicación</h2>
	<h2 style="text-align: left; margin-left: 16px"><a href="<?php echo site_url('admin/dev/changeLog'); ?>">Changelog</h2>
		
	<h2 style="text-align: left; margin-left: 16px">Facebook APP</h2>
	<ul>
		<li><a href="https://developers.facebook.com/apps/543710738973597" target="_blank">https://developers.facebook.com/apps/543710738973597</a></li>
	</ul>	
	<h2 style="text-align: left; margin-left: 16px">Estadísticas</h2>
	<ul>
		<li><a href="https://www.google.com/analytics/web/" target="_blank">Google Analytics - escaladarustiksite@gmail.com</a></li>
		<li><a href="http://www.addthis.com/" target="_blank">Add This - escaladarustiksite@gmail.com</a></li>
	</ul>	
	<h2 style="text-align: left; margin-left: 16px">Sistemas de monitoreo</h2>
	<ul>
		<li><a href="http://www.siteuptime.com" target="_blank">Site Up Time - escaladarustiksite@gmail.com</a></li>
		<li><a href="http://www.uptimerobot.com" target="_blank">Up Time Robot - escaladarustiksite@gmail.com</a></li>
	</ul>
</div>