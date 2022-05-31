<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
include("connection.php");
$query = $mysqli->prepare("SELECT r.*, (SELECT AVG(rating) FROM reviews WHERE reviews.restaurants_id = r.id AND reviews.status = 'approved') as rate FROM restaurants r;");
$query->execute();
$array = $query->get_result();
$response = [];
while($item = $array->fetch_assoc()){
    $response[] = $item;
} 
$json = json_encode($response);
echo $json;

?>