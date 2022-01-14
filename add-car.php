<?php
    $file = fopen('../log.txt', 'a');
    fwrite($file, date('l jS \of F Y h:i:s A')." Добавление транспортного средства в гараж пользователя".PHP_EOL);
    fwrite($file, date('l jS \of F Y h:i:s A')." Получение данных формы".PHP_EOL);
    $carType = filter_var(trim($_POST['carType']), FILTER_SANITIZE_STRING);
    $carManufacturer = filter_var(trim($_POST['carManufacturer']), FILTER_SANITIZE_STRING);
    $carBody = filter_var(trim($_POST['carBody']), FILTER_SANITIZE_STRING);
    $carColor = filter_var(trim($_POST['carColor']), FILTER_SANITIZE_STRING);
    $engineType = filter_var(trim($_POST['engineType']), FILTER_SANITIZE_STRING);
    $enginePower = filter_var(trim($_POST['enginePower']), FILTER_SANITIZE_STRING);
    $engineMass = filter_var(trim($_POST['engineMass']), FILTER_SANITIZE_STRING);
    
    $email=$_COOKIE['user'];

    $car = $carType." ".$carManufacturer." ".$carBody." ".$carColor." ".$engineType." ".$enginePower." ".$engineMass;
    

    fwrite($file, date('l jS \of F Y h:i:s A')." Подключение к базе данных".PHP_EOL);

    $mysql = new mysqli('localhost', 'root', 'root', 'users-bd');
    fwrite($file, date('l jS \of F Y h:i:s A')." Поиск пользователя".PHP_EOL);
    $result = $mysql->query("SELECT * FROM `users` WHERE `email` = '$email'");

    $user = $result->fetch_assoc();
    
    if(count($user) == 0) {
        echo "Error.";
        exit();
    }
    
    if(strpos($user['garage'], "#4") != false){
        $garage = $user['garage']." "."#5 ".$car;
    }

    elseif(strpos($user['garage'], "#3") != false){
        $garage = $user['garage']." "."#4 ".$car;
    }

    elseif(strpos($user['garage'], "#2") != false){
        $garage = $user['garage']." "."#3 ".$car;
    }



    elseif(strpos($user['garage'], "#1") != false) {
        $garage = $user['garage']." "."#2 ".$car;
    } 
    
    else { 
        $garage = "##1".$user['garage']." ".$car;
    }


    fwrite($file, date('l jS \of F Y h:i:s A')." Запись в базу данных".PHP_EOL);
    $query = "UPDATE `users` SET `garage`='$garage' WHERE `email`='$email'";
    $result = $mysql->query($query);
    

    
    $user = $mysql->query("SELECT * FROM `users` WHERE `email` = '$email'")->fetch_assoc();
    fwrite($file, date('l jS \of F Y h:i:s A')." Установка куки".PHP_EOL);
    setcookie('garage', $user['garage'], time() - 3600 * 2, "/");
    setcookie('garage', $user['garage'], time() + 3600 * 2, "/");
    fwrite($file, date('l jS \of F Y h:i:s A')." Закрытие базы данных".PHP_EOL);
    $mysql->close();
    fclose($file);
    
    header('Location: /');
?>