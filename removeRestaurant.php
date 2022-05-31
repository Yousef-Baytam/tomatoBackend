<?php

include("connection.php");
header('Access-Control-Allow-Origin: *');


$response = [];
$id = $_POST["id"];


$query = $mysqli->prepare("DELETE FROM restaurants WHERE id = ?");
$query->bind_param("i",  $id);
if($query->execute()){
    $response["success"] = true;
}else{
    $response["failed"] = true;
}


echo json_encode($response);
