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


$insertQuery = $mysqli->prepare("INSERT INTO restaurants (image, name, description, cities_id, status) VALUES (?, ?, ?, ?, ?) ");
$insertQuery->bind_param("sssss", $img, $name, $description, $city, $status);
$insertQuery->execute();

$selectQuery = $mysqli->prepare("SELECT id FROM restaurants ORDER BY id DESC LIMIT 1");
$selectQuery->execute();
$selectQuery->store_result();;
$selectQuery->bind_result($id);
$selectQuery->fetch();


$query2 = $mysqli->prepare("INSERT INTO categories_has_restaurants (categories_id, restaurants_id) VALUES (?, ?)");
$query2->bind_param("ss", $category, $id);
$query2->execute();


$query3 = $mysqli->prepare("INSERT INTO types_has_restaurants (types_id, restaurants_id) VALUES (?, ?)");
$query3->bind_param("ss", $type, $id);
$query3->execute();

$response["success"] = true;
$response["id"] = $id;


echo json_encode($response);
