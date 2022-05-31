<?php

include("connection.php");
header('Access-Control-Allow-Origin: *');


$response = [];
$status = $_POST["status"];
$id = $_POST["id"];


$query = $mysqli->prepare("UPDATE users SET status = ? WHERE id = ?");
$query->bind_param("si", $status, $id);
if($query->execute()){
    $response["success"] = true;
}else{
    $response["failed"] = true;
}


echo json_encode($response);
