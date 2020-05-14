<?php
session_start();
include "../../../include/functions.php";
include "../../../include/connection.php";

if($_GET){
    $id = check_input($_GET['id']);
    $query = mysqli_query($connect, "DELETE FROM administrators WHERE id = '$id'");
<<<<<<< HEAD
    $_SESSION['success'] = 'Admin deleted successfully';
    header('location: ../dashboard.php');
=======
    $_SESSION['success'] = 'Administrator deleted successfully';
    header('location: ../index.php');
>>>>>>> f7a6be79107b57c03fd8980ea2c667f4e311b7d1
}

