<?php 
/* Name: Peter Pasieka
    Course: HND Computing Science
    Since: 29/04/2021
    Website Name: The Local Theatre
    Version: V1*/

/* This file is responsible for connecting to the database*/
	session_start();

	DEFINE ('DB_USER', 'IN19003934');                       
    DEFINE ('DB_PASSWORD','19003934');                        
    DEFINE ('DB_HOST', 'localhost');  
    DEFINE ('DB_NAME', 'IN19003934');                           
    @$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

    if (mysqli_connect_errno())
        {
        echo 'Error in connecting to the database: ' . mysqli_connect_error();
        }

	define ('ROOT_PATH', '/home/19003934/public_html/HND/Assessment 2/');
    define ('BASE_URL', 'https://comp-server.uhi.ac.uk/~19003934/HND/Assessment 2/');

?>