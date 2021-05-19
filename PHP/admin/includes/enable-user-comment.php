<?php
    /* Name: Peter Pasieka
        Course: HND Computing Science
        Since: 01/05/2021
        Website Name: The Local Theatre
        Version: V1*/

    /* This file is responsible for allowing the user to comment*/
    require_once('../../includes/config.php');
    $id = $_GET['id'];

    // Delete user using the id from the user table in userlist
    $Query = "UPDATE users 
                SET can_comment = '1'
                WHERE id = $id";

    $result = mysqli_query($conn, $Query);

    if($result)
    {
        echo "<script>
                alert('The user's commenting ability has been enabled')
            </script>";
            header("Location:../userlist.php");
    } else {
        echo "<script>
                alert('There was an issue enabling the user's ability to comment')
                window.history.go(-1);
            </script>";
    }

?>