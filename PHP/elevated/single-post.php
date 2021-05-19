<?php  
/* Name: Peter Pasieka
    Course: HND Computing Science
    Since: 29/04/2021
    Website Name: The Local Theatre
    Version: V1*/

/* This file is responsible for showing the appropriate post and comments from
   the blog index page*/
	include('../includes/config.php'); 
    include('../elevatedFeatures/user_functions.php'); 
 
	if (isset($_GET['post-slug'])) {
		$post = getPost($_GET['post-slug']);
	}
	$topics = getAllTopics();
	// $comments = getBlogComments();

	// Kicks the user out if not logged in
	if(!isset($_SESSION["login"]) || $_SESSION["login"] !== true)
	{
		header("location:../../html/index.html");
		exit;
	}
?>

<DOCTYPE html>
<html>
	<head>
		<!-- Styling for public area -->
		<?php require_once('../includes/banner.php'); ?>
		<?php require_once('../elevatedFeatures/head_section.php') ?>
		<title> <?php echo $post['title'] ?> | The Local Theatre </title>
	</head>

	<body>

			<!-- Navbar -->
			<?php include('../elevatedFeatures/navbar.php'); ?>

			<div class="container">
				
				<div class="content" >
				<!-- Page wrapper -->
					<div class="post-wrapper">
						<!-- full post div -->
						<div class="full-post-div">
							<?php if ($post['published'] == false): ?>
								<h2 class="post-title">Sorry... This post has not been published</h2>
							<?php else: ?>
								<h2 class="post-title"><?php echo $post['title']; ?></h2>
								<div class="post-body-div">
									<?php echo html_entity_decode($post['body']); ?>
								</div>
							<?php endif ?>
						</div>
					<!-- // full post div -->
					
					<!-- comments section -->
					<blog-comments>
					<hr>
					<h3>Comments Section: </h3>
					<?php 
						include_once("../includes/config.php");

						$sql = "SELECT * FROM comments WHERE post_id = '".$post['id']."'";
						$result = mysqli_query($conn,$sql);
							
						while ($row = mysqli_fetch_assoc($result))
							{
						     	?>
									<td><?php echo $row['username']; ?> says:</td>
									<td><?php echo $row['comment']; ?> </td>
									<br>
								<?php
							}

					?>
							<blog-comments-box>
							<hr>
							<h2>Got something to add? </h2>
								<form method="post" action="../elevatedFeatures/post-comment.php">
									<input type="hidden" name="post-id" value="<?php echo $post['id'];?>"/>
									<textarea type="text" name="comment" placeholder="Comment here . . . " required></textarea>
									<button type="submit"> Post Comment </button>
								</form>
							</blog-comments-box>
					</blog-comments>

					
				</div>
				
			</div>
		</div>
	<!-- // content -->
	</body>

</html>