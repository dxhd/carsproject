<?php
    $file = fopen('../log.txt', 'a');
    fwrite($file, date('l jS \of F Y h:i:s A')." Регистрация нового пользователя".PHP_EOL);    
    fwrite($file, date('l jS \of F Y h:i:s A')." Получение данных формы".PHP_EOL);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = filter_var(trim($_POST['psw']), FILTER_SANITIZE_STRING);
    $confirmPassword = filter_var(trim($_POST['cnfrmpsw']), FILTER_SANITIZE_STRING);
    
    if(mb_strlen($email) < 4 || mb_strlen($email) > 255) {
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
    fwrite($file, date('l jS \of F Y h:i:s A')." Подключение к базе данных".PHP_EOL);



    $mysql = new mysqli('localhost', 'root', 'root', 'users-bd');
    fwrite($file, date('l jS \of F Y h:i:s A')." Запись в базу данных".PHP_EOL);
    $mysql->query("INSERT INTO `users` (`email`, `password`) VALUES('$email', '$password')");
    fwrite($file, date('l jS \of F Y h:i:s A')." Закрытие базы данных".PHP_EOL);
    $mysql->close();
    fclose($file);
    header('Location: /');
?>