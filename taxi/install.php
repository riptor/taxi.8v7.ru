<?php
// ver. 1.002.31 01.03.2016г.
// http://7v8.ru http://taxi.7v8.ru
// serg@7v8.ru
// кодер Чернухин Сергей

$myname=$_SERVER["SERVER_NAME"];;
$pagename="My Taxi.";
//--------- обявляем переменные. -----------------------
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/config.php');
// finish --------- обявляем переменные. -----------------------




/* Таблица MySQL, в которой хранятся данные */ 
$userstable = "clients"; 
$users = "shotchik"; 

/* создать соединение */ 
$dbh = mysql_connect($hostnameSQL,$usernameSQL,$passwordSQL) or die("Не могу соединиться с MySQL.");
/* выбрать базу данных. Если произойдет ошибка - вывести ее */ 
mysql_select_db($dbNameSQL) or die(mysql_error()); 





/* составить запрос для вставки информации о клиенте в таблицу */ 
//$qwerty = "CREATE DATABASE $userstable";
$query = "CREATE TABLE $userstable (id VARCHAR(40), date VARCHAR(100), date0 VARCHAR(100), name VARCHAR(500), chel VARCHAR(100), mest VARCHAR(100), adres001 VARCHAR(500), mani VARCHAR(100), pone VARCHAR(100), adres002 VARCHAR(500),vsakoe VARCHAR(500),Geox VARCHAR(100),Geoy VARCHAR(100), vipolneno VARCHAR(100))"; 
$quer = "CREATE TABLE $users (id VARCHAR(4))";
mysql_query($query) or die(mysql_error());
echo "Информация $userstable занесена в базу данных. <br>";
mysql_query($quer) or die(mysql_error()); 
echo "Информация $users занесена в базу данных. <br>"; 

$query = "INSERT INTO $users VALUES('$id')"; 
/* Выполнить запрос. Если произойдет ошибка - вывести ее. */ 
mysql_query($query) or die(mysql_error()); 
echo "Информация $query занесена в базу данных.";
/* Закрыть соединение */ 
mysql_close(); 
?>  

