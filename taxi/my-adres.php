<?php
// ver. 1.002.31 01.03.2016г.
// http://7v8.ru http://taxi.7v8.ru
// serg@7v8.ru
// кодер Чернухин Сергей

$myname=$_SERVER["SERVER_NAME"];;
$pagename="My Taxi.";
//--------- обявляем переменные. -----------------------
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/config.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/login.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/header.php');
// finish --------- обявляем переменные. -----------------------
// ------ создать соединение 
   $link = mysqli_connect($dbhostnameSQL,$usernameSQL,$passwordSQL, $dbNameSQL); // Соединяемся с базой
    if (!$link) {
      echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
      exit;
		}
//---finish создать соединение



/* Таблица MySQL, в которой хранятся данные */
$userstable = "clients"; 
$users = "shotchik"; 


// начало добовления клиента
if (isset($_POST['update_baza'])) {

//------------------
$query = "SELECT * FROM $users"; /* Выполнить запрос, все строки */ 
$res = mysqli_query($link, $query) or die(mysql_error()); 
//$id = mysql_num_rows($res); /* Как много нашлось строк */ 
//echo $res;
//$id = mysql_result($res,$users);
//mysql_result($result,2);
$row=mysqli_fetch_array($res);
$id = $row ['id'];
//------------------вычисление количиства строк
$id = $id + 1;

$date=(date("Y/m/d  H.i.s"));
$Geox=$_POST['Geox'];
$Geoy=$_POST['Geoy'];
$ip=$_SERVER['REMOTE_ADDR']; //узнать ip откуда пришли.

$name=$_POST['name'];
$paradnaya=$_POST['paradnaya'];
$mest=$_POST['mest'];
$adres001=$_POST['adres001'];
$mani=$_POST['mani'];
$pone=$_POST['pone'];
$adres002=$_POST['adres002'];
$vsakoe=$_POST['vsakoe'];
$vipolneno=$_POST['vipolneno'];
/* составить запрос для вставки информации о клиенте в таблицу */ 
		$query = "INSERT INTO $userstable (login, date, Geox, Geoy, ip, mest, adres001, paradnaya, adres002, mani, vipolneno )
			  VALUES ('$login', '$date', '$Geox', '$Geoy', '$ip', '$mest', '$adres001', '$paradnaya', '$adres002', '$mani','$vipolneno')";

/* Выполнить запрос. Если произойдет ошибка - вывести ее. */ 
mysqli_query($link, $query) or die(mysql_error());
$sql="UPDATE $users SET id='$id'"; //запись номера заявки в единственую ячейку.
mysqli_query($link, $sql) or die(mysql_error()); 	// ----------------------------------------
echo "<center><b>Информация занесена в базу данных.</b></center>";
echo "<meta http-equiv='refresh' content='3 url=$ref'>";
/* Закрыть соединение */ 
    mysqli_close();
    exit();
}
// конец добовления клиента

?>