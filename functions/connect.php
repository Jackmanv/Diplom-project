<?php
$db_host = 'localhost'; // ваш хост
$db_name = 'pizza_base'; // ваша бд
$db_user = 'root'; // пользователь бд
$db_pass = ''; // пароль к бд

    $mysqli = false;
    function connectDB(){ //функция подключения БД
        global $mysqli;
        $mysqli = new mysqli("localhost", "root", "", "pizza_base");
        $mysqli->query("SET NAME 'utf-8'");
    }

    function closeDB(){ //функция отключения БД, чтобы сайт не тормозил
        global $mysqli;
        $mysqli->close ();
    }

?>