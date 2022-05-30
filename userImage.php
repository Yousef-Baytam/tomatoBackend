<?php
include("connection.php");

if (!isset($_POST["img"]) || !isset($_POST["id"])) {
    die('fuck you');
};

$img = base64_encode($_POST["img"]);
$id = $_POST["id"];

$query = $mysqli->prepare("Update users SET profile_pic = ? WHERE id= ?");
$query->bind_param('si', $img, $id);
$query->execute();

$nrows = $mysqli->affected_rows;
if (!$nrows) {
    echo  $nrows . '   failed';
}

if (!$mysqli)
    echo ('Error' . $mysqli->error);
