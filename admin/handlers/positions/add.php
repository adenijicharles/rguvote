<?php
session_start();
include "../../../include/functions.php";
include "../../../include/connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    check_for_empty_inputs($_POST, "../add-position.php");
    $name = $_POST['name'];
    $query = mysqli_query($connect, "INSERT INTO positions (name) VALUES ('$name')");
    if($query) {
        $_SESSION['success'] = 'Position added successfully';
        header('location: ../../positions.php');
    } else {
        $_SESSION['error'] = 'Unable to add position';
        header('location: ../../add-position.php');
    }
}
?>