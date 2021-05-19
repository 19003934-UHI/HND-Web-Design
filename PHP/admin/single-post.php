<?php  
/* Name: Peter Pasieka
    Course: HND Computing Science
    Since: 29/04/2021
    Website Name: The Local Theatre
    Version: V1*/

/* This file is responsible for showing the appropriate post and comments from
   the blog index page*/

	include('../includes/config.php'); 
    include('includes/admin_functions.php'); 
	
	// Kicks the user out if not logged in
	if(!isset($_SESSION["login"]) || $_SESSION["login"] !== true)
	if(!isset($_SESSION["ROLE"]) || $_SESSION["ROLE"] !== 'admin')
	{
		header("location:../../HTML/index.html");
		exit;
	}
	  
	if (isset($_GET['post-slug'])) {
		$post = getPost($_GET['post-slug']);
	}
	$topics = getAllTopics();
?>

<DOCTYPE html>
<html>
	<head>
		
		<link rel="stylesheet" href="../../CSS/public_styling.css">
		<meta charset="UTF-8">
		<title> <?php echo $post['title'] ?> | The Local Theatre </title>
	</head>

	<body>

			<!-- banner -->
			<?php include('../includes/banner.php') ?>

			<!-- navbar -->
			<?php include('includes/navbar.php') ?>

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
										<td><a href="includes/deletecomment.php?id=<?php echo $post['id'];?> &comment=<?php echo $row['comment'];?>"> Delete Comment </a></td>
									</blog-comments-box>
								<?php
							}

					?>
					</blog-comments>


					
				</div>
				
			</div>
		</div>
	<!-- // content -->
	</body>

</html>