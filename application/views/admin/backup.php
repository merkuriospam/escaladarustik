<?php echo $this->load->view('admin_main_menu');?>
<div class="clear"></div>
<div class="grid_12">
<p><a href="<?php echo site_url('admin/backup/db'); ?>">Backup Base de Datos</a></p>
<p><a href="<?php echo site_url('admin/backup/files'); ?>">Backup de Aplicación</a></p>
</div>