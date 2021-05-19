<?php
/* Name: Peter Pasieka
    Course: HND Computing Science
    Since: 29/04/2021
    Website Name: The Local Theatre
    Version: V1*/

/* This file is responsible for logging in a user*/

    include("includes/config.php");

        if (isset($_POST['uname'])) {
            $Username = $_POST['uname'];    
        }
        
        if (isset($_POST['psw'])) {
            $Password = $_POST['psw'];    
        }

        // Create a hash for the given password
        $hash = password_hash($Password, PASSWORD_DEFAULT);

        // Select query for user information
        $Query = "SELECT * FROM users WHERE Username = '$Username' AND Password = '$Password' LIMIT 1";

        $result = mysqli_query($conn, $Query);

        $numresults = mysqli_num_rows($result);

        /* If a result is found, a password check is performed
            where the selected password must match the hashed 
            password given from the login form. Assuming
            they are the same, fetch the user details and
            assign session variables so that they can be
            called throughout the users time on the website
        */
        if ($numresults == 1) 
        {
            if (password_verify($Password, $hash))
            {
                while($row = mysqli_fetch_array($result))
                {
                    // User data
                    $U_ID = $row['id'];
                    $U_Username = $row['username'];
                    $U_Email = $row['email'];
                    $U_Role = $row['role'];
                }

                session_start();

                // Store user details for sessions
                $_SESSION["login"] = true;
                $_SESSION["ID"] = $U_ID;
                $_SESSION["ROLE"] = $U_Role;
                $_SESSION["USER"] = $U_Username;
                $_SESSION["EMAIL"] = $U_Email;

            } else {
                echo "<script>
                        alert('Your passwords don't match. Please try again.')
                        window.history.go(-1);
                    </script>";
            }
            
        }

        /*
            User successfully logins in, goes to their account page
            Admin successfully logins in, goes to the admin dashboard
            If the user or admin cannot login, go back to login page
        */
        if (isset($_SESSION['login']))
        {
            switch($_SESSION["ROLE"])
            {
                case "Admin":
                    header("Location:admin/dashboard.php");
                    break;

                case "User":
                    header("Location:elevated/myaccount.php");
                    break;
            }
        } else {

            echo "<script>
                        alert('There was an error accessing your account.')
                        window.history.go(-1);
                    </script>";
            header("Location:../HTML/login.html");
        }

?>