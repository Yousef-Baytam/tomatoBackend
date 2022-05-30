<?php
include("connection.php");

if (!isset($_POST["id"]) || !isset($_POST["rating"]) || !isset($_POST["text"]) || !isset($_POST["restId"])) {
    die('Error');
};

$id = $_POST["id"];
$rating = $_POST["rating"];
$text = $_POST["text"];
$restId = $_POST["restId"];
$status = 'pending';

$query = $mysqli->prepare("INSERT INTO reviews(rating, restaurants_id, review, status, users_id) VALUES (?, ?, ?, ?, ?)");
$query->bind_param("iissi", $rating, $restId, $text, $status, $id);
$query->execute();

$nrows = $mysqli->affected_rows;
if (!$nrows) {
    echo  $nrows . '   failed';
}

if (!$mysqli)
    echo ('Error' . $mysqli->error);
