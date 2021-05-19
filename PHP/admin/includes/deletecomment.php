<?php
    /* Name: Peter Pasieka
        Course: HND Computing Science
        Since: 01/05/2021
        Website Name: The Local Theatre
        Version: V1*/

    /* This file is responsible for deleting a users comment*/
    require_once('../../includes/config.php');
    $post_id = $_GET['id'];
    $comment = $_GET['comment'];

    $Query = "DELETE FROM comments WHERE comment = '$comment'";
    $result = mysqli_query($conn, $Query);
   
    if($result) {
        echo "<script>
                    alert('Comment Successfully Deleted');
                    window.history.go(-1);
              </script>";
    } else {
        echo "<script>
                    alert('There was an error whilst carrying out the operation')
                    window.history.go(-1);
             </script>";
    }

?>