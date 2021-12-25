<?php
    $email = filter_var($trim(_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = filter_var($trim(_POST['psw']), FILTER_SANITIZE_STRING);
    $confirmPassword = filter_var($trim(_POST['cnfrmpsw']), FILTER_SANITIZE_STRING);
    
    if(mb_strlen($login) < 4 || mb_strlen($login) > 255) {
        echo "Error.";
        exit();
    }
    if(mb_strlen($password) < 8) {
        echo "Error.";
        exit();
    }

    $password = md5($password."badalandabad");
    $confirmPassword = md5($confirmPassword."badalandabad"); 

    if($password != $confirmPassword) {
        echo "Error.";
        exit();
    }

    $mysql = new mysqli('localhost', 'root', 'root', 'users-bd');
    $mysql->query("INSERT INTO 'users' ('email', 'password') VALUES('$email', '$password')");

    $mysql->close();

    header('Location: /');
?>