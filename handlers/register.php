<?php
session_start();
// importing the database connection file and the user-defined functions file
include "../include/functions.php";
include "../include/connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    check_for_empty_inputs($_POST, "register.php");

    //To make sure only letters are in input
    if (!preg_match("/^[a-zA-Z\-]*$/", $_POST["surname"])) {
        $_SESSION['error'] = 'Only letters and hyphens space allowed in the surname field';
        header("location: ../register.php");
        die();
    }

    //To make sure only letters are in input
    if (!preg_match("/^[a-zA-Z\-]*$/", $_POST["firstname"])) {
        $_SESSION['error'] = 'Only letters and hyphens space allowed in the firstname field';
        header("location: ../register.php");
        die();
    }

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

    if (strlen($_POST["student_id"]) < 7) {
        $_SESSION['error'] = 'Student ID is too short, must be at least seven characters';
        header("location: ../register.php");
        die();
    }

    if ($_POST["password"] !== $_POST["confirm_password"]) {
        $_SESSION['error'] = 'Passwords do not match';
        header("location: ../register.php");
        die();
    }

    $student_id = name_input($_POST['student_id']);
    $checkStudentId = "SELECT * FROM voters where student_id = '$student_id'";
    $query_u = mysqli_query($connect, $checkStudentId); //find any student id from the database that matches the same user input
    $numrow = mysqli_num_rows($query_u); //count the number of rows that have the same username as what the user inputted
    if ($numrow > 0) { //if the query finds just 1, throw an error
        $_SESSION['error'] = 'Sorry, student id already taken';
        header("location: ../register.php");
        die();
    }

    $email = name_input($_POST['email']);
    $checkEmail = "SELECT * FROM voters where email = '$email'";
    $query_u = mysqli_query($connect, $checkEmail);
    $numrow = mysqli_num_rows($query_u);
    if ($numrow > 0) {
        $_SESSION['error'] = 'Email already exists';
        header("location: ../register.php");
        die();
    }

    $surname = name_input($_POST['surname']);
    $firstname = name_input($_POST['firstname']);
    $gender = name_input($_POST['gender']);
    $level = name_input($_POST['level']);
    $department = name_input($_POST['department']);
    $ethnicity = name_input($_POST['ethnicity']);

    // using md5 to hash passwords is a very less secure way
    $password = password_hash(($_POST['password']), PASSWORD_DEFAULT);

    $sql = "INSERT INTO voters(student_id, password, surname, firstname, email, level, department, gender, ethnicity) VALUES ('$student_id', '$password', '$surname', '$firstname', '$email', '$level', '$department', '$gender', '$ethnicity')";
    $query = mysqli_query($connect, $sql);
    $_SESSION['success'] = 'Registration successful. Please login below';
    unset($_SESSION['form_values']);
    header("location: ../login.php");
}

