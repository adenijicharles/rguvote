<?php
session_start();
// importing the database connection file and the user-defined functions file
include "../../../include/functions.php";
include "../../../include/connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $status = $_POST['status'];
    mysqli_query($connect, "DELETE FROM vote_status");
    mysqli_query($connect, "INSERT INTO vote_status (status) VALUES ('$status')") or die(mysqli_error($connect));
    $_SESSION['success'] = $status == 1 ? 'Voting started' : 'Voting stopped. Results will now be shown to students';
    header("location: ../voting_status.php");
}

