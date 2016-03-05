<?php
	include '../../models/user_model.php';


	$name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
	$email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
	$company = trim(filter_input(INPUT_POST, 'company', FILTER_SANITIZE_STRING));
	$username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
	$password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
	$password2 = trim(filter_input(INPUT_POST, 'confirm-password', FILTER_SANITIZE_STRING));

    $submitEmail = true;
    $submitPassword = true;
    $nameAlert = "n";
    $emailAlert = "e";
    $usernameAlert = "u";
    $passwordAlert = "p";
    $password2Alert = "2";
    $confirmAlert = "c";
    $alert = "n=";

    if (!empty($name) && !empty($email) && !empty($username) && !empty($password) && !empty($password2)) 
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $submitEmail = false;
            $alert .= $emailAlert;
        }
        
        if ($password !== $password2)
        {
            $submitPassword = false;
            $alert .= $confirmAlert;
        }
        
        if (!$submitEmail || !$submitPassword) 
        {
            header("Location: ../views/user/new_user.php?{$alert}");
        } 
        else 
        {
            $result = create_user($name, $email, $company, $username, $password);
            if (strpos($result, "1062"))
            {
                echo "1062";
            }
            else
            {
                echo 'true';
            }
        }
    }
    else
    {
        if (empty($name))
        {
            $alert .= $nameAlert;
        }
        
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $alert .= $emailAlert;
        }
        
        if (empty($username))
        {
            $alert .= $usernameAlert;
        }
        
        if (empty($password))
        {
            $alert .= $passwordAlert;
        }
        
        if (empty($password2))
        {
            $alert .= $password2Alert;
        }
        
        header("Location: ../views/user/new_user.php?{$alert}");
    }

?>