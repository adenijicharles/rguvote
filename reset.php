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
    <title> RGU Vote - Welcome Page </title>
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
    <?php if(isset($_SESSION['success'])){?>
        <div class="status_message">
            <div class="success">
                <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
            </div>
        </div>
    <?php } ?>

    <?php if(isset($_SESSION['error'])){?>
        <div class="status_message">
            <div class="error">
                <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        </div>
    <?php } ?>
    <main>
        <section>
            <h1 class="margin-t20 text-center fs-30">Update Password</h1>
        </section>
        <section class="margin-t20 margin-b50">
            <?php
                $student_id = $_SESSION["student_id"];
                $sql = "SELECT * FROM voters where student_id = '$student_id'";
                $query = mysqli_query($connect, $sql);
                $row = mysqli_fetch_array($query);
            ?>
        
            <div class="inner margin_auto">
                <form action="handlers/change_password.php" method="post">
                    <div class="form-box-inline margin-b20 border-purple border-round">
                        <input name="password" type="password" placeholder="New password" required>
                    </div>

                    <div class="form-box-inline margin-b20 border-purple border-round">
                        <input type="password" placeholder="Confirm New Password" required name="confirm_password">
                    </div>

                    

                    <!-- <div class="form-box-inline margin-b20"> -->
                        <button type="submit" value="" class="border-purple border-round bg-purple">Update Password</button>
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