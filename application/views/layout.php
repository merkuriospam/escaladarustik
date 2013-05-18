<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>:: RUSTIK ::</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link id="page_favicon" href="<?php echo img_url('favicon.ico'); ?>" rel="icon" type="image/x-icon" />
<?php 
	/* STYLES */
	//echo add_style('normalize');
	//echo add_style('main');

	echo add_style('responsive-normalize');
	echo add_style('responsive-main');
	
	if (TRUE == isset($styles))
	{
		foreach((array)$styles as $k => $v)
		{
			echo add_style($v['stylesheet'], isset($v['attributes']) ? $v['attributes'] : '');
		}
	}
	//echo add_jscript('vendor/modernizr-2.6.2.min');	
	echo add_jscript('vendor/modernizr-2.6.2-respond-1.1.0.min');	
	
	if (isset($main_view) and file_exists(style_path($main_view)) and $main_view!="") {echo add_style_min($main_view);}      
?>	
    </head>
    <body>
        <!--[if lt IE 7]>
        	<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
	    <?php echo $this->load->view('header');?>
		<?php if(isset($main_view)){ $this->load->view($main_view); } ?>
		<?php echo $this->load->view('footer');?>
		<?php echo add_jscript('vendor/jquery-1.8.3.min'); ?>
		<script>window.jQuery || document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"><\/script>')</script>
		<?php 
			/* SCRIPTS */
			echo add_jscript('plugins');
			echo add_jscript('main');
			if (TRUE == isset($scripts))
			{
				foreach((array)$scripts as $k => $v)
				{
					echo add_jscript($v['javascript'], isset($v['attributes']) ? $v['attributes'] : '');
				}
			}
		    if (isset($main_view) and file_exists(jscript_path($main_view)) and $main_view!="") {echo add_jscript_min($main_view);}
		?>
		<script type="text/javascript">
		/*
			var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)}(document,'script'));
		*/
		</script>
		
   <script type="text/javascript">
  window.fbAsyncInit = function() {
	  //Initiallize the facebook using the facebook javascript sdk
     FB.init({ 
       appId:'<?php echo $this->config->item('appID'); ?>', // App ID 
	   cookie:true, // enable cookies to allow the server to access the session
       status:true, // check login status
	   xfbml:true, // parse XFBML
	   oauth : true //enable Oauth 
     });
   };
   (function(d){
           var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
           if (d.getElementById(id)) {return;}
           js = d.createElement('script'); js.id = id; js.async = true;
           js.src = "//connect.facebook.net/en_US/all.js";
           ref.parentNode.insertBefore(js, ref);
         }(document));
	//Onclick for fb login
 $('#facebook').click(function(e) {
    FB.login(function(response) {
	  if(response.authResponse) {
		  parent.location ='<?php echo site_url('fbci/fblogin'); ?>'; //redirect uri after closing the facebook popup
	  }
 },{scope: 'email,read_stream,publish_stream,user_birthday,user_location,user_work_history,user_hometown,user_photos'}); //permissions for facebook
});
   </script>		
	</body>
</html>