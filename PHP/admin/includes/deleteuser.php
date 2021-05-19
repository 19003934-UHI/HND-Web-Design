<?php
/* Name: Peter Pasieka
    Course: HND Computing Science
    Since: 29/04/2021
    Website Name: The Local Theatre
    Version: V1*/

/* This file is responsible for deleting a users account details*/

    require_once('../../includes/config.php');
    $id = $_GET['id'];

    // Delete user using the id from the user table in userlist
    $Query = "DELETE FROM users WHERE id = $id";

    $result = mysqli_query($conn, $Query);

    if($result)
    {
        header("Location:../userlist.php");
    } else {
        echo "There was an error deleting the user";
    }

?>