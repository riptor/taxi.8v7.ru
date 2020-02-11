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

/* создать соединение */ 
$dbh = mysql_connect($hostnameSQL,$usernameSQL,$passwordSQL) or die("Не могу соединиться с MySQL.");
/* выбрать базу данных. Если произойдет ошибка - вывести ее */ 
mysql_select_db($dbNameSQL) or die(mysql_error()); 

/* запрос, сортирует по дате */
if (isset($_GET['date'])) {
$query = "SELECT * FROM $userstable WHERE vipolneno = 'Да' ORder by date DESC"; 
/* Выполнить запрос. Если произойдет ошибка - вывести ее. */ 
$res = mysql_query($query) or die(mysql_error()); 

}
/* конец запроса, по дате */
else {
//столбец выполнено выводит НЕТ и сортирует по дате.
$query = "SELECT * FROM $userstable WHERE vipolneno = 'Да' ORder by date"; 
/* Выполнить запрос. Если произойдет ошибка - вывести ее. */ 
$res = mysql_query($query) or die(mysql_error()); 
}
/* Как много нашлось таких */ 
$id = mysql_num_rows($res); 

/* Напечатать всех в красивом виде*/ 
if ($id == 0) { 
  echo "<CENTER><P>База данных пуста.</CENTER>"; 
} else { 


  echo "<CENTER><P>Всего: $id записей <BR><BR>
  <TABLE BORDER=3>
  <TD><a href='./index.php?date'>заявка:</TD><TD>Дата Время отъезда:</TD><TD>Откуда:</TD><TD>Подъезд:</TD><TD>Сумма:</TD><TD>Телефон:</TD><TD>Адрес Прибытия:</TD><TD>Разное:</TD><TD><<<&nbsp>>></TD><TD><<<&nbsp>>></TD>"; 
  /* Получать по одной строке из таблицы в массив $row, пока строки не кончатся */  
  while ($row=mysql_fetch_array($res)) {
  echo "<TR>
 	 <TD>".$row ['date']."&nbsp</TD><TD>".$row ['date0']."&nbsp</TD><TD>".$row ['adres001']."&nbsp</TD><TD>".$row ['chel']."&nbsp</TD><TD>".$row ['mani']."&nbsp</TD><TD>".$row ['pone']."&nbsp</TD><TD>".$row ['adres002']."&nbsp</TD><TD>".$row ['vsakoe']."&nbsp</TD><TD><a href='./izmenen.php?id=".$row ['id']."'><img src='./includes/tool.gif'alt='Изменить'border='0'></a></TD><TD><a href='./del.php?id=".$row ['id']."'></a></TD>
	</TR>"; 
  } 
  echo "</TABLE></CENTER>";
 mysql_close();

exit();
} 

?> 

