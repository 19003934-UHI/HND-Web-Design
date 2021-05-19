<?php
/* Name: Peter Pasieka
    Course: HND Computing Science
    Since: 29/04/2021
    Website Name: The Local Theatre
    Version: V1*/

/* This file is responsible for letting a user create a blog*/
    include("../includes/config.php");
    
// Kicks the user out if not logged in
if(!isset($_SESSION["login"]) || $_SESSION["login"] !== true)
    {
        header("location:../../HTML/index.html");
        exit;
    }
           

?>

<!DOCTYPE HTML>

 <html>
    <head>
        <?php require_once('../includes/config.php') ?>

        <?php require_once('../includes/public_functions.php') ?>

        <?php require_once('../elevatedFeatures/head_section.php') ?>
		<title>The Local Theatre | Create a Blog </title>
    </head>
    
        <body>
    
           <!-- banner -->
			<?php include('../includes/banner.php') ?>

            <!-- navbar -->
            <?php include('../elevatedFeatures/navbar.php') ?>

            <!-- container - wraps whole page -->
            <div class = "container">

                <div class="content">

                    <h2 class="content-title">Create a Blog</h2>

                    <div class="row">
                        <div class="leftcolumn">
                          <div class="card">
                             <form method="post" action="../elevatedFeatures/post-blog.php">
                                <input type="text" id="blog-heading" name="blog-heading" placeholder="Blog Heading" maxlength="30" required/>
                                <input type="text" id="blog-description" name="blog-description" placeholder="Enter a short description of the review" required/>
                                <h5> Date Last Edited: <?php echo date("Y-m-d") ?></h5>
                                    <img src="<?php echo BASE_URL . 'Images/' . $post['image']; ?>" class="post_image" alt="">
                                <blog-description>
                                    <textarea type="text" id="blog-text" name="blog-text" placeholder="..." required></textarea>
                                </blog-description>

                                <button type="submit" name ="post-blog" value="Post Blog"> Post Blog </button>
                              </form>
                          </div>
                        </div>
                 </div>
            </div>
    </body> 
 <html>
 