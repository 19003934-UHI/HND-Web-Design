<?php
    /* Name: Peter Pasieka
        Course: HND Computing Science
        Since: 01/05/2021
        Website Name: The Local Theatre
        Version: V1*/

    /* This file is responsible for promoting a user to admin status*/
    require_once('../../includes/config.php');
    $id = $_GET['id'];

    // Delete user using the id from the user table in userlist
    $Query = "UPDATE users 
                SET role = 'Admin'
                WHERE id = $id";

    $result = mysqli_query($conn, $Query);

    if($result)
    {
        header("Location:../userlist.php");
    } else {
        echo "There was an error promoting the user";
    }
?>