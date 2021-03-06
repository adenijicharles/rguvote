<?php
$title = "Edit Nominee";
session_start();
require_once "../include/connection.php";
require_once "includes/auth.php";
$id = $_GET['id'];
$query1 = mysqli_query($connect, "SELECT * FROM nominees WHERE id = '$id'");
$query = mysqli_query($connect, 'SELECT * FROM positions ORDER BY name ASC');

function getPositionName($id){
    global $connect;
    $query = mysqli_query($connect, "SELECT * FROM positions WHERE id = '$id'");
    $fetch = mysqli_fetch_array($query);
    return $fetch['name'];
}
include "includes/header.php";
?>
	<div class="container">
		<div class="top-header">
			Welcome <?php echo $_SESSION['fullname']; ?>
        </div>
        <div class="content">
            <b> Edit nominee details </b>
        </div>
		<div class="content">
			<div class="full-width">
            <?php while($row = mysqli_fetch_array($query1)){?>
            <form action="handlers/nominees/update.php" method="post" enctype="multipart/form-data">
                <div class="form-body">
                    <label> Student ID </label>
                    <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                    <input type="text" maxlength="7" value="<?php echo $row['student_id']?>" required name="student_id">
                </div>

                <div class="form-body">
                    <label> Full Name </label>
                    <input type="text" required name="name" value="<?php echo $row['name']?>">
                </div>

                <div class="form-body">
                    <label> Level </label>                    
                    <select name="level" required>
                        <option value="<?php echo $row['level']?>" selected> <?php echo $row['level']?> </option>
                        <option value="100"> 100 </option>
                        <option value="200"> 200 </option>
                        <option value="300"> 300 </option>
                        <option value="400"> 400 </option>
                        <option value="500"> 500 </option>`
                        <option value="Postgraduate"> Postgraduate </option>
                    </select>
                </div>            

                <div class="form-body">
                    <label> School </label>                    
                    <select name="school" required>
                        <option value="<?php echo $row['school']?>" selected> <?php echo $row['school']?> </option>
                        <option value="computing"> Computing </option>
                        <option value="agriculture"> Agriculture </option>
                    </select>
                </div>                    

                <div class="form-body">
                    <label> Sex </label>                    
                    <select name="sex" required>
                        <option value="<?php echo $row['sex']?>" selected> <?php echo $row['sex']?> </option>
                        <option value="female"> Female </option>
                        <option value="male"> Male </option>
                        <option value="others"> Others </option>
                    </select>
                </div>
                <div class="form-body">
                    <label> Ethnicity </label>                    
                    <select name="ethnicity" required>
                        <option value="<?php echo $row['ethnicity']?>" selected> <?php echo $row['ethnicity']?> </option>
                        <option value="asia"> Asia </option>
                        <option value="african"> African </option>
                        <option value="hispanics"> Hispanics </option>
                    </select>
                </div>
                <div class="form-body">
                    <label> Bio </label>                    
                   <textarea name="bio" name="bio" rows="6" required><?php echo $row['bio']?></textarea>
                </div>      
                <div class="form-body">
                    <label> Upload Manifesto Video (Leave empty if not changing video) </label>                    
                    <input type="file" name="video">
                    <input type="hidden" name="old_video" value="<?php echo $row['manifesto']; ?>">
                </div>    
                <div class="form-body">
                    <label> Upload Profile Picture (Leave empty if not changing profile picture) </label>                    
                    <input type="file" name="picture">
                    <input type="hidden" name="old_picture" value="<?php echo $row['picture']; ?>">
                </div>                                        
                <div class="form-body">
                    <label> Position </label>                    
                    <select name="position">
                        <option value="<?php echo $row['position']; ?>" selected> <?php echo getPositionName($row['position'])?> </option>
                        <?php while($row = mysqli_fetch_array($query)){?>
                            <option value="<?php echo $row['id'];?>"> <?php echo $row['name'];?> </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-body">
                    <input type="submit" value="Update Details">
                </div>

                
            </form>
            <?php } ?>
			</div>			
		</div>
	</div>
<?php include "includes/footer.php";?>	