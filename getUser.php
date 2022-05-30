<?php
include("connection.php");

$id = $_GET["id"];
$query = $mysqli->prepare("Select u.first_name, u.last_name, u.email, u.phone_number, u.profile_pic, u.user_status, u.dob, t.user_type, c.city_name FROM users u, user_types t, cities c WHERE u.id = ? and u.user_types_id = t.id and u.cities_id = c.id");
$query->bind_param("i", $id);
$query->execute();
$query->store_result();
$num_rows = $query->num_rows;
$query->bind_result($n, $l, $e, $p, $pp, $s, $d, $t, $c);
$query->fetch();
$response = [];
$pp = base64_decode($pp);
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
    $response["city"] = $c;
}
$json = json_encode($response);
echo $json;
