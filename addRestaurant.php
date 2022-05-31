<?php

include("connection.php");
header('Access-Control-Allow-Origin: *');


$response = [];
$img = $_POST["img"];
$name = $_POST["name"];
$description = $_POST["description"];
$city = $_POST["city"];
$status = $_POST["status"];
$category = $_POST["category"];
$type = $_POST["type"];


$query = $mysqli->prepare("INSERT INTO restaurants (image, name, description, cities_id, status) VALUES (?, ?, ?, ?, ?)");
$query->bind_param("sssss", $img, $name, $description, $city, $status);
$query->execute()



$query2 = $mysqli->prepare("INSERT INTO categories_has_restaurants (categories_id, restaurants_id) VALUES (?, ?)");
$query3 = $mysqli->prepare("INSERT INTO types_has_restaurants (types_id, restaurants_id) VALUES (?, ?)");

$query2->bind_param("ss", $category, $query->insert_id);
$query3->bind_param("ss", $type, $query->insert_id);

$response["success"] = true;



echo json_encode($response);
