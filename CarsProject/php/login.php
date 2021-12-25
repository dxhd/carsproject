<?php
    $email = filter_var($trim(_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = filter_var($trim(_POST['psw']), FILTER_SANITIZE_STRING);
    $password = md5($password."badalandabad");
    
    $mysql = new mysqli('localhost', 'root', 'root', 'users-bd');

    $result = $mysql->query("SELECT * FROM 'users' WHERE 'email' = '$email' AND 'password' = $password");

    $user = $result->fetch_assoc();
    
    if(count($user) == 0) {
        echo "Error.";
        exit();
    }
    
    setcookie('user', $user['email'], time() + 3600 * 2, "/");


    $mysql->close();

    header('Location: /');
?>