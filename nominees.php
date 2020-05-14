<?php
session_start();
require_once "include/connection.php";
require_once "include/functions.php";
if(!$_SESSION['student_id']){
    $_SESSION['error'] = "Please login to access the voting app";
    header("location: login.php");
}
$position = check_input($_GET['position']);
$name = check_input($_GET['name']);
$nominees = mysqli_query($connect, "SELECT * FROM nominees WHERE position = '$position'");
?>
<!DOCTYPE html>
<html>
<head>
    <title> RGU Vote - Nominees </title>
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
<main>
    <section id="heading">
        <h3> <?php echo $name; ?> Nominees Page </h3>
        <p> Select a nominee below to view his/her profile, manifesto or cast your vote</p>
    </section>
    <section>
        <form action="handlers/vote.php" method="post">
            <?php $id = 1; while($row = mysqli_fetch_array($nominees)){?>
                <article data-id="<?php echo $id; ?>">
                    <img src="images/nominee.png" class="outline-thick" style="display: block; margin: auto; margin-bottom: 30px">                    
                    <input type="radio" data-name="<?php echo $row['name'];?>" data-pos="<?php echo $name;?>" data-position-id=<?php echo $position?> id="radio<?php echo $id;?>" name="vote" class="" value="<?php echo $row['id'];?>">                    
                    <span><?php echo $row['name']; ?></span>
                    <p> <a href="nominee.php?id=<?php echo $row['student_id']; ?>&posname=<?php echo $name ?>&position=<?php echo $position;?>">View Profile / Manifesto</a> </p>
                </article>
            <?php $id++; } ?>
            <div style="clear: both; display: block; content: " "></div>
            <article style="margin-top: 0; padding-top: 0; float: right;">
                <input type="hidden" value="<?php echo $position ?>">
                <input type="hidden" id="student_id" value="<?php echo $_SESSION['student_id']; ?>">
                <input type="button" id="button" value="VOTE">
            </article>
            <div style="clear: both; display: block; content: ''"></div>
        </form>
    </section>
</main>
<footer>
    <p>All rights reserved.2020</p>
</footer>
<script type="text/javascript" src="js/app.js"> </script>
</body>
</html>