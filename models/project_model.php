<?php
    include '../../resources/db_connect.php';

    function assign_project_to_client() {
        
    }

    function delete_project()
    {

    }

    function get_all_projects()  // Returns an array containing all the projects in the database
    {

    }

    function get_specific_project()
    {

    }

    function new_project($title = NULL, $description = NULL, $pay_rate = NULL)
    {
        if ($title == NULL || $description == NULL || $pay_rate = NULL)
        {
            throw new Exception("Project missing information! Title: {$title}; Description: {$description}; Pay: {$pay_rate}");
        }
        
        global $db;
        
        try {
            $query = "INSERT INTO projects
                        (name, description, pay_rate)
                        VALUES
                        (:title, :description, :pay_rate)";
            $result = $db->prepare($query);
            $result->execute(
                array(
                    "title" => $title,
                    "description" => $description,
                    "pay_rate" => $pay_rate
                )
            );
            return 1;
        }
        catch (Exception $e)
        {
            error_log("Database Error: $e");
            return 0;
        }
    }

    function update_project()
    {

    }
 ?>
