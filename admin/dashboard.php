<?php
$title = "Dashboard";
session_start();
require_once "../include/connection.php";
require_once "includes/auth.php";
$count =
include "includes/header.php";
?>
	<div class="container">
		<div class="top-header">
			Welcome <?php echo $_SESSION['fullname']; ?>
		</div>
		<div class="content cf">
            <div class="stat-box">
				Nominees 
				<br> <a href='nominees.php'>View</a>
			</div>

			<div class="stat-box">
				Positions
				<br> <a href='positions.php'>View</a>
			</div>

			<div class="stat-box">
				Votes
				<br> <a href='votes.php'>View</a>
			</div>
			
			<div class="stat-box">
				Result
				<br> <a href='results.php'>View</a>
			</div>
		</div>
	</div>
<?php include "includes/footer.php";?>	