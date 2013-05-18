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
	//echo add_style('996/normalize','?modified='.rand(100000,1000000));
	if (TRUE == isset($styles))
	{
		foreach((array)$styles as $k => $v)
		{
			echo add_style($v['stylesheet'], isset($v['attributes']) ? $v['attributes'] : '');
		}
	}
	if (isset($main_view) and file_exists(style_path($main_view)) and $main_view!="") {echo add_style_min($main_view);}	
?>
</head>
<body>
<?php if(isset($main_view)){ $this->load->view($main_view); } ?>
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
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-51558f324d8535a5"></script>
<?php echo $this->load->view('analytics.php');?>
</body>
</html>