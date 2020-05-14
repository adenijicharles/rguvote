<?php
session_start();
require_once "include/connection.php";
require_once "include/functions.php";
if(!$_SESSION['student_id']){
    $_SESSION['error'] = "Please login to access the voting app";
    header("location: login.php");
}
$nominee_id = check_input($_GET['id']);
$position = check_input($_GET['position']);
$position_name = check_input($_GET['posname']);
$nominee_data = mysqli_query($connect, "SELECT * FROM nominees WHERE student_id = '$nominee_id'")
?>
<!DOCTYPE html>
<html>
<head>
    <title> RGU Vote - Nominee </title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link href="css/modifiers.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="sweetalert/sweetalert.css">
    <script src="sweetalert/jquery.min.js"></script>
    <script src="sweetalert/jquery-2.1.3.min.js"></script>
    <script src="sweetalert/sweetalert-dev.js"></script>
</head>
<body>
<header>
    <div id="logo">
        <img src="images/logo.png">
    </div>
    <div id="nav">
        Welcome <?php echo $_SESSION['student_name']?> (<?php echo $_SESSION["student_id"]; ?>) -- <a href="logout.php"> Logout </a>
    </div>
</header>
<?php while($row = mysqli_fetch_array($nominee_data)){?>
<main>
    <section id="heading">
        <h3> <?php echo $row['name'];?>, <?php echo $row['level']; ?> <?php echo $row['school']; ?> </h3>
        <p> Contesting For: <?php echo $position_name; ?> </p>
    </section>

    <section>
        <aside class="left">
            <img src="pictures/<?php echo $row['picture'];?>" class="outline-thick">
        </aside>
        <aside class="right">
            <strong> Bio </strong>
            <p>
                <?php echo $row['bio'];?>
            </p>
            <br>
            <strong> Video Manifesto </strong> <br>
            <video  controls>
                <source src="videos/<?php echo $row['manifesto'];?>" type="video/mp4">
                Your browser does not support HTML5 video.
            </video>
            <input type="radio" data-name="<?php echo $row['name'];?>" data-pos="<?php echo $_GET['posname'];?>" data-position-id=<?php echo $position?> id="radio1" name="vote" class="" value="<?php echo $row['id'];?>" checked style="visibility: hidden">     
            <input type="hidden" value="<?php echo $position ?>">
            <input type="hidden" id="student_id" value="<?php echo $_SESSION['student_id']; ?>">
            <input type="button" id="button" value="VOTE" onclick="vote(this)">
        </aside>
    </section>

</main>
<?php } ?>
<script type="text/javascript" src="js/app.js"> </script>
<footer>
    <p>All rights reserved.2020</p>
</footer>
</body>
</html>