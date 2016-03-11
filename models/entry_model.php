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

    function determine_entry_length($start_time = NULL, $end_time = NULL)
    {
        if($start_time == NULL || $end_time == NULL)
        {
            throw new Exception("Did not recieve either start or end times! Start: $start_time; End: $end_time");
        }
        
        $start = new DateTime($start_time);
        $end = new DateTime($end_time);

        $diff = $start->diff($end);

        $time = $diff->h.":".$diff->i.":".$diff->s;
        return $time;
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

    //  Gets entries, finds how long they took, and return an array of clients, projects, and entry times
    // Array is multidimensional, with times in a projects array in a clients array in the whole thing, as so:
    /*
    *    array(1) {
    *        ["client"]=>
    *        array(1) {
    *            ["project"]=>
    *            array(1) {
    *                [0]=>
    *                string(7) "1:12:39"
    *            }
    *        }
    *    }
    */
    function get_entry_times()  
    {
        global $db;
        $query = "SELECT clients.name AS client,
                         projects.name AS project,
                         entries.start_time,
                         entries.end_time
                  FROM entries
                  JOIN client_project cp
                    ON entries.cp_id = cp.id
                  JOIN clients
                    ON cp.client_id = clients.id
                  JOIN projects
                    ON cp.project_id = projects.id
                  WHERE clients.user_id = :user_id
                  ORDER BY client";
        $result = $db->prepare($query);
        $result->execute(array("user_id" => $_SESSION['user_id']));
        
        $entries = $result->fetchAll();
        
        $all_entries = array();
        $i = 0;
        
        foreach ($entries as $entry)
        {
            $time = determine_entry_length($entry['start_time'], $entry['end_time']);
            $client = $entry['client'];
            if (!array_key_exists($client, $all_entries))   //  If the client is not in the all_entries array yet
            {
                $all_entries[] = array(
                    $client => array()
                );    //  Create a new array with the client name as the key
                $project = $entry['project'];
                $all_entries[$i][$client] = array($project => $time);  // Create a new array under the client with the project name as the key
            }
            elseif (array_key_exists($client, $all_entries))    //  If the client already has an array
            {                
                $project = $entry['project'];
                if (!array_key_exists($project, $all_entries[$client])) //  If the project is not in the client array
                {
                    $all_entries[$client][$project] = array($time);  // Create a new array with the project name as the key

                }
                elseif (array_key_exists($project, $all_entries[$client]))
                {
                    $all_entries[$client][$project][] = $time;
                }
            }  
        }
        return $all_entries;
    }

    function update_entry()
    {
        
    }
?>