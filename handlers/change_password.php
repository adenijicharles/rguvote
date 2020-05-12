<?php
session_start();
include "../include/functions.php";
include "../include/connection.php";

if($_POST) {
    check_for_empty_inputs($_POST, "reset.php");
    


    if (strlen($_POST["password"]) < 6) {
        $_SESSION['error'] = 'Password too short, must be at least six characters';
        redirect_to($_SERVER['HTTP_REFERER']);
        die();
    }

    if ($_POST["password"] !== $_POST["confirm_password"]) {
        $_SESSION['error'] = 'Passwords do not match';
        redirect_to($_SERVER['HTTP_REFERER']);
        die();
    }

   
    $student_id = $_SESSION["student_id"];
    $password = password_hash(($_POST['password']), PASSWORD_DEFAULT);

    $sql = "UPDATE voters SET password = '$password' WHERE student_id ='$student_id'";
    $query = mysqli_query($connect, $sql);
    if($query){
        $_SESSION['success'] = "Password changed successfully";
        unset($_SESSION['form_values']);
        redirect_to("../reset.php");
    }else{
        $_SESSION['error'] = "Unable to reset your password. Please try again later"; 
        unset($_SESSION['form_values']);
        redirect_to("../reset.php");
    }       
}

