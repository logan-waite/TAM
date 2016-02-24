<?php
    include '../models/project_model.php';

    $project = trim(filter_input(INPUT_POST, 'project', FILTER_SANITIZE_STRING));

    //$projects = get_all_projects();
    // If received project is in the returned array, continue;
    // Get ID from matched project
    // run delete_project function
    // return success
 ?>
