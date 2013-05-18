<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>
<body>
	<p><a href="<?php echo base_url('index.php/admin/entradas/'); ?>">Volver</a></p>	
	<form method="post" enctype="multipart/form-data" />
	<p>Título<input type="text" name="titulo" id="titulo" size="100" value="<?php echo $oEntrada->titulo; ?>" /></p>
	<p>Copete<input type="text" name="copete" id="copete" size="100" value="<?php echo $oEntrada->copete; ?>" /></p>
	<p>Orden<input name="orden" type="text" value="<?php echo $oEntrada->orden; ?>" /></p>
	<p>Imagen principal <input type="file" name="userfile" size="70" /></p>
	<p>Imagen Slideshow <input type="file" name="userfile2" size="70" /></p>
	<p>Categoria<select name="categoria" id="categoria">
	<?php foreach ($categorias as $categoria) {?>
	<option value="<?php echo $categoria->id; ?>" <?php echo ($oEntrada->categoria_id==$categoria->id)?' selected="selected"':''; ?>><?php echo $categoria->nombre; ?></option>
	<?php }?>
	</select></p>
	<?php echo $fck1; ?>
	<p><img width="200" src="<?php echo usrf_url('portadas/'.$oEntrada->img_portada); ?>" /></p>
	<p><img width="200" src="<?php echo usrf_url('portadas/'.$oEntrada->img_slideshow); ?>" /></p>
	<p><input type="submit" value="Submit" /></p>	
	</form>	
</body>
</html>