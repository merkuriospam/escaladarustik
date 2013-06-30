<?php echo $this->load->view('main_menu');?>
	<div class="clear"></div>
	<div class="grid_6">
<div class="stylizedMail stylized myform">	

<h1>Registro</h1>
<p>Por favor, ingrese la información solicitada.</p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/create_user");?>

      <div class="dv_regis">
            Nombre: <br />
            <?php echo form_input($first_name);?>
      </div><div class="dv_regis">
            Apellido: <br /> 
            <?php echo form_input($last_name);?>
      </div><div class="dv_regis">
            Email: <br /> 
            <?php echo form_input($email);?>
      </div><div class="dv_regis">
            Password: <br /> 
            <?php echo form_input($password);?>
      </div><div class="dv_regis">
            Confirmar Password: <br />
            <?php echo form_input($password_confirm);?>
      </div><div class="dv_regis">
      	 <button type="submit">Registrarme</button>
      	<?php //echo form_submit('submit', 'Registrarme');?>
      </div>

<?php echo form_close();?>
</div>
</div>

	<div class="grid_6">&nbsp;</div>