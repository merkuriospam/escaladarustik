<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>:: RUSTIK ::</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width">
	<link id="page_favicon" href="<?php echo img_url('favicon.ico'); ?>" rel="icon" type="image/x-icon" />
<?php 
	echo add_style('996/normalize','?modified='.rand(100000,1000000));
	echo add_style('996/base','?modified='.rand(100000,1000000));
	echo add_style('996/grid','?modified='.rand(100000,1000000));
	echo add_style('996/style','?modified='.rand(100000,1000000));
	echo add_style('996/main','?modified='.rand(100000,1000000));
	if (TRUE == isset($styles))
	{
		foreach((array)$styles as $k => $v)
		{
			echo add_style($v['stylesheet'], isset($v['attributes']) ? $v['attributes'] : '');
		}
	}
	if (isset($main_view) and file_exists(style_path($main_view)) and $main_view!="") {echo add_style_min($main_view);}	
?>
<?php echo $this->load->view('estilos_custom');?>
<?php
	echo add_jscript('996/modernizr-2.6.2.min');	
?>
</head>
<body>
<div id="main-container" class="container clearfix">
<?php echo $this->load->view('header_v2');?>
<?php if(isset($main_view)){ $this->load->view($main_view); } ?>
<?php echo $this->load->view('footer_v2');?>
</div>
<!-- end .container -->
<?php echo add_jscript('996/jquery.1.9.0.min'); ?>
<script>window.jQuery || document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"><\/script>')</script>
<script type="text/javascript">var BASE_URL = '<?php echo base_url(); ?>'; var SITE_URL = '<?php echo site_url(); ?>/';</script>
<?php 
	echo add_jscript('996/scripts','?modified='.rand(100000,1000000));
	echo add_jscript('996/plugins','?modified='.rand(100000,1000000));
	echo add_jscript('vendor/portamento-min','?modified='.rand(100000,1000000));
	echo add_jscript('996/main','?modified='.rand(100000,1000000));
	echo add_jscript('996/funciones_adicionales','?modified='.rand(100000,1000000));
?>
<?php 
	if (TRUE == isset($scripts))
	{
		foreach((array)$scripts as $k => $v)
		{
			echo add_jscript($v['javascript'], isset($v['attributes']) ? $v['attributes'] : '');
		}
	}
    if (isset($main_view) and file_exists(jscript_path($main_view)) and $main_view!="") {echo add_jscript_min($main_view);}
?>
<?php $this->trigger->fire('end_of_body'); ?>
<?php echo $this->load->view('fb_plugins.php');?>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-51558f324d8535a5"></script>
<?php echo $this->load->view('analytics.php');?>
</body>
</html>