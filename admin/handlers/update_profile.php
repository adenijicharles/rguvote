<?php
session_start();
// importing the database connection file and the user-defined functions file
include "../../include/functions.php";
include "../../include/connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    check_for_empty_inputs($_POST, "edit_profile.php");

    //To make sure only letters are in input
    if (!preg_match("/^[a-zA-Z\- .]*$/", $_POST["fullname"])) {
        $_SESSION['error'] = 'Only letters, hyphens and space allowed in the fullname field';
        header("location: ../edit_profile.php");
        die();
    }


    $fullname = name_input($_POST['fullname']);

    $staff_id = $_SESSION["staff_id"];
    $sql = "UPDATE administrators SET fullname = '$fullname' WHERE staff_id = '$staff_id'";
    $query = mysqli_query($connect, $sql);
    $_SESSION['success'] = 'Profile update successful.';
    unset($_SESSION['form_values']);
    header("location: ../profile.php");
}

