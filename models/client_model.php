<?php
    include '../../resources/db_connect.php';

    function delete_client()
    {

    }

    function get_all_clients()  // Returns an array containing all the clients in the database
    {
        global $db;
        
        try 
        {
            $query = "SELECT id, name
                    FROM clients";
            $result = $db->prepare($query);
            $result->execute();
        
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
                        (name, phone_number, email)
                        VALUES
                        (:name, :phone_number, :email)";
            $result = $db->prepare($query);
            $result->execute(
                array(
                    "name" => $client_name,
                    "phone_number" => $phone_number,
                    "email" => $email
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
