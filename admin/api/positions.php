<?php
require_once "../include/connection.php";
$positions = mysqli_query($connect, "SELECT * FROM positions");
$data = [];
while($row = mysqli_fetch_array($positions)){
    $a = [
        "id" => $row['id'],
        "name" => $row['name']
    ];
    array_push($data, $a);
}
echo json_encode($data);
?>