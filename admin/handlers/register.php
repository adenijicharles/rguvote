<?php
session_start();
include "../../include/functions.php";
include "../../include/connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    check_for_empty_inputs($_POST, "register.php");

    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'Invalid email address';
        header("location: ../register.php");
        die();
    }

    if (strlen($_POST["password"]) < 6) {
        $_SESSION['error'] = 'Password too short, must be at least six characters';
        header("location: ../register.php");
        die();
    }

    $staff_id = name_input($_POST['staff_id']);
    $checkStaffId = "SELECT * FROM administrators where staff_id = '$staff_id'";
    $query_u = mysqli_query($connect, $checkStaffId);
    $numrow = mysqli_num_rows($query_u); 
    if ($numrow > 0) { 
        $_SESSION['error'] = 'Sorry, staff id already taken';
        header("location: ../register.php");
        die();
    }

    $email = strtolower(name_input($_POST['email']));
    $checkEmail = "SELECT * FROM administrators where email = '$email'";
    $query_u = mysqli_query($connect, $checkEmail);
    $numrow = mysqli_num_rows($query_u);
    if ($numrow > 0) {
        $_SESSION['error'] = 'Email already exists';
        header("location: ../register.php");
        die();
    }



    // using md5 to hash passwords is a very less secure way
    $password = password_hash(($_POST['password']), PASSWORD_DEFAULT);
    $fullname = $_POST['fullname'];

    $sql = "INSERT INTO administrators (staff_id, fullname, email, password) VALUES ('$staff_id', '$fullname', '$email', '$password')";
    $query = mysqli_query($connect, $sql);
    $_SESSION['success'] = 'Registration successful. Please login below';
    unset($_SESSION['form_values']);
    header("location: ../index.php");
}

