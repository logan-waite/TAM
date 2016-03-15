<?php
    include '../../resources/db_connect.php';
    session_start();

    function delete_client($client_id = NULL)
    {
        if ($client_id == NULL)
        {
            throw new Exception("NULL client_id passed into delete_client!");
        }
        
        global $db;
        
        try
        {
            $query = "DELETE FROM clients
                        WHERE id = :client_id";
            $result = $db->prepare($query);
            $result->execute(
                array(
                    "client_id" => $client_id
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

    function get_active_clients()
    {
        global $db;
        $query = "SELECT clients.id, clients.name
                    FROM clients
                    JOIN client_project cp
                        ON clients.id = cp.client_id
                    JOIN entries
                        ON cp.id = entries.cp_id
                    WHERE clients.user_id = :user_id
                    GROUP BY clients.name";
        $results = $db->prepare($query);
        $results->execute(
            array(
                "user_id" => $_SESSION['user_id']
            )
        );
        
        return $results->fetchAll();
    }

    function get_all_clients()  // Returns an array containing all the user's clients in the database
    {
        global $db;
        
        try 
        {
            $query = "SELECT id, name
                    FROM clients
                    WHERE user_id = :user_id
                    ORDER BY name";
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

    function get_client_projects($client_id = NULL) //  Returns an array of a client's projects
    {
        if ($client_id == NULL)
        {
            throw new Exception ('Invalid client_id passed into get_client_projects');
        }
        
        global $db;
        
        try
        {
            $query = "SELECT projects.name, projects.id
                        FROM client_project
                        JOIN projects
                            ON client_project.project_id = projects.id
                        WHERE client_id = :client_id";
            $result = $db->prepare($query);
            $result->execute(
                array(
                    "client_id" => $client_id
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

    function get_specific_client()
    {

    }

    function new_client($client_name = NULL, $phone_number = NULL, $email = NULL)
    {
        if ($client_name == NULL || ($phone_number == NULL && $email == NULL))
        {
            throw new Exception ("We are missing information! Client: {$client_name}; Phone: {$phone_number}; Email: {$email}");
        }
        
        global $db;
        
        try {
            $query = "INSERT INTO clients
                        (name, phone_number, email, user_id)
                        VALUES
                        (:name, :phone_number, :email, :user_id)";
            $result = $db->prepare($query);
            $result->execute(
                array(
                    "name" => $client_name,
                    "phone_number" => $phone_number,
                    "email" => $email,
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

    function update_client()
    {

    }
 ?>
