<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
include("connection.php");
$query = $mysqli->prepare("SELECT * FROM categories;");
$query->execute();
$array = $query->get_result();
$response = [];
while($item = $array->fetch_assoc()){
    $response[] = $item;
} 
$json = json_encode($response);
echo $json;

?>