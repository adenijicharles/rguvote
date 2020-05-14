<?php
session_start();
require_once "include/connection.php";
if(!$_SESSION['student_id']){
    $_SESSION['error'] = "Please login to access the voting app";
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title> RGU Vote - Edit Profile </title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
    <link href="css/modifiers.css" rel="stylesheet">
    <link href="css/forms.css" rel="stylesheet">
    <script src="sweetalert/jquery.min.js"></script>
    <script src="sweetalert/jquery-2.1.3.min.js"></script>
</head>
<body style="background-color: transparent;">
    <header>
        <div id="logo">
            <a href="welcome.php" style="text-decoration: none; ">
                <img src="images/logo.png"></a>      
            </a>
        </div>
        <div id="nav">
            Welcome <?php echo $_SESSION['student_name']?> (<?php echo $_SESSION["student_id"]; ?>) -- <a href="profile.php"> Manage Profile </a> -- <a href="logout.php"> Logout </a>
        </div>
    </header>

    <main>
        <section>
            <h1 class="margin-t20 text-center fs-30">Edit Profile</h1>
        </section>
        <section class="margin-t20 margin-b50">
            <?php
                $student_id = $_SESSION["student_id"];
                $sql = "SELECT * FROM voters where student_id = '$student_id'";
                $query = mysqli_query($connect, $sql);
                $row = mysqli_fetch_array($query);
            ?>
        
            <div class="inner margin_auto">
                <form action="handlers/update_profile.php" method="post">
                    
                        <input class="bg-grey" readonly type="hidden" maxlength="7" placeholder="Student ID" required value="<?php echo $row['student_id'] ;?>">
                    

                    <div class="form-box-inline margin-b20 border-purple border-round">
                        <input type="text" placeholder="First Name" required name="firstname" value="<?php echo isset($_SESSION['form_values']['firstname']) ? $_SESSION['form_values']['firstname'] : $row['firstname'];?>">
                    </div>

                    <div class="form-box-inline margin-b20 border-purple border-round">
                        <input type="text" placeholder="Surname" required name="surname" value="<?php echo isset($_SESSION['form_values']['surname']) ? $_SESSION['form_values']['surname'] : $row['surname'];?>">
                    </div>

                    <div class="form-box-inline margin-b20 border-purple border-round">
                        <input class="bg-grey" readonly type="email" placeholder="Email" required value="<?php echo $row['email'];?>">
                    </div>

                    <div class="form-box-inline margin-b20 border-purple border-round">
                        <select name="gender" required>
                            <option disabled value="<?php echo isset($_SESSION['form_values']['gender']) ? $_SESSION['form_values']['gender'] : '';?>" selected> <?php echo isset($_SESSION['form_values']['gender']) ? $_SESSION['form_values']['gender'] : $row['gender'];?> </option>
                            <option value="female"> Female </option>
                            <option value="male"> Male </option>
                            <option value="others"> Others </option>
                        </select>
                    </div>

                    <div class="form-box-inline margin-b20 border-purple border-round">
                        <select name="level" required>
                            <option disabled value="<?php echo isset($_SESSION['form_values']['level']) ? $_SESSION['form_values']['level'] : '';?>" selected> <?php echo isset($_SESSION['form_values']['level']) ? $_SESSION['form_values']['level'] : $row['level'];?> </option>
                            <option value="undergraduate"> Undergraduate </option>
                            <option value="postgraduate"> Postgraduate </option>
                        </select>
                    </div>

                    <div class="form-box-inline margin-b20 border-purple border-round">
                        <select name="department" required>
                            <option disabled value="<?php echo isset($_SESSION['form_values']['department']) ? $_SESSION['form_values']['department'] : '';?>" selected> <?php echo isset($_SESSION['form_values']['department']) ? $_SESSION['form_values']['department'] : $row['department'];?> </option>
                            <option value="computing"> Computing </option>
                            <option value="agriculture"> Agriculture </option>
                        </select>
                    </div>

                    <div class="form-box-inline margin-b20 border-purple border-round">
                        <select name="ethnicity" required>
                            <option disabled value="<?php echo isset($_SESSION['form_values']['ethnicity']) ? $_SESSION['form_values']['ethnicity'] : '';?>" selected> <?php echo isset($_SESSION['form_values']['ethnicity']) ? $_SESSION['form_values']['ethnicity'] : $row['ethnicity'];?> </option>
                            <option value="asia"> Asia </option>
                            <option value="african"> African </option>
                            <option value="hispanics"> Hispanics </option>
                        </select>
                    </div>

                    <!-- <div class="form-box-inline margin-b20"> -->
                        <button type="submit" value="" class="border-purple border-round bg-purple">Update Profile</button>
                    <!-- </div> -->
                </form>
            </div>
        </section>
    </main>


    <footer>
        <p>All rights reserved.2020</p>
    </footer>


    <script type="text/javascript" src="js/app.js"> </script>
</body>
</html>

<?php unset($_SESSION['form_values']) ?>