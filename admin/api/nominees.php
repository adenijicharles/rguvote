<?php
require_once "../include/connection.php";
$position = $_GET['position'];
$nominees = mysqli_query($connect, "SELECT * FROM nominees WHERE position = '$position'");
$data = [
  
];
while($row = mysqli_fetch_array($nominees)){
    $a = [
        "id" => $row['id'],
        "name" => $row['name'],
        "student_id" => $row['student_id'],
        "picture" => $row['picture']
    ];
    array_push($data, $a);
}
echo json_encode($data);
?>