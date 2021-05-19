<!--
    Name: Peter Pasieka
    Course: HND Computing Science
    Since: 21/04/2021
    Website Name: The Local Theatre
    Version: V1
	Description: This file allows the user to pick which blog of theirs they would like to edit
-->

<?php 
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

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

		<?php require_once('../elevatedFeatures/user_functions.php') ?>
	
		<!-- Retrieve all posts from database  -->
		<?php $ownedposts = getOwnedPosts(); ?>
		<?php require_once('../elevatedFeatures/head_section.php') ?>
		<title>The Local Theatre | Blogs </title>
	</head>
	
	<body>

		<!-- container - wraps whole page -->
		
			<!-- banner -->
			<?php include('../includes/banner.php') ?>

			<!-- navbar -->
			<?php include('../elevatedFeatures/navbar.php') ?>
			
			<div class="container">
			<!-- Page content -->
			<div class="content">
				<h2 class="content-title">My Articles</h2>
				<hr>
			
					<?php foreach ($ownedposts as $ownedpost): ?>
					<div class="post" style="margin-left: 0px;">
						<img src="<?php echo BASE_URL . 'Images/' . $ownedpost['image']; ?>" class="post_image" alt="">
							<?php if (isset($ownedpost['topic']['name'])): ?>
								<a 
									href="<?php echo BASE_URL . 'filtered_posts.php?topic=' . $ownedpost['topic']['id'] ?>"
									class="btn category">
									<?php echo $ownedpost['topic']['name'] ?>
								</a>
							<?php endif ?>
						<a href="blog-update.php?post-id=<?php echo $ownedpost['id']; ?>">
							<div class="post_info">
								<td><?php echo $ownedpost['id']; ?> </td>
								<h3><?php echo $ownedpost['title'] ?></h3>
								<div class="info">
									<span><?php echo date("F j, Y ", strtotime($ownedpost["created_at"])); ?></span>
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