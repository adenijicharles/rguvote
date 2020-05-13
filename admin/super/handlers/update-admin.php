<?php
session_start();
include "../../../include/functions.php";
include "../../../include/connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $staff = $_POST['staff_id'];
    $email = $_POST['email'];

    
    $query = mysqli_query($connect, "UPDATE administrators SET fullname = '$name', staff_id  = '$staff', email = '$email' WHERE id = '$id'");
    if($query) {
        $_SESSION['success'] = 'Administrator details updated successfully';
        header('location: ../index.php');
    } else {
        $_SESSION['error'] = 'Unable to update administrator details';
        header("location: ../../update-admin.php?id=$id");
    }
}
?>