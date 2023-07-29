<?php
require_once "connect.php";


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // включаем сообщения об ошибках
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name); // коннект с сервером бд
$mysqli->set_charset("utf8mb4"); // задаем кодировку

$result = $mysqli->query('SELECT * FROM `pizza`'); // запрос на выборку
$resultcart = $mysqli->query('SELECT * FROM `products`'); // запрос на выборку
$resultfeedback = $mysqli->query('SELECT * FROM `feedback`'); // запрос на выборку

function getPizza()
{
    global $mysqli;
    $resultpizza = $mysqli->query("SELECT * FROM `pizza` ORDER BY 'id'"); // запрос на выборку
    closeDB();
    return resultToArray($resultpizza);
}

function getSauce()
{
    global $mysqli;
    $resultsauce = $mysqli->query("SELECT * FROM `sauce` ORDER BY 'id'"); // запрос на выборку
    closeDB();
    return resultToArray($resultsauce);
}

function getPotable()
{
    global $mysqli;
    $resultpotable = $mysqli->query("SELECT * FROM `potable` ORDER BY 'id'"); // запрос на выборку
    closeDB();
    return resultToArray($resultpotable);
}

function getDiscount()
{
    global $mysqli;
    $resultdiscount = $mysqli->query("SELECT * FROM `discount` ORDER BY 'id'"); // запрос на выборку
    closeDB();
    return resultToArray($resultdiscount);
}
function getCart()
{
    global $mysqli;
    $resultcart = $mysqli->query("SELECT * FROM `products` ORDER BY 'id'"); // запрос на выборку
    closeDB();
    return resultToArray($resultcart);
}
function getBanners()
{
    global $mysqli;
    $resultbanners = $mysqli->query("SELECT * FROM `banners` ORDER BY 'id'"); // запрос на выборку
    closeDB();
    return resultToArray($resultbanners);
}

function resultToArray($resultpizza)
{
    $array = array();
    while (($row = $resultpizza->fetch_assoc()) != false)
        $array[] = $row;
    return $array;
}
?>
