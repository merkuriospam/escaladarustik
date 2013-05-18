
	<p><a href="<?php echo site_url('admin/entradas/'); ?>">Volver</a></p>
<?php
switch ($tipo_imagen) {
    case 'portada':
		?><img id="cropeame" src="<?php echo usrf_url('portadas/'.$oEntrada->img_portada); ?>" /><?php
        break;
    case 'slideshow':
        ?><img id="cropeame" src="<?php echo usrf_url('portadas/'.$oEntrada->img_slideshow); ?>" /><?php
        break;
    case 'adicional':
        ?><img id="cropeame" src="<?php echo usrf_url('portadas/'.$oImagen->path); ?>" /><?php
        break;
    default:
}
?>
<form method="post" class="coords">
	<label>X1 <input type="text" size="4" id="x1" name="x1" /></label>
	<label>Y1 <input type="text" size="4" id="y1" name="y1" /></label>
	<label>X2 <input type="text" size="4" id="x2" name="x2" /></label>
	<label>Y2 <input type="text" size="4" id="y2" name="y2" /></label>
	<label>W <input type="text" size="4" id="w" name="w" /></label>
	<label>H <input type="text" size="4" id="h" name="h" /></label>
	<input type="submit" name="submit" value="Recortar" />
</form>
<?php
switch ($tipo_imagen) {
    case 'portada':
		?><img src="<?php echo usrf_url('portadas/'.$oEntrada->img_portada_tn); ?>" /><?php
        break;
    case 'slideshow':
        ?><img src="<?php echo usrf_url('portadas/'.$oEntrada->img_slideshow_tn); ?>" /><?php
        break;
    case 'adicional':
        ?><img src="<?php echo usrf_url('portadas/'.$oImagen->path_tn); ?>" /><?php
        break;
    default:
}
?>



