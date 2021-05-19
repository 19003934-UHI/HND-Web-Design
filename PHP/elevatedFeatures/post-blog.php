<?php
    /* Name: Peter Pasieka
        Course: HND Computing Science
        Since: 29/04/2021
        Website Name: The Local Theatre
        Version: V1*/

    /* This file is responsible for posting a blog which a standard User or Admin creates.*/
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Include database config file
    include("../includes/config.php");

    $BlogNameError = true;
    $BlogDescError = true;
    $BlogBodyError = true;

    // Grab variables from blog-create.php and set them as variables for SQL query
    if (isset($_POST['blog-heading'])) {
        $BlogName = $_POST['blog-heading'];    
        $BlogNameError = false;
    }
    
    if (isset($_POST['blog-description'])) {
        $BlogDesc = $_POST['blog-description'];   
        $BlogDescError = false; 
    }

    if (isset($_POST['blog-text'])) {
        $BlogBody = $_POST['blog-text'];
        $BlogBodyError = false;    
    }

    $User_ID = $_SESSION["ID"]; 
    $Time = date("Y-m-d H:i:s");
    $BlogSlug = "review-" . strtolower($BlogName);

    // Insert Query
    $Query = "INSERT INTO posts ( user_id, title, slug, image, description, body, published, created_at, updated_at)
     VALUES
         ('$User_ID', '$BlogName', '$BlogSlug', 'movie-review.jpg', '$BlogDesc', '$BlogBody', '1', '$Time', '$Time')"; 

    $Result = mysqli_query($conn,$Query);

    if(!$conn->query($Result)) {
        echo 'Error: ', $conn->error;
    }

    /* If result is true, redirect to blog-index with the new posted blog,
     else send back to blog-index with an error stating that the blog cannot be posted */
    if ($Result)
    {
        echo "<script>
                alert('Your blog has been posted, you'll be redirected to the blog index.')
             </script>";
        header("../elevated/blog-index.php");
    } else {
        echo "<script>
                alert('There was an error posting your blog, please try again.')
                // window.history.go(-1)
            </script>";
    }
?>
