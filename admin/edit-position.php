<?php
$title = "Edit Position";
session_start();
require_once "../include/connection.php";
require_once "includes/auth.php";
$id = $_GET['id'];
$query = mysqli_query($connect, "SELECT * FROM positions WHERE id = '$id' ORDER BY name ASC");
$fetch = mysqli_fetch_array($query);
include "includes/header.php";
?>
	<div class="container">
		<div class="top-header">
			Welcome <?php echo $_SESSION['fullname']; ?>
        </div>
        <div class="content">
            <b> Edit Position </b>
        </div>
		<div class="content">
			<div class="full-width">
				 <form action="handlers/positions/update.php" method="post">
				 	<div class="form-body">
						<label> Position Name </label>
                        <input type="text" name="name" required value="<?php echo $fetch['name']?>">
                        <input type="hidden" name="id" value="<?php echo $fetch['id']; ?>"
					 </div>				 			 	
				 	<div class="full-width-small">
                         <br>
						<input type="submit" value="UPDATE">
				 	</div>					 				 						 				 								 		 		 	
				 </form>
			</div>			
		</div>
	</div>
<?php include "includes/footer.php";?>	