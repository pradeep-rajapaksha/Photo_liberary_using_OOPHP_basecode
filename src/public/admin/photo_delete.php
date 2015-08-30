<?php

require_once("../../includes/initialize.php");

if(!$session->is_logged_in()){ redirect_to("login.php");} ?>

<?php
if(empty($_GET['id'])){
	$session->message("No Photograph ID was provided");
	redirect_to('photos.php');
}

$photo = Photograph::find_by_id($_GET['id']);
if($photo && $photo->destory()){
	$session->message("Photograph {$photo->upload_image} deleted");
	redirect_to('photos.php');
}else{
	$session->message("Photograph could not be deleted");
	redirect_to('photos.php');
}
?>
		

<?php include_layout_template("admin_footer.php"); ?>
