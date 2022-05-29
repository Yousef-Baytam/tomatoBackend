<?php

$host = "localhost";
$db_user = "root";
$db_pass = null;
$db_name = "tomatodb";

$mysqli = new mysqli($host, $db_user, $db_pass, $db_name);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
