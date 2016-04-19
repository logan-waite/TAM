<?php
    session_start();
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
    *   array(1) {
    *        ["Project 1"]=>
    *            string(8) "00:01:39"
    *        ["Project 2"]=>
    *            string(8) "00:02:44"
    *    }   
    */
    function get_project_entry_times($client_id = NULL, $pay = FALSE)  
    {
        if ($client_id == NULL)
        {
            throw new Exception ("client_id was passed NULL into get_project_entry_times");
        }
        global $db;
        $query = "SELECT projects.name AS project,
                         projects.pay_rate AS pay,
                         entries.start_time,
                         entries.end_time
                  FROM entries
                  JOIN client_project cp
                    ON entries.cp_id = cp.id
                  JOIN projects
                    ON cp.project_id = projects.id
                  WHERE projects.user_id = :user_id
                  AND cp.client_id = :client_id";
        $result = $db->prepare($query);
        $result->execute(
            array(
                "user_id" => $_SESSION['user_id'],
                "client_id" => $client_id
            )
        );
        
        $entries = $result->fetchAll();
        
        $times = array();
        foreach ($entries as $entry)
        {
            $pay = $entry['pay'];
            $project = $entry['project'];
            $start = new DateTime($entry['start_time']);
            $end = new DateTime($entry['end_time']);
            $diff = $start->diff($end);
            $test = "";
            if(array_key_exists($project, $times))
            {
                $existing = new DateTime($times[$project]);
                $existing->add($diff);
                $time_string = $existing->format("H:i:s");
                $times[$project] = $time_string;
                $test = $time_string;

            }
            else
            {
                $new = new DateTime($diff->h.":".$diff->i.":".$diff->s);
                $times[$project] = $new->format("H:i:s");
            }
            
        }
        return $times;
    }

    function update_entry()
    {
        
    }
?>