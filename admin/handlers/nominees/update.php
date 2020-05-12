<?php
session_start();
include "../../../include/functions.php";
include "../../../include/connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    check_for_empty_inputs($_POST, "../edit-nominee.php?id=$id");
    
    $name = $_POST['name'];
    $student_id = $_POST['student_id'];
    $level = $_POST['level'];
    $school = $_POST['school'];
    $sex = $_POST['sex'];
    $ethnicity = $_POST['ethnicity'];
    $bio = $_POST['bio'];
    $position = $_POST['position'];


    // upload picture profile
    $image_file_name = $_FILES['picture']['name'];
    $image_file_size = $_FILES['picture']['size'];
    $image_file_tmp = $_FILES['picture']['tmp_name'];
    $image_file_type = $_FILES['picture']['type'];
    $image_file_ext = strtolower(end(explode('.',$_FILES['picture']['name'])));
        
    $extensions = array("jpeg","jpg","png", "JPG", "JPEG", "mp4");
    
    if(in_array($image_file_ext, $extensions) === false){           
       $_SESSION['error'] = 'Image extension not allowed, please choose a JPEG or PNG file.';
       header("location: ../../edit-nominee.php?id=$id");
       die();
    }
    move_uploaded_file($image_file_tmp, "../../../uploads/pictures/".$image_file_name);



    // upload video manifesto
     $video_file_name = $_FILES['video']['name'];
     $video_file_size = $_FILES['video']['size'];
     $video_file_tmp = $_FILES['video']['tmp_name'];
     $video_file_type = $_FILES['video']['type'];
     $video_file_ext = strtolower(end(explode('.',$_FILES['video']['name'])));
         
     
     if(in_array($video_file_ext, $extensions) === false){           
        $_SESSION['error'] = 'Video extension not allowed, please choose a mp4 file.';
        header("location: ../../edit-nominee.php?id=$id");
        die();
     }
     move_uploaded_file($video_file_tmp, "../../../uploads/videos/".$video_file_name);

    
    $query = mysqli_query($connect, "UPDATE nominees SET name = '$name', student_id  = '$student_id', level = '$level', school = '$school', sex = '$sex', ethnicity = '$ethnicity', bio = '$bio', manifesto = '$video_file_name', position = '$position', picture = '$image_file_name' WHERE id = '$id'");
    if($query) {
        $_SESSION['success'] = 'Nominee details updated successfully';
        header('location: ../../nominees.php');
    } else {
        $_SESSION['error'] = 'Unable to update nominee';
        header("location: ../../edit-nominee.php?id=$id");
    }
}
?>