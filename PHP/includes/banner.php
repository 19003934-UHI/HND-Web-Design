<?php if (isset($_SESSION['user']['username'])) { ?>
	<div class="logged_in_info">
		<span>Welcome <?php echo $_SESSION['user']['username'] ?></span>
		|
		<span><a href="../logout.php">logout</a></span>
	</div>
<?php }else{ ?>
	<div class ="hero-image">
            <div class="hero-text">
                <h1> The Local Theatre </h1>
            </div>
        </div>
<?php } ?>