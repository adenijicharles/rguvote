<?php
$title = "Nominees";
session_start();
require_once "../include/connection.php";
require_once "includes/auth.php";
$query = mysqli_query($connect, 'SELECT * FROM nominees ORDER BY name ASC');
include "includes/header.php";
?>
	<div class="container">
		<div class="top-header">
			Welcome <?php echo $_SESSION['fullname']; ?>
        </div>
        <div class="content">
            <b>Nominees - <a href="add-nominee.php">Add New</a></b>
        </div>
		<div class="content cf">
            <table class="table">
                <thead>
                    <tr>
                        <th> Student ID </th>
                        <th> Name </th>
                        <th> Level </th>
                        <th> School </th>
                        <th> Sex </th>
                        <th> Ethnicity </th>
                        <th> Bio </th>
                        <th> Manifesto </th>
                        <th> Action </th>
                    </tr>
                    <?php while($row = mysqli_fetch_array($query)){?>
                        <tr>
                            <td><?php echo $row['student_id']; ?></td>    
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['level']; ?></td>
                            <td><?php echo $row['school']; ?></td>
                            <td><?php echo $row['sex']; ?></td>
                            <td><?php echo $row['ethnicity']; ?></td>
                            <td><?php echo $row['bio']; ?></td>
                            <td><?php echo $row['manifesto']; ?></td>
                            <td> <a href='edit-nominee.php?id=<?php echo $row['id'];?>'>Edit</a> - <a href='handlers/nominees/delete.php?id=<?php echo $row['id']?>'>Delete</a> </td>
                        </tr>
                    <?php } ?>
                </thead>
                
            </table>
		</div>
	</div>
<?php include "includes/footer.php";?>	