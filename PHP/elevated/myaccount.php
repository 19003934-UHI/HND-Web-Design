<?php
/* Name: Peter Pasieka
    Course: HND Computing Science
    Since: 29/04/2021
    Website Name: The Local Theatre
    Version: V1*/

/* This file is responsible for showing the user their account details
   and more recently edited blog. The user can also update their
   account details here. */
   
    include("../includes/config.php");
    
// Kicks the user out if not logged in
if(!isset($_SESSION["login"]) || $_SESSION["login"] !== true)
    {
        header("location:../../HTML/index.html");
        exit;
    }
 
    $Time = date("Y-m-d H:i:s");
?>

<!DOCTYPE html>
<html>
	<head>
        <?php require_once('../elevatedFeatures/user_functions.php') ?>

		<!-- Retrieve all posts from database  -->
		<?php $recentposts = getRecentPosts(); ?>

        <?php require_once('../elevatedFeatures/head_section.php') ?>
		<title>The Local Theatre | My Account </title>
	</head>
	
	<body>

		<!-- container - wraps whole page -->
		
			<!-- banner -->
			<?php include('../includes/banner.php') ?>

			<!-- navbar -->
			<?php include('../elevatedFeatures/navbar.php') ?>

            <div class = "container">
                <div class="content">
                    <h2 class="content-title">My Account</h2>
                    <hr>
                    <!-- content -->
                    <my-account>
                        <h2> Welcome, <b><?php echo $_SESSION["USER"]; ?></b></h1>
                        <br>
                        <h2> My Details: </h2>
                        <h3> Email: <b><?php echo $_SESSION["EMAIL"]; ?></b></h3>
                        <h3> Role: <b><?php echo $_SESSION["ROLE"]; ?></b></h2>
                        <a href="../logout.php"><button> Logout </button></a>
                    </my-account>
                    <hr>
                    <update-account>
                        <h2> Need to update some details? </h2>
                        <h3> Click the button below to update your account details </h3>
                        <button onclick="document.getElementById('updatedetails').style.display='block'" name="UpdateDetails">Update my details</button>
                            <!-- The Modal -->
                            <div id="updatedetails" class="modal">
                            <span onclick="document.getElementById('updatedetails').style.display='none'"
                            class="close" title="Close Modal">&times;</span>

                                <!-- Modal Content -->
                                    <form class="modal-content login" method="post" action="../elevatedFeatures/update-details.php">
                                        <div class="account-container">
                                            <h2> Update my details: </h2>
                                            <label for="uname"><b>Username</b></label>
                                            <input type="text" placeholder="Enter Username" name="uname" required/>

                                            <label for="email"><b>E-Mail Address</b></label>
                                            <input type="text" placeholder="Enter E-Mail" name="email" required/>

                                            <label for="psw"><b>Password</b></label>
                                            <input type="password" placeholder="Enter Password" name="psw" required id="psw"/>

                                            <label for="psw"><b>Re-Enter Password</b></label>
                                            <input type="password" placeholder="Re-Enter Password" name="re_psw" required oninput="check(this)" id="re_psw"/>
                                            <script language='javascript' type='text/javascript'>
                                                function check(input) {
                                                    if (input.value != document.getElementById('psw').value) {
                                                        input.setCustomValidity('Passwords must be matching.');
                                                    } else {
                                                        // reset error message if valid
                                                        input.setCustomValidity('');
                                                    }
                                                }
                                                </script>

                                            <button type="submit" name = "submit" value="Update">Update Account</button>
                                        </div>

                                        <div class="account-container" style="background-color:#f1f1f1">
                                            <button type="button" onclick="document.getElementById('updatedetails').style.display='none'" class="cancelbtn">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                    </update-account>
                    <recent-blog>
                        <h2> Recent Blog </h2>
                        <?php foreach ($recentposts as $recentpost): ?>
                            <div class="post" style="margin-left: 0px;">
                                <img src="<?php echo BASE_URL . 'Images/' . $recentpost['image']; ?>" class="post_image" alt="">
                                    <?php if (isset($recentpost['topic']['name'])): ?>
                                        <a href="<?php echo BASE_URL . 'filtered_posts.php?topic=' . $recentpost['topic']['id'] ?>"class="btn category">
                                            <?php echo $recentpost['topic']['name'] ?>
                                        </a>
                                    <?php endif; ?>
                                <a href="blog-update.php?post-id=<?php echo $recentpost['id']; ?>">
                                    <div class="post_info">
                                        <h3><?php echo $recentpost['title'] ?></h3>
                                        <div class="info">
                                            <span><?php echo date("F j, Y ", strtotime($recentpost["created_at"])); ?></span>
                                            <span class="read_more">Read more...</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach ?>
                    </recent-blog>
                    <retrieve-mycookie>
                        <h2> Access Cookies </h2>
                        <script>
                            var usercookie;
                                function setCookie() { 
                                    usercookie = document.cookie = "username = <?php echo $_SESSION["USER"]; ?>; role = <?php echo $_SESSION["ROLE"]; ?>; expires = <?php echo $Time; ?> "
                                    alert("Your cookie details have been set");
                                    alert("Click the Show My Cookie button to view it");
                                }

                                function showCookie() {
                                     if(usercookie.length != 0)
                                    {
                                        alert("Your cookie details are: " + usercookie);
                                    } else {
                                        alert("No cookie has been set");
                                    }
                                }
                            
                            function deleteCookie() {
                                document.cookie = usercookie + "; max-age = 0";
                                usercookie = document.cookie;
                                alert("Your cookie details have been deleted");
                            }
                        </script>


                        <button id="cookie" onclick="setCookie()"> Set My Cookie </button> 
                        <button id="cookie" onclick="showCookie()"> Show My Cookie </button>
                        <button id="cookie" onclick="deleteCookie()"> Delete My Cookie </button>
                    </retrieve-mycookie>
                </div>
            </div>
    </body>
</html>
