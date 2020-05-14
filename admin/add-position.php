<?php
$title="Add Position";
session_start();
require_once "../include/connection.php";
require_once "includes/auth.php";
$query = mysqli_query($connect, 'SELECT * FROM positions ORDER BY name ASC');
include "includes/header.php";
?>
	<div class="container">
		<div class="top-header">
			Welcome <?php echo $_SESSION['fullname']; ?>
        </div>
        <div class="content">
            <b> Add new position </b>
        </div>
		<div class="content">
			<div class="full-width">
				 <form action="handlers/positions/add.php" method="post">
				 	<div class="form-body">
						<label> Position Name </label>
						<input type="text" name="name" required>
					 </div>				 			 	
				 	<div class="full-width-small">
						<input type="submit" value="SUBMIT">
				 	</div>					 				 						 				 								 		 		 	
				 </form>
			</div>			
		</div>
	</div>
<?php include "includes/footer.php";?>	