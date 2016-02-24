<?php
    $client = trim(filter_input(INPUT_POST, 'choose-client', FILTER_SANITIZE_STRING));
    $project = trim(filter_input(INPUT_POST, 'choose-project', FILTER_SANITIZE_STRING));

    echo $client;
    echo $project;
 ?>
