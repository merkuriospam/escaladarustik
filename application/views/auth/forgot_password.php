<?php echo $this->load->view('main_menu');?>
	<div class="clear"></div>
	<div class="grid_6">
<div class="stylizedMail stylized myform">		
<h1>Olvide mi Password</h1>
<p>Por favor, ingrese su <?php echo $identity_label; ?> así podemos enviarle un email con instrucciones para resetear su password.</p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/forgot_password");?>

      <p>
      	<?php echo $identity_label; ?>: <br />
      	<?php echo form_input($email);?>
      <br />
      <button type="submit">Pedir Reset</button><?php //echo form_submit('submit', 'Submit');?></p>
      
<?php echo form_close();?>
</div>
</div>

	<div class="grid_6">&nbsp;</div>