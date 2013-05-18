<?php echo $this->load->view('admin_main_menu');?>
<form method="post" action="<?php echo site_url('admin/sistema/grabar_colores/'); ?>" />
<div class="clear"></div>
<div class="grid_12">
	<h2>Colores de la aplicación</h2>
</div>	
<div class="clear"></div>
<div class="grid_4" style="background-color: <?php echo $oColor_fondo->valor; ?>">
	<label>Fondo</label>
	<input type="text" id="colorFondo" name="colorFondo" value="<?php echo $oColor_fondo->valor; ?>" />
	<div id="pickerFondo"></div>
</div>
<div class="grid_4" style="background-color: <?php echo $oColor_contenedor->valor; ?>">
	<label>Contenedor</label>
	<input type="text" id="colorContenedor" name="colorContenedor" value="<?php echo $oColor_contenedor->valor; ?>" />
	<div id="pickerContenedor"></div>
</div>
<div class="grid_4" style="background-color: <?php echo $oColor_menu->valor; ?>">
	<label>Menu</label>
	<input type="text" id="colorMenu" name="colorMenu" value="<?php echo $oColor_menu->valor; ?>" />
	<div id="pickerMenu"></div>
</div>
<div class="clear"></div>
<div class="grid_12">
	<p><input type="submit" value="Grabar colores" /></p>
	<hr />
</div>
</form>

<form method="post" action="<?php echo site_url('admin/sistema/grabar_logo/'); ?>" enctype="multipart/form-data" />
<div class="clear"></div>
<div class="grid_12">
	<img style="width: 238px" src="<?php echo usrf_url('portadas/'.$oLogoMenu->valor); ?>" />
	<p><label>Imagen Logo (238x64px)</label><input type="file" name="logo_file" size="70" /></p>
	<p><input type="submit" value="Cargar Logo Menu" /></p>
	<hr />
</div>
</form>