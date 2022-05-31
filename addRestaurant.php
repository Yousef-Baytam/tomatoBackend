<?php

include("connection.php");
header('Access-Control-Allow-Origin: *');


$response = [];
$img = $_POST["img"];
$name = $_POST["name"];
$description = $_POST["description"];
$city = $_POST["city"];
$status = $_POST["status"];


$query = $mysqli->prepare("INSERT INTO restaurants (image, name, description, cities_id, status) VALUES (?, ?, ?, ?, ?)");
$query->bind_param("sssss", $img, $name, $description, $city, $status);
if($query->execute()){
    $response["success"] = true;
}else{
    $response["failed"] = true;
}


echo json_encode($response);
