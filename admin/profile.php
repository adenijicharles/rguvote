<?php
$title = "Profile";
session_start();
require_once "../include/connection.php";
require_once "includes/auth.php";
include "includes/header.php";
$staff_id = $_SESSION["staff_id"];
echo ($staff_id);

$sql = "SELECT * FROM administrators where staff_id = '$staff_id'";
$query = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($query);

?>
	<div class="container">
		<div class="top-header">
			Welcome <?php echo $_SESSION['fullname']; ?>
        </div>
        <div class="content">
            <b>Personal Profile</b>
        </div>
		<div class="content cf">
            <table class="table">
                <tr>
                    <td class="text-bold"> Staff ID </td>
                    <td class="text-bold"> Full Name </td>
                    <td class="text-bold"> Email Address </td>
                    <td class="text-bold"> Action </td>
                </tr>
                <tr>
                    <td><?= $row['staff_id'] ?></td>
                    <td><?= $row['fullname'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><a href="edit_profile.php">Edit Profile</a></td>
                </tr>
            </table>
		</div>
	</div>
<?php include "includes/footer.php";?>	