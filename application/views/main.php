<?php 
$ses_user=$this->session->userdata('User');
if(empty($ses_user))   {
	echo img_tag('facebook.png','id="facebook" style="cursor:pointer;float:left;margin-left:550px;"'); 
	//echo img(array('src'=>$base_url.'images/facebook.png','id'=>'facebook','style'=>'cursor:pointer;float:left;margin-left:550px;'));
} else {
	echo '<img src="https://graph.facebook.com/'. $ses_user['id'] .'/picture" width="30" height="30"/><div>'.$ses_user['name'].'</div>';
	echo '<a href="'.site_url('fbci/logout/').'">Logout</a>';	
}
?>
<pre>
<? print_r($ses_user); ?>
</pre>
<div id="fb-root"></div>
