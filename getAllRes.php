<?php
include("connection.php");

$query = $mysqli->prepare("SELECT (SELECT AVG(rating) FROM reviews WHERE reviews.restaurants_id = r.id AND reviews.status = 'approved') as rating, r.id, r.name, r.description, r.image, r.status, c.city_name, cat.category, t.type FROM types t, types_has_restaurants thr, restaurants r, reviews rev, cities c, categories_has_restaurants cath, categories cat WHERE rev.restaurants_id = r.id and r.cities_id = c.id and cath.restaurants_id = r.id and cath.categories_id = cat.id and r.id = thr.restaurants_id and thr.types_id = t.id group by r.id");
$query->execute();
$array = $query->get_result();
$response = [];

while ($item = $array->fetch_assoc()) {
    $response[] = $item;
}

$json = json_encode($response);
echo $json;