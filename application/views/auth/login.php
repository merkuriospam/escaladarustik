<?php echo $this->load->view('main_menu');?>
	<div class="clear"></div>
	<div class="grid_6">
<div class="stylizedMail stylized myform">
		<h1>Ingresar con email</h1>
		<p>Por favor, ingrese su email y password a continuación</p>
			
		<div id="infoMessage"><?php echo $message;?></div>
		
		<?php echo form_open("auth/login");?>
		  	
		  <p>
		    <label for="identity">Email:</label>
		    <?php echo form_input($identity);?>
			<br />
		    <label for="password">Password:</label>
		    <?php echo form_input($password);?>
		 	<br />
		    <label for="remember">Recordarme:</label>
		    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
			<br />
		  	<button type="submit">Ingresar</button>
		  </p>
		    
		<?php echo form_close();?>
		
		<p><a href="<?php echo site_url('auth/forgot_password'); ?>">Olvide mi password</a>
			<br /><a href="<?php echo site_url('auth/create_user'); ?>">Quiero registrarme</a></p>			
</div>	
		
	</div>

	<div class="grid_6">
		<div class="stylizedFb stylized myform" style="text-align: center">
		<h1>Ingresar con Redes Sociales</h1>		
		<img id="facebook" style="cursor:pointer; width: 200px; height: 34px" src="<?php echo img_url('facebook.png'); ?>" />
		</div>
	</div>
