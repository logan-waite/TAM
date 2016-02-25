<?php

$user = 'root';
$password = 'root';
$db = 'PAT';
$host = 'localhost';
$port = 8888;

try {
    $link = new PDO(
        "mysql:host=$host;dbname=$db",
        "$user",
        "$password"
    );

    $link->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

    $link->setAttribute(
        PDO::ATTR_DEFAULT_FETCH_MODE,
        PDO::FETCH_ASSOC
    );

    } catch (Exception $error) {
        echo "Cannot connect to the database.<br>";
    }

?>
