<?php
include("connection.php");

$cat = $_GET['cat'];
$query = $mysqli->prepare("SELECT 
r.*,
(SELECT AVG(reviews.rating) FROM reviews WHERE reviews.restaurants_id = r.id AND reviews.status = 'approved') as rating,
c.city_name,
GROUP_CONCAT(cat.category ORDER BY cat.id) as category,
GROUP_CONCAT(t.type ORDER BY t.id) as type
FROM restaurants r
JOIN cities c ON c.id = r.cities_id
JOIN categories_has_restaurants chr ON chr.restaurants_id = r.id
JOIN categories cat ON cat.id = chr.categories_id
JOIN types_has_restaurants thr ON thr.restaurants_id = r.id
JOIN types t ON t.id = thr.types_id
where t.type= ?
GROUP BY r.id");
$query->bind_param("s", $cat);
$query->execute();
$array = $query->get_result();
$response = [];

while ($item = $array->fetch_assoc()) {
    $response[] = $item;
}

$json = json_encode($response);
echo $json;
