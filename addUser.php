<?php

include("connection.php");

if (!isset($_POST["first"]) || !isset($_POST["last"]) || !isset($_POST["email"]) || !isset($_POST["phone"]) || !isset($_POST["dob"]) || !isset($_POST["passwrod"])) {
    die('Error');
};

$first_name = $_POST["first"];
$last_name = $_POST["last"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$dob = $_POST["dob"];
$cities_id = 1;
$user_types_id = 1;
$user_status = 'active';
$password = hash("sha256", $_POST["passwrod"]);

$query = $mysqli->prepare("INSERT INTO users(first_name, last_name, email, phone_number, dob, cities_id, user_types_id, user_status, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$query->bind_param("sssisiiss", $first_name, $last_name, $email, $phone, $dob, $cities_id, $user_types_id, $user_status, $password);
$query->execute();

if (!$mysqli)
    echo ('Error' . $mysqli->error);
header('Location: /tomato/tomatoFrontend');
