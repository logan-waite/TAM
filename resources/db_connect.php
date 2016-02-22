<?php

$user = 'root';
$password = 'root';
$db = 'PAT';
$host = 'localhost';
$port = 8888;

$link = mysqli_connect("$host", "$user", "$password", "$db");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
} else {
    //echo "Connected!";
}
?>
