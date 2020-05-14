<?php
$title = "Edit Profile";
$active = 'sl-active';
session_start();
require_once "../include/connection.php";
require_once "includes/auth.php";
$query = mysqli_query($connect, 'SELECT * FROM positions ORDER BY name ASC');
include "includes/header.php";

$staff_id = $_SESSION["staff_id"];
$sql = "SELECT * FROM administrators where staff_id = '$staff_id'";
$query = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($query);

?>
	<div class="container">
		<div class="top-header">
			Welcome <?php echo $_SESSION['fullname']; ?>
        </div>
        <div class="content">
            <b> Update Profile </b>
        </div>
		<div class="content">
			<div class="full-width">
            <form action="handlers/update_profile.php" method="post">

                
                    <input readonly class="bg-grey" type="hidden" required value="<?php echo isset($_SESSION['form_values']['staff_id']) ? $_SESSION['form_values']['staff_id'] : $row['staff_id'];?>">
       
                <div class="form-body">
                    <label> Full Name </label>
                    <input type="text" required name="fullname" value="<?php echo isset($_SESSION['form_values']['fullname']) ? $_SESSION['form_values']['fullname'] : $row['fullname'];?>">
                </div>
                <div class="form-body">
                    <label> Email Address </label>
                    <input readonly class="bg-grey" type="text" required value="<?php echo isset($_SESSION['form_values']['email']) ? $_SESSION['form_values']['email'] : $row['email'];?>">
                </div>

                <div class="form-body">
                    <input type="submit" value="Update Profile">
                </div>

                
            </form>
			</div>			
		</div>
	</div>
<?php include "includes/footer.php";?>	