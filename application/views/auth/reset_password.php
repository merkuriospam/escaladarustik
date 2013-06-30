<?php echo $this->load->view('main_menu');?>
	<div class="clear"></div>
	<div class="grid_6">
<div class="stylizedMail stylized myform">	
<h1>Cambiar Password</h1>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open('auth/reset_password/' . $code);?>
      
	<div class="dv_regis">
		Nueva Password (at menos <?php echo $min_password_length;?> caracteres): <br />
		<?php echo form_input($new_password);?>
	</div><div class="dv_regis">
		Confirmar Nueva Password: <br />
		<?php echo form_input($new_password_confirm);?>
	</div><div class="dv_regis">

	<?php echo form_input($user_id);?>
	<?php echo form_hidden($csrf); ?>

		<button type="submit">Cambiar</button>
		<?php //echo form_submit('submit', 'Change');?></p>
      </div>
<?php echo form_close();?>
</div>
</div>

	<div class="grid_6">&nbsp;</div>