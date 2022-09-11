<?php
//Подключение к бд
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$server = "localhost";
$user = "root";
$pass = "root";
$db = "site";
$link= mysqli_connect($server, $user, $pass, $db) or die ("Нет соединения!");
//Установка кодировки запросов
mysqli_query($link,"SET NAMES 'utf8'");
mysqli_query($link,"SET CHARACTER SET 'utf8'");
mysqli_query($link,"SET SESSION collation_connection = 'utf8_general_ci'");
?>