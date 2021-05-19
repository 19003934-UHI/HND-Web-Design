<?php
/* Name: Peter Pasieka
    Course: HND Computing Science
    Since: 29/04/2021
    Website Name: The Local Theatre
    Version: V1*/

/* This file is responsible for registering a users account details*/

        include("includes/config.php");

        $Username = $_POST['uname'];
        $Password = $_POST['psw']; 
        $Email = $_POST['email'];
        $Role = "User";
        $CanComment = "1";

        $Time = date("Y-m-d H:i:s");
        
        /* If a username has been posted
           carried out the INSERT, if not
           state there was an error creating
           the account.
        */
        if (isset($_POST['uname']))
        {
                $Username = $_POST['uname'];

                // Prepare statement
                $stmt = $conn->prepare("INSERT INTO users (username, email, role, password, created_at, updated_at, can_comment)
                                        VALUES (?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sssssss", $Username, $Email, $Role, $Password, $Time, $Time, $CanComment);
                $stmt->execute();

                // Close statement and database connection
                $stmt->close();
                $conn->close();

                echo "<script>
                        alert('Account creation successful, you may now login')
                        window.history.go(-1);
                        </script>";
                } else {
                echo "<script>
                        alert('There was an error creating your account, please try again later')
                        window.history.go(-1);
                        </script>";
        }
?>
        