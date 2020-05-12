<?php
session_start();
include "../../../include/functions.php";
include "../../../include/connection.php";

if($_GET){
    $id = check_input($_GET['id']);
    $query = mysqli_query($connect, "DELETE FROM nominees WHERE id = '$id'");
    $_SESSION['success'] = 'Nominees deleted successfully';
    header('location: ../../nominees.php');
}
?>