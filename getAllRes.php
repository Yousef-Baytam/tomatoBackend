<?php
include("connection.php");

$query = $mysqli->prepare("SELECT r.name, r.description, r.id, r.image, r.status, AVG(rev.rating), c.name, cat.category FROM restaurants r, reviews rev, cities c, categories_has_restaurants cath, categories cat WHERE rev.restaurants_id = r.id and r.cities_id = c.id and cath.restaurants_id = r.id and cath.categories_id = cat.id group by r.id");
$query->execute();
$query->store_result();
$num_rows = $query->num_rows;
$query->bind_result($n, $l, $e, $p, $pp, $s, $d, $t);
$query->fetch();
$response = [];
if ($num_rows == 0) {
    $response["response"] = "User Not Found";
} else {
    $response["name"] = $n;
    $response["last"] = $l;
    $response["email"] = $e;
    $response["phone"] = $p;
    $response["profilePic"] = $pp;
    $response["status"] = $s;
    $response["dob"] = $d;
    $response["type"] = $t;
}
$json = json_encode($response);
echo $json;
