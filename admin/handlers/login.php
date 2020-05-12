<?php
session_start();
include "../../include/functions.php";
include "../../include/connection.php";

if($_POST) {
    check_for_empty_inputs($_POST, "index.php");

    $staff_id = mysqli_real_escape_string($connect, $_POST["staff_id"]); //mysql_prep is a user-defined function in "include/functions.php"
    $password = mysqli_real_escape_string($connect, $_POST["password"]); //mysql_prep escapes special characters in a string

    $sql = "SELECT * FROM administrators where staff_id = '$staff_id'";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($query); //to return a row
    $numrow = mysqli_num_rows($query); //to check number of rows returned

    if ($numrow > 0) { //If there's at least one row in the database that matches the submitted data
        //to do login, we need to start sessions, so we can have access to $_SESSION
        $hashedPassword = $row['password']; //get the hashed password
        if(password_verify($password, $hashedPassword)) {
            $_SESSION["staff_id"] = $row['staff_id'];
            $_SESSION['fullname'] = $row['fullname'];
            redirect_to("../admin_panel.php");
        }else {
            $_SESSION['error'] = "Staff ID or password is incorrect";
            redirect_to("../index.php");
        }
    } else {
        $_SESSION['error'] = "Staff ID or password is incorrect";
        redirect_to("../index.php");
    }
}

