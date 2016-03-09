<?php
    session_start();
    date_default_timezone_set("America/Denver");
    include "../../resources/db_connect.php";

    function start_clock($client_id = NULL, $project_id = NULL)  //  Creates new entry with start time 
    {
        if ($client_id == NULL || $project_id == NULL)
        {
            throw new Exception ("No client or project passed to start_clock");
            return 0;
        }
        
        global $db;
        
        try {
            $get_query = "SELECT client_project.id, 
                                projects.name
                            FROM client_project
                            JOIN projects ON client_project.project_id = projects.id
                            WHERE client_project.client_id = :client_id
                            AND client_project.project_id = :project_id";
            $id_result = $db->prepare($get_query);
            $id_result->execute(
                array(
                    "client_id" => $client_id,
                    "project_id" => $project_id
                )
            );
            
            $id = $id_result->fetch();
            error_log($id['id']);
            
            $query = "INSERT INTO entries
                        (cp_id)
                        VALUES
                        (:cp_id)";
            $result = $db->prepare($query);
            $result->execute(
                array(
                    "cp_id" => $id['id']
                )
            );
            
            return $id['name'];
            
        }
        catch (Exception $e)
        {
            error_log("Database Error: $e");
            return 0;
        }
    }

    function stop_clock()   //  Updates entry with end time
    {
        global $db;
        
        try
        {
            $get_query = "SELECT entries.id
                            FROM entries
                            JOIN client_project
                                ON client_project.id = entries.cp_id
                            JOIN projects
                                ON projects.id = client_project.project_id
                            WHERE end_time = '0000-00-00 00:00:00'
                            AND projects.user_id = :user_id
                            ORDER BY id DESC
                            LIMIT 1";
            $active_result = $db->prepare($get_query);
            $active_result->execute(
                array(
                    "user_id" => $_SESSION['user_id']
                )
            );
            $active = $active_result->fetch();
            
            $query = "UPDATE entries
                        SET end_time = CURRENT_TIMESTAMP
                        WHERE id = :active";
            $result = $db->prepare($query);
            $result->execute(array("active" => $active['id']));
            
            return 1;
        }
        catch (Exception $e) 
        {
            error_log("Database Error: $e");
            return 0;
        }
    }

    function delete_entry()
    {
        
    }

    function get_active_entries()   // Gets all active entries (entries that don't have an end time).
    {
        global $db;
        
        try
        {
            $query = "SELECT entries.id,
                            entries.start_time,
                            projects.name 
                            FROM entries
                            JOIN client_project 
                                ON entries.cp_id = client_project.id
                            JOIN projects 
                                ON client_project.project_id = projects.id
                            WHERE entries.end_time = '0000-00-00 00:00:00'
                            AND projects.user_id = :user_id
                            ORDER BY entries.id DESC
                            LIMIT 1";
            $result = $db->prepare($query);
            $result->execute(
                array(
                    "user_id" => $_SESSION['user_id']
                )
            );
            $active = $result->fetch();
            
            return $active;
        }
        catch (Exception $e)
        {
            error_log("Database error: $e");
            return 0;
        }
    }

    function update_entry()
    {
        
    }
?>