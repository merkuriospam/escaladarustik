<html>
<body>
	<h1>Pedido de Reset de password para <?php echo $identity;?></h1>
	<p>Por favor haga clic en el siguiente link para <?php echo anchor('auth/reset_password/'. $forgotten_password_code, 'Resetear su Password');?>.</p>
</body>
</html>