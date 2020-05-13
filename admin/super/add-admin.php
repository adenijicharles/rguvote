<?php
session_start();
require_once "../../include/connection.php";
require_once "includes/auth.php";
include "includes/header.php";
?>
	<div class="container">
		<div class="top-header">
			Welcome <?php echo $_SESSION['fullname']; ?>
        </div>
        <div class="content">
            <b> Add new admin </b>
        </div>
		<div class="content">
			<div class="full-width">
            <form action="handlers/add-admin.php" method="post" enctype="multipart/form-data">
                <div class="form-body">
                    <label> Staff ID </label>
                    <input type="text" required name="staff_id">
                </div>
                <div class="form-body">
                    <label> Full Name </label>
                    <input type="text" required name="name">
                </div>
                <div class="form-body">
                    <label> Email Address </label>
                    <input type="email" required name="email">
                </div>
                <div class="form-body">
                    <label> Password </label>
                    <input type="password" required name="password">
                </div>                
                <div class="form-body">
                    <label> Confirm Password </label>
                    <input type="password" required name="confirm">
                </div> 
                <div class="form-body">
                    <input type="submit" value="Add Administrator">
                </div>

                
            </form>
			</div>			
		</div>
	</div>
<?php include "includes/footer.php";?>	