<?php
    require '../models/client_model.php';

    $client_name = trim(filter_input(INPUT_POST, 'client_name', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH));
    $phone_number = trim(filter_input(INPUT_POST, 'phone_number', FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));

    if(empty($phone_number) && empty($email))
    {
        header("Location: ../views/clients_projects.php?nc=n");
    }
    else
    {
        new_client($client_name, $phone_number, $email);
    }

 ?>
