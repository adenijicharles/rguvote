<?php 
    session_start();    
    require_once "../include/connection.php";
    require_once "../include/functions.php";
    if(!$_SESSION['staff_id']){
        $_SESSION['error'] = "Please login to access the voting app";
        header("location: index.php");
    }

    echo $_SESSION['fullname']; 
    echo "<br>";
    echo $_SESSION['staff_id']; 
?>