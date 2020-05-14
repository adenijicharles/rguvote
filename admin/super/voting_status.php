<?php
session_start();
require_once "../../include/connection.php";
require_once "includes/auth.php";
include "includes/header.php";
$query = mysqli_query($connect, "SELECT * FROM vote_status");
$fetch = mysqli_fetch_array($query);
?>
	<div class="container">
		<div class="top-header">
			Welcome <?php echo $_SESSION['fullname']; ?>
        </div>
        <div class="content">
            <b> Start / Stop Election </b>
        </div>
		<div class="content">
			<div class="full-width">
            <form action="handlers/voting_status.php" method="post" >
                <div class="form-body">
                    <label> Current Status: 
                    <?php 
                        if($fetch['status']  == 0) {
                            echo 'Voting has not started';
                        } else if ($fetch['status']  == 1){
                            echo 'Voting ongoing';
                        } else if ($fetch['status']  == 2) {
                            echo 'Voting ended. Results are being displayed';
                        }
                    ?> </label>
                </div>
                <div class="form-body">
                    <label> Vote Status </label>
                    <select name="status" required>
                        <option value="" selected></option>
                        <option value="1"> Start </option>
                        <option value="0"> End </option>
                        <option value="2"> End and Show Results </option>
                    </select>
                </div>
                <div class="form-body">
                    <input type="submit" value="Submit">
                </div>
            </form>
			</div>			
		</div>
	</div>
<?php include "includes/footer.php";?>	