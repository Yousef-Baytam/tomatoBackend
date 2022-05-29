<?php

include("connection.php");

$first_name = $_POST["first"];
$last_name = $_POST["last"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$dob = $_POST["phone"];
$cities_id = 1;
$user_types_id = 1;
$user_status = 'active';
$password = hash("sha256", $_POST["passwrod"]);

$query = $mysqli->prepare("INSERT INTO users(first_name, last_name, email, phone_number, dob, cities_id, user_types_id, user_status, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$query->bind_param("sssisiiss", $first_name, $last_name, $email, $phone, $dob, $cities_id, $user_types_id, $user_status, $password);
$query->execute();

$response = [];
$response["success"] = true;
header("Location: http://localhost/tomato/tomatoFrontend/views/profile.html");


echo json_encode($response);
