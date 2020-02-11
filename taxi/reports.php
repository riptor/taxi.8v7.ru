<?php
// ver. 1.002.35 01.03.2016г.
//23:35 02.03.2016
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

/* запрос, сортирует по дате */
if (isset($_GET['date'])) {
$query = "SELECT * FROM $userstable WHERE vipolneno = 'В работе' ORder by date DESC"; 
/* Выполнить запрос. Если произойдет ошибка - вывести ее. */ 
$res = mysqli_query($link, $query) or die(mysql_error());

}
/* конец запроса, по дате */
else {
//столбец выполнено выводит НЕТ и сортирует по дате.
$query = "SELECT * FROM $userstable WHERE vipolneno = 'В работе' ORder by date"; 
/* Выполнить запрос. Если произойдет ошибка - вывести ее. */ 
$res = mysqli_query($link, $query) or die(mysql_error()); 
}
/* Как много нашлось таких */ 
$id = mysqli_num_rows($res); 

/* Напечатать всех в красивом виде*/ 
if ($id == 0) { 
  echo "<CENTER><P>База данных пуста.</CENTER>"; 
} else { 


  echo "<CENTER><P>Всего: $id записей <BR><BR>
  <TABLE BORDER=3>
  <TD><a href='./index.php?date'>Время заявки:</TD><TD>Откуда:</TD><TD>Подъезд:</TD><TD>Адрес Прибытия:</TD><TD>Сумма:</TD><TD><<<&nbsp>>></TD><TD><<<&nbsp>>></TD>"; 
  /* Получать по одной строке из таблицы в массив $row, пока строки не кончатся */  
  while ($row=mysqli_fetch_array($res)) {
  echo "<TR>
 	 <TD>".$row ['date']."&nbsp</TD><TD>".$row ['adres001']."&nbsp</TD><TD>".$row ['paradnaya']."&nbsp</TD><TD>".$row ['adres002']."&nbsp</TD><TD>".$row ['mani']."&nbsp</TD><TD><a href='./izmenen.php?id=".$row ['id']."'><img src='../png/tool.gif'alt='Изменить'border='0'></a></TD><TD><a href='./del.php?id=".$row ['id']."'></a></TD>
	</TR>"; 
  } 
  echo "</TABLE></CENTER>";
 mysql_close();

exit();
} 

?> 

