<?php 
/* Name: Peter Pasieka
    Course: HND Computing Science
    Since: 29/04/2021
    Website Name: The Local Theatre
    Version: V1*/

/* This file is responsible for letting an admin create a blog*/
    include("../includes/config.php");
    
// Kicks the user out if not logged in
if(!isset($_SESSION["login"]) || $_SESSION["login"] !== true)
    {
        header("location:../../HTML/index.html");
        exit;
    }
         
?>

<!DOCTYPE html>
<html>
	<head>
		<?php require_once('../includes/config.php') ?>

		<?php require_once('includes/admin_functions.php') ?>
	
		<!-- Retrieve all posts from database  -->
		<?php $adminposts = getAdminPosts(); ?>

		<link rel="stylesheet" href="../../CSS/public_styling.css">
	    <meta charset="UTF-8">
		<title>The Local Theatre | Admin Blogs </title>
	</head>
	
	<body>

		<!-- container - wraps whole page -->
            
            <!-- banner -->
            <?php include('../includes/banner.php') ?>

			<!-- navbar -->
			<?php include('includes/navbar.php') ?>
			
			<div class="container">
			<!-- Page content -->
			<div class="content">
				<h2 class="content-title">Admin Blogs</h2>
				<hr>
					<?php foreach ($adminposts as $adminpost): ?>
					<div class="post" style="margin-left: 0px;">
						<img src="<?php echo BASE_URL . 'Images/' . $adminpost['image']; ?>" class="post_image" alt="">
							<?php if (isset($adminpost['topic']['name'])): ?>
								<a 
									href="<?php echo BASE_URL . 'filtered_posts.php?topic=' . $adminpost['topic']['id'] ?>"
									class="btn category">
									<?php echo $adminpost['topic']['name'] ?>
								</a>
							<?php endif ?>
						<a href="blog-update.php?post-id=<?php echo $adminpost['id']; ?>">
							<div class="post_info">
								<td><?php echo $adminpost['id']; ?> </td>
								<h3><?php echo $adminpost['title'] ?></h3>
								<div class="info">
									<span><?php echo date("F j, Y ", strtotime($adminpost["created_at"])); ?></span>
									<span class="read_more">Read more...</span>
								</div>
							</div>
						</a>
					</div>
				<?php endforeach ?>
			</div>
			<!-- // Page content -->

			<!-- footer -->
			<?php include('../includes/footer.php') ?>
			<!-- // footer -->

		</div>
		<!-- // container -->
	</body>
</html>