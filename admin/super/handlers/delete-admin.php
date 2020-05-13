<?php
session_start();
include "../../../include/functions.php";
include "../../../include/connection.php";

if($_GET){
    $id = check_input($_GET['id']);
    $query = mysqli_query($connect, "DELETE FROM administrators WHERE id = '$id'");
    $_SESSION['success'] = 'Admin deleted successfully';
    header('location: ../dashboard.php');
}

