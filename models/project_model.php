<?php
    include '../../resources/db_connect.php';
    session_start();

    function assign_project_to_client($client_id = NULL, $project_id = NULL) 
    {
        if ($client_id == NULL || $project_id == NULL)
        {
            throw new Exception ("assign_project_to_client received NULL parameters!");
        }
        
        global $db;
        
        try 
        {
            $query = "INSERT INTO client_project
                        (client_id, project_id)
                        VALUES
                        (:client_id, :project_id)";
            $result = $db->prepare($query);
            $result->execute(
                array(
                    "client_id" => $client_id, 
                    "project_id" => $project_id
                )
            );
            return 1;
        }
        catch (Exception $e)
        {
            error_log("Database error: $e");
            return 0;
        }
    }

    function delete_project($project_id = NULL)
    {
        if ($project_id == NULL)
        {
            throw new Exception("NULL project_id passed into delete_project!");
        }
        
        global $db;
        
        try
        {
            $query = "DELETE FROM projects
                        WHERE id = :project_id";
            $result = $db->prepare($query);
            $result->execute(
                array(
                    "project_id" => $project_id
                )
            );
            return 1;
        }
        catch (Exception $e)
        {
            error_log("Database error: $e");
            return 0;
        }
    }

    function get_all_projects()  // Returns an array containing all the projects in the database by name
    {
        global $db;
        
        try {
            $query = "SELECT id, name
                    FROM projects
                    WHERE user_id = :user_id";
            $result = $db->prepare($query);
            $result->execute(
                array(
                    "user_id" => $_SESSION['user_id']
                )
            );
        
            return $result->fetchAll();
        }
        catch (Exception $e)
        {
            error_log("Database error: $e");
            return 0;
        }

    }

    function get_specific_project()
    {

    }

    function new_project($title = NULL, $description = NULL, $pay_rate = NULL, $recurring, $interval)
    {
        if ($title == NULL || $pay_rate == NULL)
        {
            throw new Exception("Project missing information! Title: {$title}; Pay: {$pay_rate}");
        }
        
        global $db;
        
        if($recurring == 'on')
        {
            $recurring = 1;
        }
        else
        {
            $recurring = 0;
            $interval = 0;
        }
        
        try {
            $query = "INSERT INTO projects
                        (name, description, pay_rate, user_id, recurring, interval_id)
                        VALUES
                        (:title, :description, :pay_rate, :user_id, :recurring, :interval)";
            $result = $db->prepare($query);
            $result->execute(
                array(
                    "title" => $title,
                    "description" => $description,
                    "pay_rate" => $pay_rate,
                    "recurring" => $recurring,
                    "interval" => $interval,
                    "user_id" => $_SESSION['user_id']
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
