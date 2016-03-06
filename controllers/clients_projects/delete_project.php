<?php
    include '../../models/project_model.php';

    $project_id = trim(filter_input(INPUT_POST, 'project', FILTER_SANITIZE_STRING));

    if($project_id == 0)
    {
        header("Location: ../../views/clients_projects.php");
        throw new Exception("Project not selected!");
    }
    else
    {
        $success = delete_project($project_id);
        
        if ($success)
        {
            header("Location: ../../views/clients_projects.php?dp=y");
        }
        else
        {
            header("Location:../../views/clients_projects.php?dp=n");
        }
        
    }
 ?>
