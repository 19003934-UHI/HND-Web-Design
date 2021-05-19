<!--
    Name: Peter Pasieka
    Course: HND Computing Science
    Since: 21/04/2021
    Website Name: The Local Theatre
    Version: V1
	Description: This PHP file is the base of the blog, it shows the blogs currently uploaded and is accessible to either a guest or someone with an account.
-->
<?php 

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
		<?php $posts = getPublishedPosts(); ?>

		<link rel="stylesheet" href="../../CSS/public_styling.css">
		<title>The Local Theatre | Admin </title>
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
				<h2 class="content-title">Blog List</h2>
				<hr>
			
					<?php foreach ($posts as $post): ?>
					<div class="post" style="margin-left: 0px;">
						<td><a href="includes/deleteblog.php?id=<?php echo $post['id']; ?>">Delete Blog Post</a></td>
						<img src="<?php echo BASE_URL . 'Images/' . $post['image']; ?>" class="post_image" alt="">
							<?php if (isset($post['topic']['name'])): ?>
								<a 
									href="<?php echo BASE_URL . 'filtered_posts.php?topic=' . $post['topic']['id'] ?>"
									class="btn category">
									<?php echo $post['topic']['name'] ?>
								</a>
							<?php endif ?>
						<a href="single-post.php?post-slug=<?php echo $post['slug']; ?>">
							<div class="post_info">
								<h3><?php echo $post['title'] ?></h3>
								<div class="info">
									<span><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></span>
									<span class="read_more">Read more...</span>
								</div>
							</div>
						</a>
					</div>
				<?php endforeach ?>
			</div>
			<!-- // Page content -->

			

		</div>
		<!-- // container -->
	</body>
</html>
