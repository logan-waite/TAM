<?php

$port = 8888;

try 
{
    $db = new PDO(
        "mysql:host=localhost;dbname=PAT",
        "root",
        "root"
    );
    

    $db->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

    $db->setAttribute(
        PDO::ATTR_DEFAULT_FETCH_MODE,
        PDO::FETCH_ASSOC
    );

    } 
catch (Exception $error) 
{
        error_log("Cannot connect to the database");
}

?>
