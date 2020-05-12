<?php
session_start();
// importing the database connection file and the user-defined functions file
include "../include/functions.php";
include "../include/connection.php";

if ($_POST) {
    check_for_empty_inputs($_POST, "login.php");

    $username = mysqli_real_escape_string($connect, $_POST["student_id"]); //mysql_prep is a user-defined function in "include/functions.php"
    $password = mysqli_real_escape_string($connect, $_POST["password"]); //mysql_prep escapes special characters in a string

    $sql = "SELECT * FROM voters where student_id = '$username'";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($query); //to return a row
    $numrow = mysqli_num_rows($query); //to check number of rows returned

    if ($numrow > 0) { //If there's at least one row in the database that matches the submitted data
        //to do login, we need to start sessions, so we can have access to $_SESSION
        $hashedPassword = $row['password']; //get the hashed password
        if(password_verify($password, $hashedPassword)) {
            $_SESSION["student_id"] = $row['student_id'];
            $_SESSION['student_name'] = $row['surname']. " ".$row['firstname'];
            redirect_to("../welcome.php");
        }else {
            $_SESSION['error'] = "Username or password is incorrecbt";
            redirect_to("../login.php");
        }
    } else {
        $_SESSION['error'] = "Username or password is incorrect";
        redirect_to("../login.php");
    }
}
?>