<?php
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
            $get_query = "SELECT id
                            FROM client_project
                            WHERE client_id = :client_id
                            AND project_id = :project_id";
            $id_result = $db->prepare($get_query);
            $id_result->execute(
                array(
                    "client_id" => $client_id,
                    "project_id" => $project_id
                )
            );
            
            $id = $id_result->fetch();
            
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
            
            return 1;
            
        }
        catch (Exception $e)
        {
            error_log("Database Error: $e");
            return 0;
        }
    }

    function stop_clock()   //  Updates entry with end time
    {
        
    }

    function delete_entry()
    {
        
    }

    function get_all_entries()
    {
        
    }

    function update_entry()
    {
        
    }
?>