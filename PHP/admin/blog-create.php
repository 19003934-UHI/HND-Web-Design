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
        if(!isset($_SESSION["ROLE"]) || $_SESSION["ROLE"] !== 'admin')
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

        <link rel="stylesheet" href="../../CSS/public_styling.css">
	    <meta charset="UTF-8">
		<title>The Local Theatre | Admin | Create a Blog </title>
    </head>
    
        <body>
    
           <!-- banner -->
			<?php include('../includes/banner.php') ?>

            <!-- navbar -->
            <?php include('includes/navbar.php') ?>

            <!-- container - wraps whole page -->
            <div class = "container">

                <div class="content">

                    <h2 class="content-title">Post an announcement</h2>

                    <div class="row">
                        <div class="leftcolumn">
                          <div class="card">
                             <form method="post" action="includes/post-blog.php">
                                <input type="text" id="announcement-heading" name="announcement-heading" placeholder="Announcement heading" maxlength="30" required/>
                                <h5> Date Last Edited: <?php echo date("Y-m-d") ?></h5>
                                    <img src="<?php echo BASE_URL . 'Images/' . $post['image']; ?>" class="post_image" alt="">
                                <blog-description>
                                    <textarea type="text" id="announcement-text" name="announcement-text" placeholder="Announcement in detail . . . " required></textarea>
                                </blog-description>

                                <button type="submit" name ="post-announcement" value="Post Announcement"> Post Annoucement </button>
                              </form>
                          </div>
                        </div>
                 </div>
            </div>
    </body> 
 <html>
 