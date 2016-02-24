<?php
    include '../models/client_model.php'

    $client = trim(filter_input(INPUT_POST, 'client', FILTER_SANITIZE_STRING));
    $project = trim(filter_input(INPUT_POST, 'project', FILTER_SANITIZE_STRING));

    //$clients = get_all_clients();
    // If received client is in the returned array, continue;

    //$projects = get_all_projects();
    // If received project is in the returned array, continue;
 ?>
