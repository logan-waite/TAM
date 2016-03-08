<?php
    include "../../models/entry_model.php";

    $client_id = trim(filter_input(INPUT_POST, 'choose-client', FILTER_SANITIZE_STRING));
    $project_id = trim(filter_input(INPUT_POST, 'choose-project', FILTER_SANITIZE_STRING));

    if ($client_id == 0 || $project_id == 0)
    {
        echo -1;
        throw new Exception ('No client or project passed to clock-in.php');
    }
    else
    {
        $success = start_clock($client_id, $project_id);

        if ($success)
        {
            echo 1; 
        }   
        else
        {
            echo 0;
        }
    }


    
 ?>
