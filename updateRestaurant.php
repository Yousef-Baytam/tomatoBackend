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
$category = $_POST["category"];
$type = $_POST["type"];


$query = $mysqli->prepare("UPDATE restaurants SET image = ?, name = ?, description = ?, cities_id = ?, status = ? WHERE id = ?");
$query->bind_param("ssssss", $img, $name, $description, $city, $status, $id);
$query->execute();

$query2 = $mysqli->prepare("UPDATE categories_has_restaurants SET categories_id = ? WHERE restaurants_id = ?");
$query2->bind_param("ss", $category, $id);
$query2->execute();

$query3 = $mysqli->prepare("UPDATE types_has_restaurants SET types_id = ? WHERE restaurants_id = ?");
$query3->bind_param("ss", $type, $id);
$query3->execute();


$response["success"] = true;



echo json_encode($response);
