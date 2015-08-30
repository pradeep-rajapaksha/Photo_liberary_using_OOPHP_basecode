<?php

require_once("../../includes/initialize.php");

if(!$session->is_logged_in()){ redirect_to("login.php");} ?>

<?php include_layout_template("admin_header.php"); ?>
		<?php 
		// Create new User
		// $user = new User();
		// $user->username = "bandara";
		// $user->password = "bandara";
		// $user->firstname = "bandara";
		// $user->lastname = "bandara";
		// $user->create();


		// // update user
		// $user = User::find_by_id(1);
		// $user->firstname = "Nadeesha";
		// $user->save();

		// Delete users
		$user = User::find_by_id(20);
		$user->delete();
		
		?>
<?php include_layout_template("admin_footer.php"); ?>
