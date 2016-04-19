<?php
    include '../../models/project_model.php';

    $project_title = trim(filter_input(INPUT_POST, 'project_title', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH));
    $description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING));
    $pay_rate = trim(filter_input(INPUT_POST, 'pay_rate', FILTER_SANITIZE_STRING));
    $recurring = trim(filter_input(INPUT_POST, 'recurring', FILTER_SANITIZE_STRING));
    $interval = trim(filter_input(INPUT_POST, 'interval', FILTER_SANITIZE_STRING));

    if (empty($project_title) || empty($pay_rate))
    {
        header("Location: ../../views/clients_projects.php?np=n");
    }
    else
    {
        $success = new_project($project_title, $description, $pay_rate, $recurring, $interval);
        
        if ($success)
        {
            header("Location: ../../views/clients_projects/clients_projects.php?ap=y");
        }
        else
        {
            header("Location:../../views/clients_projects/clients_projects.php?ap=n");
        }
    }


 ?>
