<?php
session_start();
include "../../../include/functions.php";
include "../../../include/connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    check_for_empty_inputs($_POST, "../add-nominee.php");
    
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
       header('location: ../../add-nominee.php');
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
        header('location: ../../add-nominee.php');
        die();
     }
     move_uploaded_file($video_file_tmp, "../../../uploads/videos/".$video_file_name);

    
    $query = mysqli_query($connect, "INSERT INTO nominees (student_id, name, level, school, sex, ethnicity, bio, manifesto, position, picture) VALUES ('$student_id', '$name', '$level', '$school', '$sex', '$ethnicity', '$bio', '$video_file_name', '$position', '$image_file_name')");
    if($query) {
        $_SESSION['success'] = 'Nominee added successfully';
        header('location: ../../nominees.php');
    } else {
        $_SESSION['error'] = 'Unable to add nominee';
        header('location: ../../add-nominee.php');
    }
}
?>