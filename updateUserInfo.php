<?php
include("connection.php");

if (!isset($_POST["id"]) || !isset($_POST["name"]) || !isset($_POST["last"]) || !isset($_POST["email"]) || !isset($_POST["phone"]) || !isset($_POST["location"]) || !isset($_POST["dob"])) {
    die('fuck you');
};

$id = $_POST["id"];
$name = $_POST["name"];
$last = $_POST["last"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$location = $_POST["location"];
$dob = $_POST["dob"];


$query = $mysqli->prepare("Update users u, cities c SET first_name = ?, last_name = ?, email = ?, phone_number = ?, dob = ?, cities_id = c.id WHERE u.id= ? and c.name = ?");
$query->bind_param("sssiiis", $name, $last, $email, $phone, $dob, $id, $cities_id);
$query->execute();

$nrows = $mysqli->affected_rows;
if (!$nrows) {
    echo  $nrows . '   failed';
}

if (!$mysqli)
    echo ('Error' . $mysqli->error);
