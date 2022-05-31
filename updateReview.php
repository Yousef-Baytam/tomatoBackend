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

$query = $mysqli->prepare("Update reviews SET review = ?, status = 'pending', rating = ? WHERE users_id= ? and restaurants_id = ?");
$query->bind_param("siii", $text, $rating, $id, $restId);
$query->execute();

$nrows = $mysqli->affected_rows;
if (!$nrows) {
    echo  $nrows . '   failed';
}

if (!$mysqli)
    echo ('Error' . $mysqli->error);
