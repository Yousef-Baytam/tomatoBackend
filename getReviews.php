<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
include("connection.php");
$query = $mysqli->prepare("SELECT reviews.*, CONCAT(users.first_name,' ', users.last_name) FROM reviews JOIN users ON users.id = reviews.users_id;");
$query->execute();
$array = $query->get_result();
$response = [];
while($item = $array->fetch_assoc()){
    $response[] = $item;
} 
$json = json_encode($response);
echo $json;

?>


