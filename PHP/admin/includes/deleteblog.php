<?php
/* Name: Peter Pasieka
    Course: HND Computing Science
    Since: 29/04/2021
    Website Name: The Local Theatre
    Version: V1*/

/* This file is responsible for deleting a blog */

    require_once('../../includes/config.php');
    $id = $_GET['id'];

    // Delete Query 1
    $Query = "DELETE FROM comments WHERE post_id = $id";
    $deleteComments = mysqli_query($conn, $Query);

    // Delete Query 2
    $Query = "DELETE FROM posts WHERE id = $id";
    $deleteBlog = mysqli_query($conn, $Query);

    // If there are comments to delete on the blog, selects those comments
    if($deleteComments) {
        // Then attempts to delete the blog
        if($deleteBlog)
        {   echo "<script>
                        alert('Blog Successfully Deleted');
                        window.history.go(-1);
                </script>";
        } else {
            echo "<script>
                        alert('There was an error whilst carrying out the operation')
                        window.history.go(-1);
                </script>";
                    }
                }

?>