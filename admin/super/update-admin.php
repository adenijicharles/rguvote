<?php
session_start();
require_once "../../include/connection.php";
require_once "includes/auth.php";
$id = $_GET['id'];
$query1 = mysqli_query($connect, "SELECT * FROM administrators WHERE id = '$id'");
$fetch = mysqli_fetch_array($query1);
include "includes/header.php";
?>
	<div class="container">
		<div class="top-header">
			Welcome <?php echo $_SESSION['fullname']; ?>
        </div>
        <div class="content">
            <b> Update admin information </b>
        </div>
		<div class="content">
			<div class="full-width">
            <form action="handlers/update-admin.php" method="post" >
                <div class="form-body">
                    <label> Staff ID </label>
                    <input type="text" required value="<?php echo $fetch['staff_id']; ?>" name="staff_id">
                </div>
                <div class="form-body">
                    <label> Full Name </label>
                    <input type="text" required name="name" value="<?php echo $fetch['fullname']; ?>">
                    <input type="hidden" required name="id" value="<?php echo $fetch['id']; ?>">
                </div>
                <div class="form-body">
                    <label> Email Address </label>
                    <input type="email" required name="email" value="<?php echo $fetch['email']; ?>">
                </div>
                <div class="form-body">
                    <input type="submit" value="Update Administrator">
                </div>
            </form>
			</div>			
		</div>
	</div>
<?php include "includes/footer.php";?>	