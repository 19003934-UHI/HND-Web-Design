<?php
    /* Name: Peter Pasieka
        Course: HND Computing Science
        Since: 29/04/2021
        Website Name: The Local Theatre
        Version: V1*/

    /* This file is responsible for updating a blog which a standard User or Admin creates.*/

    // Include database config file
    include("../includes/config.php");

    // Checks if these blog variables have been passed through
    $BlogNameError = true;
    $BlogDescError = true;
    $BlogBodyError = true;

    $blog_id = $_GET['post-id'];

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

    // Assign additional variables
    $User_ID = $_SESSION["ID"]; 
    $Time = date("Y-m-d H:i:s");
    $BlogSlug = "review-" . strtolower($BlogName);

    // Prepare UPDATE statement
    $stmt = $conn->prepare("UPDATE posts
                                SET title = ?,
                                    slug = ?, 
                                    description = ?,
                                    body = ?,
                                    updated_at = ?
                                WHERE id = ?");
    
    $stmt->bind_param("sssssi", $BlogName, $BlogSlug, $BlogDesc, $BlogBody, $Time, $blog_id);
    $stmt->execute();

    // Close statement and database connection
    $stmt->close();
    $conn->close();

    // Only carried out if login is verified
    if(isset($_SESSION['login']))
    {
        /* if the login is verified,
           next action is dependant on the account role.
           If the account is an Admin, send them to the admin blogs page
           and if they're a User, send them back to the previous blog edit page.
           Else state there was an error and send them back to the previous page.
        */
        switch($_SESSION["ROLE"])
        {
            case "Admin":
                echo "<script>
                        alert('You've successfully updated your blog, you'll be redirected to the Your Blog page.')
                    </script>";
                    header("Location:../admin/admin-blogs.php"); 
                    break;
            
            case "User":
                echo "<script>
                        alert('You've successfully updated your blog, you'll be redirected to the Your Blog page.')
                    </script>";
                    header("Location:../elevated/blog-edit.php");
                    break;
        }
    } else {
        echo "<script>
                alert('There was an error updating your blog, please try again.')
                window.history.go(-1);
            </script>";
    }

?>
