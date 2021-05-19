<?php
    /* Name: Peter Pasieka
        Course: HND Computing Science
        Since: 02/05/2021
        Website Name: The Local Theatre
        Version: V1*/

    /* This file is responsible for posting a blog which a standard User or Admin creates.*/

    ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

    // Include database config file
    include("../../includes/config.php");

    $AnnounceNameError = true;
    $AnnounceBodyError = true;

    // Grab variables from blog-create.php and set them as variables for SQL query
    if (isset($_POST['announcement-heading'])) {
        $AnnounceName = $_POST['announcement-heading'];    
        $AnnounceNameError = false;
    }
    

    if (isset($_POST['announcement-text'])) {
        $AnnounceBody = $_POST['announcement-text'];
        $AnnounceBodyError = false;    
    }

    // Checks that all fields have been entered
    if ($AnnounceNameError = true) {
        echo "<script>
                alert('There was an error posting your blog, please try again.')
            </script>";
        header("Location:../blog-create.php");
    } else if ($AnnounceBodyError = true) {
        echo "<script>
                alert('There was an error posting your blog, please try again.')
             </script>";
        header("Location:../blog-create.php");
    } else {

    }

    $User_ID = $_SESSION["ID"]; 
    $Time = date("Y-m-d H:i:s");
    $AnnounceSlug = "review-" . strtolower($AnnounceName);

    // Insert Query
    $Query = "INSERT INTO posts ( user_id, title, slug, image, body, published, created_at, updated_at)
        VALUES
            ('$User_ID','$AnnounceName','$AnnounceSlug', 'blog-announce.jpg', '$AnnounceBody', '1', '$Time', '$Time')"; 

    $Result = mysqli_query($conn,$Query);

    /* If result is true, redirect to blog-index with the new posted blog,
     else send back to blog-index with an error stating that the blog cannot be posted */
    if ($Result)
    { echo "<script>
                alert('Your blog has been posted.')
            </script>";
        header("Location:../dashboard.php");
    } else {
        echo "<script>
              alert('There was an error posting your blog, please try again.')
         </script>";
        header("Location:../dashboard.php");
    }
?>
