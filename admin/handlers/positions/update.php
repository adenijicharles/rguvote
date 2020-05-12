<?php
session_start();
include "../../../include/functions.php";
include "../../../include/connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    check_for_empty_inputs($_POST, "../position.php");
    $name = $_POST['name'];
    $id = $_POST['id'];
    $query = mysqli_query($connect, "UPDATE positions SET name = '$name' WHERE id = '$id'");
    if($query) {
        $_SESSION['success'] = 'Position updated successfully';
        header('location: ../../positions.php');
    } else {
        $_SESSION['error'] = 'Unable to update position';
        header('location: ../../add-position.php');
    }
}
?>