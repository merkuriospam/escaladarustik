<?php echo $this->load->view('main_menu');?>
	<div class="clear"></div>
	<div class="grid_12">
<?php 
$ses_user=$this->session->userdata('User');
if(empty($ses_user))   {
	echo img_tag('facebook.png','id="facebook" style="cursor:pointer;float:left;margin-left:550px;"'); 
	//echo img(array('src'=>$base_url.'images/facebook.png','id'=>'facebook','style'=>'cursor:pointer;float:left;margin-left:550px;'));
} else {
	echo '<img src="https://graph.facebook.com/'. $ses_user['id'] .'/picture" width="30" height="30"/><div>'.$ses_user['name'].'</div>';
	echo '<a href="'.site_url('auth/logout/').'">Logout</a>';	
	//echo '<a href="'.$ses_user['logout'].'">Logout</a>';
}
?>
	</div>