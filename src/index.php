<?php require_once("../includes/initialize.php"); ?>
<?php
	
	//implement pagination
	$page = !empty($_GET['page'])? (int)$_GET['page'] : 1 ;
	$per_page = 1;
	$total_count = Photograph::count_all();

	$pagination = new Pagination($page, $per_page, $total_count);

	// Find all photos
	$sql = "SELECT * FROM tbl_photographs ";
	$sql .= "LIMIT {$per_page} ";
	$sql .= "OFFSET {$pagination->offset()}";
	$photos = Photograph::find_by_sql($sql);
?>

<?php include_layout_template('header.php'); ?>

<div class="container">
<?php echo $message; ?>
<h1>Photo List</h1>

<?php foreach($photos as $photo): ?>
  <div style="float: left; margin-left: 20px;">
		<a href="photo.php?id=<?php echo $photo->id; ?>">
			<img src="<?php echo $photo->image_path(); ?>" width="200" />
		</a>
    <p><?php echo $photo->caption; ?></p>
  </div>
<?php endforeach; ?>

<div style="clear: both;">

	<?php 
	if($pagination->total_pages() > 1){

		if($pagination->has_previous_page()){
			echo "<a href=\"index.php?page=".$pagination->previous_page()."\" >&laquo; Previous</a>";
		}

		for ($i=1; $i <= $pagination->total_pages() ; $i++) { 
			if($i == $page){
				echo "<span class=\"selected\"><a href=\"index.php?page={$i}\">{$i}</a></span> ";
			}else{
				echo "<a href=\"index.php?page={$i}\">{$i}</a> ";
			}
		}

		if($pagination->has_next_page()){
			echo "<a href=\"index.php?page=".$pagination->next_page()."\" > Next &raquo;</a>";
		}
	}else{

	}
	?>
</div>

 </div><!-- /.container -->

<?php include_layout_template('footer.php'); ?>
