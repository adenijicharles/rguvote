<?php
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
            <b>Postions - <a href="add-position.php">Add New</a></b>
        </div>
		<div class="content cf">
            <table class="table">
                <thead>
                    <tr>
                        <th> Name </th>
                        <th> Actions </th>
                    </tr>
                    <?php while($row = mysqli_fetch_array($query)){?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td> <a href='edit-position.php?id=<?php echo $row['id'];?>'>Edit</a> - <a href='handlers/positions/delete.php?id=<?php echo $row['id']?>'>Delete</a> </td>
                        </tr>
                    <?php } ?>
                </thead>
                
            </table>
		</div>
	</div>
<?php include "includes/footer.php";?>	