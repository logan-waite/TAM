<?php
    include '../models/client_model.php';

    $client = trim(filter_input(INPUT_POST, 'client', FILTER_SANITIZE_STRING));

    // $clients = get_all_clients();
    // If received client is in the returned array, continue;
    // Get ID from matched client
    // run delete_client function
    // return success
 ?>
