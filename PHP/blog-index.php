<!DOCTYPE html>
<!-- Name: Peter Pasieka
    Course: HND Computing Science
    Since: 29/04/2021
    Website Name: The Local Theatre
    Version: -->

<!-- This file is responsible for showing the user every single posted blog -->
<html>
	<head>
		<?php require_once('includes/config.php') ?>

		<?php require_once('includes/public_functions.php') ?>
	
		<!-- Retrieve all posts from database  -->
		<?php $posts = getPublishedPosts(); ?>

		<?php require_once('includes/head_section.php') ?>
		<title>The Local Theatre | Home </title>
	</head>
	
	<body>

		<!-- container - wraps whole page -->
		
			<!-- banner -->
			<?php include('includes/banner.php') ?>

			<!-- navbar -->
			<?php include('includes/navbar.php') ?>
			
			<div class="container">
			<!-- Page content -->
			<div class="content">
				<h2 class="content-title">Recent Articles</h2>
				<hr>
			
					<?php foreach ($posts as $post): ?>
					<div class="post" style="margin-left: 0px;">
						<img src="<?php echo BASE_URL . 'Images/' . $post['image']; ?>" class="post_image" alt="">
							<?php if (isset($post['topic']['name'])): ?>
								<a href="<?php echo BASE_URL . 'filtered_posts.php?topic=' . $post['topic']['id'] ?>"
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
