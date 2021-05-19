<?php

/* Name: Peter Pasieka
    Course: HND Computing Science
    Since: 29/04/2021
    Website Name: The Local Theatre
    Version: V1*/

/* This file is responsible for giving the admins a place to convieniently
   access web pages that only admins can use*/

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
        <?php require_once('../includes/config.php') ?>

        <?php require_once('../includes/public_functions.php') ?>

        <script type="text/javascript" src="../../JS/scripts.js"></script>
        <link rel="stylesheet" href="../../CSS/public_styling.css">
	    <meta charset="UTF-8">
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

                    <h2 class="content-title">Admin Dashboard</h2>

                    <a href="userlist.php">
                        <button> User List </button>
                    </a>

                    <a href="blog-list.php">
                        <button> Blog List </button>
                    </a>

                    <a href="admin-blogs.php">
                        <button> Admin Blogs </button>
                    </a>
                    
                    <a href="blog-create.php">
                        <button> Post an announcement </button>
                    </a>
                    
                    <a href="../logout.php">
                        <button> Logout </button>
                    </a>
                </div>

                <h2> Admin JavaScript Control Panel </h2>
            
                <button id="javascriptButton" onmouseover="this.innerHTML='You hovered over me!'" 
                                              onmouseout="this.innerHTML='You should click this'"   
                                              onclick="this.style.backgroundColor='blue'"> Click this button for a special effect </button>
            </div>
    </body> 
 <html>