<?php
session_start();
// importing the database connection file and the user-defined functions file
include "../include/functions.php";
include "../include/connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    check_for_empty_inputs($_POST, "edit_profile.php");

    //To make sure only letters are in input
    if (!preg_match("/^[a-zA-Z\-]*$/", $_POST["surname"])) {
        $_SESSION['error'] = 'Only letters and hyphens space allowed in the surname field';
        header("location: ../edit_profile.php");
        die();
    }

    //To make sure only letters are in input
    if (!preg_match("/^[a-zA-Z\-]*$/", $_POST["firstname"])) {
        $_SESSION['error'] = 'Only letters and hyphens space allowed in the firstname field';
        header("location: ../edit_profile.php");
        die();
    }

    $surname = name_input($_POST['surname']);
    $firstname = name_input($_POST['firstname']);
    $gender = name_input($_POST['gender']);
    $level = name_input($_POST['level']);
    $department = name_input($_POST['department']);
    $ethnicity = name_input($_POST['ethnicity']);

    $student_id = $_SESSION["student_id"];
    $sql = "UPDATE voters SET surname = '$surname', firstname = '$firstname', level = '$level', department = '$department', gender = '$gender', ethnicity = '$ethnicity' WHERE student_id ='$student_id'";
    $query = mysqli_query($connect, $sql);
    $_SESSION['success'] = 'Profile update successful.';
    unset($_SESSION['form_values']);
    header("location: ../profile.php");
}

