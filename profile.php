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
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
    <link href="css/modifiers.css" rel="stylesheet">
    <script src="sweetalert/jquery.min.js"></script>
    <script src="sweetalert/jquery-2.1.3.min.js"></script>
</head>
<body>
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
            <h1 class="margin-t20 text-center fs-30">Manage Profile</h1>
        </section>
        <?php
            $student_id = $_SESSION["student_id"];
            $sql = "SELECT * FROM voters where student_id = '$student_id'";
            $query = mysqli_query($connect, $sql);
            $row = mysqli_fetch_array($query);
        ?>
        <div class="w-50 mx-auto text-center margin-t20 margin-b20" style="height: 300px;">
            <div class="w-50" style="float:left;">
                <p><p class="text-bold">Student ID</p><?= $row['student_id'] ?></p>
                <p><p class="text-bold">Firstname</p><?= $row['firstname'] ?></p>
            </div>
            <div class="w-50" style="float:left;">
                <p><p class="text-bold">Surname</p><?= $row['surname'] ?></p>
                <p><p class="text-bold">Email</p><?= $row['email'] ?></p>
            </div>
            <div class="w-50" style="float:left;">
                <p><p class="text-bold">Gender</p><?= $row['gender'] ?></p>
                <p><p class="text-bold">Level</p><?= $row['level'] ?></p>
            </div>
            <div class="w-50" style="float:left;">
                <p><p class="text-bold">Department</p><?= $row['department'] ?></p>
                <p><p class="text-bold">Ethnicity</p><?= $row['ethnicity'] ?></p>
            </div>
            <div>
                <a href="edit_profile.php"><button class="btn">Edit Profile</button></a>
                <a href="change_password.php"><button class="btn">Change Password</button></a>
            </div>
        </div>
    </main>


    <footer>
        <p>All rights reserved.2020</p>
    </footer>


<script type="text/javascript" src="js/app.js"> </script>
</body>
</html>

<?php unset($_SESSION['form_values']) ?>