<?php
$title = "Votes";
session_start();
require_once "../include/connection.php";
require_once "includes/auth.php";
$query = mysqli_query($connect, 'SELECT positions.name AS pname, positions.*, nominees.*, voters.*, votes.* FROM votes LEFT JOIN voters ON votes.student_id = voters.student_id LEFT JOIN positions ON votes.position_id = positions.id LEFT JOIN nominees ON votes.nominee_id = nominees.id');
include "includes/header.php";
?>
	<div class="container">
		<div class="top-header">
			Welcome <?php echo $_SESSION['fullname']; ?>
        </div>
        <div class="content">
            <b>Votes</b>
        </div>
		<div class="content cf">
            <table class="table">
                <tr>
                    <td> Student Name </td>
                    <td> Voted For </td>
                    <td> Position </td>
                </tr>
                <?php while($row = mysqli_fetch_array($query)){?>
                <tr>
                    <td> <?php echo $row['surname']; ?> <?php echo $row['firstname']; ?> </td>
                    <td> <?php echo $row['name']; ?> </td>
                    <td> <?php echo $row['pname']; ?> </td>
                </tr>
                <?php } ?>
            </table>
		</div>
	</div>
<?php include "includes/footer.php";?>	