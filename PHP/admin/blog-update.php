<?php
  /* Name: Peter Pasieka
    Course: HND Computing Science
    Since: 29/04/2021
    Website Name: The Local Theatre
    Version: V1*/

/* This file is responsible for letting a user update one of their blogs*/
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

        <link rel="stylesheet" href="../../CSS/public_styling.css">
	    <meta charset="UTF-8">
		<title>The Local Theatre | Update a Blog </title>
    </head>
    
        <body>
    
           <!-- banner -->
			<?php include('../includes/banner.php') ?>

            <!-- navbar -->
            <?php include('../elevatedFeatures/navbar.php') ?>

            <!-- container - wraps whole page -->
            <div class = "container">

                <div class="content">

                    <h2 class="content-title">Update a Blog</h2>


                    <!-- Show the old blog here so that the user knows what they're editing -->
                    <h3> Your Blog Currently </h3>
                    <div class="row">
                        <div class="leftcolumn">
                          <div class="card">

                            <?php 
                                $post_id = $_GET['post-id'];

                                $sql = "SELECT title, slug, description, body FROM posts WHERE id = '$post_id'";
                                $result = mysqli_query($conn,$sql);
                                    
                                while ($row = mysqli_fetch_assoc($result))
                                    {
                                        ?>
                                            <h3><?php echo $row['title'];?></h3>
                                            <h5> Date Last Edited: <?php echo date("Y-m-d") ?></h5>
                                            <blog-description>
                                              <h4> <?php echo $row['body']; ?></h4>
                                            </blog-description>
                                        <?php
                                    }
                                ?>
                          </div>
                        </div>
                    </div>

                    <hr>
                    <h3> Your Current Changes </h3>
                    <div class="row">
                        <div class="leftcolumn">
                          <div class="card"> 
                          <?php $blog_id = $_GET['post-id']; ?>
                             <form method="post" action="../elevatedFeatures/update-blog.php?post-id=<?php echo $post_id; ?>">
                                <input type="text" id="blog-heading" name="blog-heading" placeholder="Blog Heading" maxlength="30" required/>
                                <blog-description>
                                    <textarea type="text" id="blog-text" name="blog-text" placeholder="..." required></textarea>
                                </blog-description>
                                <button type="submit" name ="post-blog" value="Post Blog"> Update Blog </button>
                              </form>
                          </div>
                        </div>
                 </div>
            </div>
    </body> 