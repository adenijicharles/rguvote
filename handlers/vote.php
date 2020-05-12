<?php 
session_start();

include "../include/functions.php";
include "../include/connection.php";

$data = json_decode(file_get_contents("php://input"));
$nominee_id = $data->nominee_id;
$student_id = $data->student_id;
$position_id = $data->position;

$check = mysqli_query($connect, "SELECT * FROM votes WHERE student_id = '$student_id' AND position_id = '$position_id'");
$count = mysqli_num_rows($check);
if($count){
    http_response_code(200);
    echo json_encode([
        "message" => "You have already voted in this position",
        "status" => false
    ]);
}else{
    $query = mysqli_query($connect, "INSERT INTO votes (student_id, nominee_id, position_id) VALUES ('$student_id', '$nominee_id', '$position_id')");
    http_response_code(201);
    echo json_encode([
        "message" => "Voting successful",
        "status" => true
    ]);
}
?>