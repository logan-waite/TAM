<?php
    require ("../../resources/db_connect.php");


    function create_user($name = NULL, $email = NULL, $company = NULL, $username = NULL, $password = NULL) 
    {

        if ($name == NULL || $email == NULL || $username == NULL || $password == NULL)
        {
            throw new Exception ("Missing information to add new user!");
        }

        global $db;
              
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $full_name = explode(" ", $name);
        $first_name = trim($full_name[0]);
        $last_name = trim($full_name[1]);
        
        //error_log('password');
        error_log(password_verify('password', $hashed_password));
        
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

    function delete_user() 
    {
        
    }

    function get_all_users() 
    {
        
    }

    function get_user() 
    {
        
    }

    function get_user_password($user = NULL) 
    {
        if ($name = NULL)
        {
            throw new Exception ("No user was submitted!");
        }

        global $db;

        $query = "SELECT password 
                    FROM users 
                    WHERE username = :user";

        $result = $db->prepare($query);
        $result->execute(
            array(
                "user" => $user
            )
        );
        $info = $result->fetch();
        return trim($info['password']);
    }

    function update_user() 
    {
        
    }

//    $2y$10$hG1ngAzAqom5mYxegjukTeLPMjf0Lf5MmZw58oupGwd9/fqtPN03e
//    $2y$10$hG1ngAzAqom5mYxegjukTeLPMjf0Lf5MmZw58oupGwd9/fqtPN03e
//    $2y$10$hG1ngAzAqom5mYxegjukTeLPMjf0Lf5MmZw58oupGwd9/fqtPN03e

?>