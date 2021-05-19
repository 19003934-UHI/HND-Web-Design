<?php
/* Name: Peter Pasieka
    Course: HND Computing Science
    Since: 29/04/2021
    Website Name: The Local Theatre
    Version: V1*/

/* This file is responsible for logging a user out, also destroys session*/
    session_start();
    $_SESSION = array();
    session_destroy();

    header("Location:../HTML/index.html");
?>