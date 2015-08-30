<?php

require_once("../../includes/initialize.php");

if(!$session->is_logged_in()){ redirect_to("login.php");} ?>

<?php include_layout_template("admin_header.php"); ?>
		<h2>Menu</h2>
		<ul>
			<li><a href="logout.php">Logout</a></li>
		</ul>
		<h3>Photo List</h3>
		<?php 

		$photoList = Photograph::find_all();

		echo output_message($message);

	 	if(sizeof($photoList)>0){
	 	?>
			<table border="1">
				<tr>
					<td>Image</td>
					<td>File Name</td>
					<td>Caption</td>
					<td>Size</td>
					<td>Type</td>
					<td></td>
				</tr>
			
			<?php 
			

			foreach ($photoList as $photo) {?>
				<tr>
					<td><img height="100" src="../<?php echo $photo->image_path(); ?>"/></td>
					<td><?php echo $photo->upload_image; ?></td>				
					<td><?php echo $photo->caption; ?></td>				
					<td><?php echo round($photo->size/1024); ?> Kb</td>				
					<td><?php echo $photo->type; ?></td>				
					<td><a href="photo_delete.php?id=<?php echo $photo->id?>">Delete</a></td>				
				</tr>
			
			<?php 
			}
			?>
			</table>
		<?php 
		} else { 
		?>
			<p>No Images can be found</p>
		<?php 
		} 
		?> 

		<a href="photo_upload.php">Upload Photo</a>
<?php include_layout_template("admin_footer.php"); ?>
