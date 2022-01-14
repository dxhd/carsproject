<?php
    $file = fopen('../log.txt', 'a');
    fwrite($file, date('l jS \of F Y h:i:s A')." Выход из аккаунта пользователя".PHP_EOL);
    fwrite($file, date('l jS \of F Y h:i:s A')." Удаление куки".PHP_EOL);
    setcookie('user', $user['email'], time() - 3600 * 2, "/");
    setcookie('garage', $user['garage'], time() - 3600 * 2, "/");
    fclose($file);
    header('Location: /');
?>