<?php require_once("../includes/initialize.php"); ?>
<?php
	// Find photo
	if(empty($_GET['id'])) {
	    $session->message("No photograph ID was provided.");
	    redirect_to('index.php');
	  }
	$photo = Photograph::find_by_id($_GET['id']);
	if(!$photo) {
	    $session->message("The photo could not be located.");
	    redirect_to('index.php');
  	}

  	if(isset($_POST['submit'])){
  		$newComment = new Comment();
  		$newComment->photograph_id = $_GET["id"];
  		$newComment->author = $_POST["author"];
  		$newComment->body = $_POST["comment"];
  		if($newComment->save()){
  			$session->message("Your comment Save Successfully");
  			redirect_to('photo.php?id='.$_GET['id']);
  		}else{
  			$session->message("Comment could not be saved.");
  			redirect_to('photo.php?id='.$_GET['id']);
  		}
  	}

  	$commentList = Comment::find_comments_by_photo_id($_GET['id']);
?>

<?php include_layout_template('header.php'); ?>

<div class="container">

<a href="index.php">&laquo; Back</a><br />
<br />
<?php echo $message; ?>
<div style="margin: 20px">
	<img src="<?php echo $photo->image_path(); ?>" height="400">
</div>
<hr/>

<h4>Comments</h4>

<?php foreach ($commentList as $comment) { ?>
	<div style="margin: 5px">
		<div style="font-size: 11px;"><?php echo $comment->author;?> on <?php echo $comment->created; ?></div>
		<div><?php echo $comment->body; ?></div>
	</div>
<?php } ?>

<form method="POST">
	<p >Your Name: <input type="text" name="author" required class="form-control" placeholder="your Name"/></p>
	<p>Comment: <textarea required name="comment" class="form-control" placeholder="Comment"></textarea></p>
	<input type="submit" value="submit" name="submit"/>
</form>



 </div><!-- /.container -->

<?php include_layout_template('footer.php'); ?>
