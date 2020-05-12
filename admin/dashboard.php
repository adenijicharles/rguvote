<?php
session_start();
require_once "../include/connection.php";
require_once "includes/auth.php";

include "includes/header.php";
?>
	<div class="container">
		<div class="top-header">
			Welcome <?php echo $_SESSION['fullname']; ?>
		</div>
		<div class="content cf">
            
		</div>
	</div>
<?php include "includes/footer.php";?>	