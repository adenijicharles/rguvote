<?php
session_start();
// importing the database connection file and the user-defined functions file
include "../../../include/functions.php";
include "../../../include/connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $status = $_POST['status'];
    mysqli_query($connect, "DELETE FROM vote_status");
    mysqli_query($connect, "INSERT INTO vote_status (status) VALUES ('$status')") or die(mysqli_error($connect));
    if($status == 0){
        $_SESSION['success'] = 'Voting stopped';
    }else if($status == 1){ 
        $_SESSION['success'] = 'Voting started';
    }else if($status == 2){
        $_SESSION['success'] = 'Voting stopped. Results shall be shown';
    }    
    header("location: ../voting_status.php");
}

