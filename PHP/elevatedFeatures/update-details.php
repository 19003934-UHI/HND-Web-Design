<?php
/* Name: Peter Pasieka
    Course: HND Computing Science
    Since: 29/04/2021
    Website Name: The Local Theatre
    Version: V1*/

/* This file is responsible for updating a users account details*/

include("../includes/config.php");
    
    $UserID = $_SESSION["ID"];
    $Username = $_POST['uname'];
    $Password = $_POST['psw']; 
    $ConfirmPassword = $_POST['re_psw'];
    $Email = $_POST['email'];

    $Time = date("Y-m-d H:i:s");

        // Checks that a username has been posted, if true carry out account update
        if (isset($_POST['uname']))
        {
            $Username = $_POST['uname'];

            // Prepare Statement
            $stmt = $conn->prepare("UPDATE users
                                        SET username = ?,
                                            email = ?,
                                            password = ?,
                                            updated_at = ?
                                        WHERE id = ?");
            
            $stmt->bind_param("ssssi", $Username, $Email, $Password, $Time, $UserID);
            $stmt->execute();

            // Close statement and database connection
            $stmt->close();
            $conn->close();

            echo "<script>
                    alert('Your account has been updated')
                    window.history.go(-1);
                </script>";
        } else {
                echo "<script>
                        alert('There was an error updating your account, please try again later')
                        window.history.go(-1);
                    </script>";
        } 
?>
        