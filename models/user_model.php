<?php
    require ("../../resources/db_connect.php");


    function create_user($name = NULL, $email = NULL, $company = NULL, $username = NULL, $password = NULL) 
    {
        if ($name == NULL || $email == NULL || $username == NULL || $password = NULL)
        {
            throw new Exception ("Missing information to add new user!");
        }
        
        global $db;

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $full_name = explode(" ", $name);
        $first_name = trim($full_name[0]);
        $last_name = trim($full_name[1]);
        try 
        {
            $query = "INSERT INTO users
                            (first_name, last_name, email, company, username, password)
                            VALUES
                            (:first_name, :last_name, :email, :company, :username, :password)";
            $result = $db->prepare($query);
            $result->execute(
                array(
                    "first_name" => $first_name,
                    "last_name" => $last_name,
                    "email" => $email,
                    "company" => $company,
                    "username" => $username,
                    "password" => $hashed_password
                )
            );
            return 1;
        }
        catch (Exception $e)
        {
            error_log("We got this exception: " .$e);
            return $e;
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