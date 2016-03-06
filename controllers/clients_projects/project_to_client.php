<?php
    include "../../models/project_model.php";

    $client_id = trim(filter_input(INPUT_POST, 'client', FILTER_SANITIZE_NUMBER_INT));
    $project_id = trim(filter_input(INPUT_POST, 'project', FILTER_SANITIZE_NUMBER_INT));

    if ($client_id == 0)
    {
        header("Location: ../../views/clients_projects.php");
        throw new Exception("Client not selected!");
    }
    else if ($project_id == 0)
    {
        header("Location: ../../views/clients_projects.php");
        throw new Exception("Project not selected!");
    }

    $success = assign_project_to_client($client_id, $project_id);
    
    if ($success)
    {
        header("Location: ../../views/clients_projects.php?cp=y");
    }
    else
    {
        header("Location:../../views/clients_projects.php?cp=n");
    }
    

?>