<?php
    require '../models/client_model.php';

    $client_name = trim(filter_input(INPUT_POST, 'project_title', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH));
    $phone_number = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST, 'pay_rate', FILTER_SANITIZE_STRING));

    if(empty($project_title))
    {
        header("Location: ../views/clients_projects.php?np=n");
    }
    elseif (empty($description))
    {
        header("Location: ../views/clients_projects.php?np=n");
    }
    elseif (empty($pay_rate))
    {
        header("Location: ../views/clients_projects.php?np=n");
    }
    else
    {
        
    }

 ?>
