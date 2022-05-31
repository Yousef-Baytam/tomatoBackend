<?php

include("connection.php");
header('Access-Control-Allow-Origin: *');


$response = [];
$id = $_POST["id"];
$img = $_POST["img"];
$name = $_POST["name"];
$description = $_POST["description"];
$city = $_POST["city"];
$status = $_POST["status"];


$query = $mysqli->prepare("UPDATE restaurants SET image = ?, name = ?, description = ?, cities_id = ?, status = ? WHERE id = ?");
$query->bind_param("ssssss", $img, $name, $description, $city, $status, $id);
if($query->execute()){
    $response["success"] = true;
}else{
    $response["failed"] = true;
}


echo json_encode($response);
