<?php
    include '../resources/db_connect.php';

    function assign_project_to_client() {

    }

    function delete_client()
    {

    }

    function get_all_clients()  // Returns an array containing all the clients in the database
    {

    }

    function get_specific_client()
    {

    }

    function new_client($client_name, $phone_number, $email)
    {
        /* Prepared statement, stage 1: prepare */
        if (!($stmt = mysqli_prepare($link, "INSERT INTO clients(name, phone_number, email) VALUES (?)")))
        {
            echo "Prepare failed: ";
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        }
        echo "let's insert stuff!";

        /* Prepared statement, stage 2: bind and execute
        if (!$stmt->bind_param("s", $client_name))
        {
            echo "Binding parameters failed for {$client_name}: (" . $stmt->errno . ") " . $stmt->error;
        }
        elseif (!$stmt->bind_param("s", $phone_number))
        {
            echo "Binding parameters failed for {$phone_number}: (" . $stmt->errno . ") " . $stmt->error;
        }
        elseif (!$stmt->bind_param("s", $email))
        {
            echo "Binding parameters failed for {$email}: (" . $stmt->errno . ") " . $stmt->error;
        }
        else
        {
                echo "Prep complete!";
        } */
    }

    function update_client()
    {

    }
 ?>
