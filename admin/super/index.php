<?php
session_start();
if($_SESSION['role'] !== 'superadmin'){
    $_SESSION['error'] = 'You do not have the proper access to view that page';
    header('location: ../dashboard.php');
    die();
}
require_once "../../include/connection.php";
require_once "includes/auth.php";
$query = mysqli_query($connect, 'SELECT * FROM administrators ORDER BY fullname ASC');
include "includes/header.php";
?>
	<div class="container">
		<div class="top-header">
			Welcome <?php echo $_SESSION['fullname']; ?>
        </div>
        <div class="content">
            <b> Administrators - <a href="add-admin.php">Add New</a></b>
        </div>
		<div class="content cf">
            <table class="table">
                <thead>
                    <tr>
                        <th> Staff ID </th>
                        <th> Full Name </th>
                        <th> Email </th>
                        <th> Action </th>
                    </tr>
                    <?php while($row = mysqli_fetch_array($query)){?>
                        <tr>
                            <td><?php echo $row['staff_id']; ?></td>    
                            <td><?php echo $row['fullname']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td> <a href='update-admin.php?id=<?php echo $row['id'];?>'>Edit</a> - <a href='handlers/delete-admin.php?id=<?php echo $row['id']?>'>Delete</a> </td>
                        </tr>
                    <?php } ?>
                </thead>
                
            </table>
		</div>
	</div>
<?php include "includes/footer.php";?>	