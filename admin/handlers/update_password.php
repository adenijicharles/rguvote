<?php
session_start();
include "../../include/functions.php";
include "../../include/connection.php";

if($_POST) {
    check_for_empty_inputs($_POST, "newpassword.php?e=".$_POST['e']."&t=".$_POST['t']);
    
    $encrypted_email = $_POST['e'];
    $requested_time = $_POST['t'];

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

    $current_time = time();
    $expiry = 30 * 60 * 1000;
    if($current_time - (int)$requested_time > $expiry) { 
        $_SESSION['error'] = "Password reset link has expired. Please request a new one.";
        redirect_to($_SERVER['HTTP_REFERER']);
        die();
    }

    $password = password_hash(($_POST['password']), PASSWORD_DEFAULT);

    $sql = "UPDATE administrators SET password = '$password' WHERE md5(email) ='$encrypted_email'";
    $query = mysqli_query($connect, $sql);
    if($query){
        $_SESSION['success'] = "Password changed successfully";
        unset($_SESSION['form_values']);
        redirect_to("../index.php");
    }else{
        $_SESSION['error'] = "Unable to reset your password. Please try again later"; 
        unset($_SESSION['form_values']);
        redirect_to("../reset.php");
    }       
}

