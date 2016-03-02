<?php
    require ("../resources/db_connect.php");


    function create_user($name = NULL, $email = NULL, $company = NULL, $username = NULL, $password = NULL) 
    {
        if ($name == NULL || $email == NULL || $username == NULL || $password = NULL)
        {
            throw new Exception ("Missing information to add new user!");
        }
        
        global $db;

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $full_name = explode(" ", $name);
        $first_name = $full_name[0];
        $last_name = $full_name[1];
        try 
        {
            $query = $db->query("INSERT INTO users
                            (first_name, last_name, email, company, username, password)
                            VALUES
                            ('$first_name', '$last_name', '$email', '$company', '$username', '$hashed_password')"); 

            return $query;

        }
        catch (Exception $e)
        {
            error_log("We got an exception " .$e);
            return 0;
        }
    }

    function delete_user() {
        
    }

    function get_all_users() {
        
    }

    function get_user() {
        
    }

    function update_user() {
        
    }

?>