<?php  
/* Name: Peter Pasieka
    Course: HND Computing Science
    Since: 29/04/2021
    Website Name: The Local Theatre
    Version: V1*/

/* This file is responsible for redirecting the user away from the blog index page
   Shows the selected blog, with the appropriate article and comments*/
   
	include('includes/config.php'); 
    include('includes/public_functions.php'); 
 
	if (isset($_GET['post-slug'])) {
		$post = getPost($_GET['post-slug']);
	}
	$topics = getAllTopics();

?>

<DOCTYPE html>
<html>
	<head>
		<!-- Styling for public area -->
		<?php require_once('includes/banner.php'); ?>
		<?php include('includes/head_section.php'); ?>
		<title> <?php echo $post['title'] ?> | The Local Theatre </title>
	</head>

	<body>

			<!-- Navbar -->
			<?php include('includes/navbar.php'); ?>

			<div class="container"> <!-- container start -->
				<div class="content" > <!-- content start -->
					<div class="post-wrapper"> <!-- post-wrapper start -->
						<div class="full-post-div"> <!-- full-post start -->
							<?php if ($post['published'] == false): ?>
								<h2 class="post-title">Sorry... This post has not been published</h2>
							<?php else: ?>
								<h2 class="post-title"><?php echo $post['title']; ?></h2>
								<div class="post-body-div">
									<?php echo html_entity_decode($post['body']); ?>
								</div>
							<?php endif ?>
						</div><!-- full-post end -->
					
					<!-- Comments Section -->
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
								 <blog-comments-box>
								 	<hr>
									<?php echo $row['username']; ?> says:
									<td><?php echo html_entity_decode($row['comment']); ?><td> 
								</blog-comments-box>
								<?php
							} 
					?>
					</blog-comments>
				</div> <!-- post-wrapper end -->
			</div> <!-- content end -->
		</div> <!-- container end -->
	</body> <!-- body end -->
</html> <!-- HTML end -->