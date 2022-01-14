<?php
    $file = fopen('../log.txt', 'a');
    fwrite($file, date('l jS \of F Y h:i:s A')." Аутентификация".PHP_EOL);
    fwrite($file, date('l jS \of F Y h:i:s A')." Получение данных формы".PHP_EOL);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = filter_var(trim($_POST['psw']), FILTER_SANITIZE_STRING);
    $password = md5($password."badalandabad");
    

    fwrite($file, date('l jS \of F Y h:i:s A')." Подключение к базе данных".PHP_EOL);
    $mysql = new mysqli('localhost', 'root', 'root', 'users-bd');
    

    fwrite($file, date('l jS \of F Y h:i:s A')." Поиск пользователя".PHP_EOL);
    $result = $mysql->query("SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");

    $user = $result->fetch_assoc();
    
    if(count($user) == 0) {
        echo "Error.";
        exit();
    }
    
    fwrite($file, date('l jS \of F Y h:i:s A')." Установка куки".PHP_EOL);
    setcookie('user', $user['email'], time() + 3600 * 2, "/");
    setcookie('garage', $user['garage'], time() + 3600 * 2, "/");

    fwrite($file, date('l jS \of F Y h:i:s A')." Закрытие базы данных".PHP_EOL);
    $mysql->close();
    fclose($file);
    header('Location: /');

?>