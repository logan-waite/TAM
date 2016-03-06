<?php
    include "../resources/db_connect.php";

    echo "<form method='get'>
            <input type='text' name='password'>
            <input type='submit' value='submit'>
        </form>";

    $password = $_GET['password'];

    echo $password."<br>";

    $hash = password_hash($password, PASSWORD_DEFAULT);

    echo $hash."<br>";

    echo "<pre>";
    var_dump(password_verify($password, $hash));
    echo "</pre>";

    $stmt = $db->prepare("INSERT INTO users (password) VALUES (:password)");
    $stmt->execute(
        array(
            "password" => $hash
        )
    );

    $result = $db->prepare("SELECT password FROM users WHERE username = ''");
    $result->execute();
    
    $sql = $result->fetch();
    $sql_password = $sql['password'];

    echo $sql_password;
    echo "<pre>";
    var_dump(password_verify($password, $sql_password));
    echo "</pre>";
?>