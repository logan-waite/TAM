<?php

$user = 'root';
$password = 'S3r3nity';
$db = 'PAT';
$host = '73.3.75.122';
//$port = 8889;

$link = mysqli_connect("$host", "$user", "$password", "$db");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
} else {
    echo "Connected!";
}
?>
