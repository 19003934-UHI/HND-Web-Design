<?php
/* Name: Peter Pasieka
    Course: HND Computing Science
    Since: 29/04/2021
    Website Name: The Local Theatre
    Version: V1*/

/* This file is responsible for posting a users comment*/
    include("../includes/config.php");

    // Assign variables from previous page and session
    $PostID = $_POST['post-id'];
    $UserID = $_SESSION["ID"];
    $Username = $_SESSION["USER"];

    if (isset($_POST['comment'])) {
        $PostComment = $_POST['comment'];    
    }

    // Select statement
    $query = "SELECT can_comment FROM users WHERE id = $UserID AND can_comment = 1 LIMIT 1";
    $result = mysqli_query($conn, $query);

    /* While loop
        Used so that so long as the user has the ability to
        comment within this file, to carry out the INSERT query
        to register the comment in the database.*/ 
    while ($row = mysqli_fetch_array($result))
    {
        $canComment = $row['can_comment'];
        // If the user can comment, INSERT the comment into the 'comments' table
        if($canComment == 1)
            {
                $Query = "INSERT INTO comments (post_id, user_id, username, comment)
                    VALUES
                        ('$PostID', '$UserID', '$Username', '$PostComment')";

                    $result = mysqli_query($conn, $Query);

                    if ($result) {
                        echo "<script>
                                window.history.go(-1);
                            </script>";
                    } else {
                        echo "<script>
                                alert('There was an error whilst carrying out the operation')
                                window.history.go(-1);
                            </script>";
                    } // end inner elseif
                
            } else {
            echo "<script>
                        alert('It appears you've been suspended due to a violation of our terms and conditions. You'll be returned to the previous page and your comment will not be posted.')
                        window.history.go(-1);
                    </script>";
            } // end outer elseif
    } // end while loop

  

?>