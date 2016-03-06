<?php
    include '../../models/client_model.php';

    $client_id = trim(filter_input(INPUT_POST, 'client', FILTER_SANITIZE_STRING));

    if($client_id == 0)
    {
        header("Location: ../../views/clients_projects.php");
        throw new Exception("Client not selected!");
    }
    else
    {
        $success = delete_client($client_id);
        
        if ($success)
        {
            header("Location: ../../views/clients_projects.php?dc=y");
        }
        else
        {
            header("Location:../../views/clients_projects.php?dc=n");
        }
        
    }
    
 ?>
