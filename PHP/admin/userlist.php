<?php
/* Name: Peter Pasieka
    Course: HND Computing Science
    Since: 29/04/2021
    Website Name: The Local Theatre
    Version: V1*/

/* This file is responsible for letting an admin view and modify user accounts*/
    include("../includes/config.php");
    
// Kicks the user out if not logged in
if(!isset($_SESSION["login"]) || $_SESSION["login"] !== true)
    if(!isset($_SESSION["ROLE"]) || $_SESSION["ROLE"] !== 'admin')
    {
        header("location:../../HTML/index.html");
        exit;
    }
           
?>

<!DOCTYPE HTML>
 <html>
    <head>
        <style>
        table {
            border: 2px solid black;
            
            width: 100%;
            }

        th, td {
            padding: 6px;
            text-align: left;
            border-color: black;
            }
        </style>

        <?php require_once('../includes/public_functions.php') ?>
        <script type="text/javascript" src="../../JS/scripts.js"></script>
        <link rel="stylesheet" href="../../CSS/public_styling.css">
	    <meta charset="UTF-8">

        <script>
            // Script to detect if someones is trying to capture account details

                    // Add event listener on keydown
                    document.addEventListener('keydown', (event) => {
                        var name = event.key;
                        var code = event.code;
                        if (name === 'Control') {
                        // Do nothing.
                        return;
                        }
                        if (event.ctrlKey) {
                        alert(`Why were you trying to copy and paste everyone's details?`);
                        } else {
                        alert(`Okay you're just pressing random keys now.`);
                        }
                    }, false);
                    // Add event listener on keyup
                    document.addEventListener('keyup', (event) => {
                        var name = event.key;
                        if (name === 'Control') {
                        alert('You thought about copy and pasting didnt you?');
                        }
                    }, false);
                    </script>

		<title>The Local Theatre | Admin </title>
    </head>
    
        <body>
    
           <!-- banner -->
			<?php include('../includes/banner.php') ?>

            <!-- navbar -->
            <?php include('includes/navbar.php') ?>

            <!-- container - wraps whole page -->
            <div class = "container">

                <div class="content">

                    <h2 class="content-title">Current Users</h2>

                    <?php                     
                        $Query = "SELECT * FROM users ORDER BY role DESC";

                        $Result = mysqli_query($conn, $Query);
                        ?>
                        <table>
                             <tr>
                             <th> User ID </th>
                             <th> User Name </th>
                             <th> Email </th>
                             <th> Role </th>
                             <th> Password </th>
                             <th> Can Comment </th>
                             <th> Promote </th>
                             <th> Demote </th>
                             <th> Suspend User Message Privileges </th>
                             <th> Reset User Message Priviliges </th>
                             <th> Remove User </th>
                            </tr>
                        <?php
                            while ($row = mysqli_fetch_assoc($Result))
                            {
                                ?>
                                    <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td id='username'><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td id="role" ><?php echo $row['role']; ?></td>
                                    <td><?php echo $row['password']; ?></td>
                                    <td><?php echo $row['can_comment']; ?></td>
                                    <td><a href="includes/promoteuser.php?id=<?php echo $row['id']; ?>"> Promote </a></td>
                                    <td><a href="includes/demoteuser.php?id=<?php echo $row['id']; ?>"> Demote </a></td>
                                    <td><a href="includes/disable-user-comment.php?id=<?php echo $row['id']; ?>"> Suspend User </a></td>
                                    <td><a href="includes/enable-user-comment.php?id=<?php echo $row['id']; ?>"> Enable User </a></td>
                                    <td><a href="includes/deleteuser.php?id=<?php echo $row['id']; ?>"> Remove User</a></td>
                                    <tr>
                            <?php
                            }
                            ?>
                        </table>
                </div>
            </div>
    </body> 
 <html>