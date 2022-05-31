<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
include("connection.php");

$id = $_POST["id"];

$query = $mysqli->prepare("SELECT * FROM restaurants WHERE id = ?");
$query->bind_param("i",  $id);
$query->execute();
$array = $query->get_result();
$response = [];
while($item = $array->fetch_assoc()){
    $response[] = $item;
} 
$json = json_encode($response);
echo $json;

?>