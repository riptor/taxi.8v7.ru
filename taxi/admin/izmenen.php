<?php
// ver. 1.002.37 
// 22:39 08.03.2016
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
$dbh = mysql_connect($hostnameSQL,$usernameSQL,$passwordSQL) or die("Не могу соединиться с MySQL.");
// выбрать базу данных. Если произойдет ошибка - вывести ее  
mysql_select_db($dbNameSQL) or die("Не могу подключиться к базе.");
//---finish создать соединение



/* Таблица MySQL, в которой хранятся данные */
$userstable = "clients"; 
$users = "shotchik"; 


// начало добовления клиента
if (isset($_POST['update_baza'])) {

/* /------------------
$query = "SELECT * FROM $users"; //* Выполнить запрос, все строки 
$res = mysql_query($query) or die(mysql_error()); 
//$id = mysql_num_rows($res); //* Как много нашлось строк  
//echo $res;
//$id = mysql_result($res,$users);
//mysql_result($result,2);
$row=mysql_fetch_array($res);
$id = $row ['id'];
*/ 
//------------------вычисление количиства строк
//$id = $id + 1;

 $id = $_GET[id]; //Получение номера строки.
//$date=(date("Y/m/d  H.i.s"));		// это файл просмотра админом разрешаем изменение даты.
$date=$_POST['date'];
$Geox=$_POST['Geox'];
$Geoy=$_POST['Geoy'];
$ip=$_SERVER['REMOTE_ADDR']; //узнать ip откуда пришли.
$mest=$_POST['mest'];
$adres001=$_POST['adres001'];	// откуда едем.
$paradnaya=$_POST['paradnaya'];	// подъезд.
$adres002=$_POST['adres002'];	// куда едем.
$mani=$_POST['mani'];		// цена
//$pone=$_POST['pone'];		// Телефон хранится в базе пользователей.
$vipolneno=$_POST['vipolneno'];

// обновлёная строка для SQL больше данных. обновляет по столбцу WHERE id = '$id' всю строку.
$query = "UPDATE $userstable SET login = '$login', date = '$date', Geox = '$Geox', Geoy = '$Geoy', ip = '$ip', mest = '$mest', adres001 = '$adres001', paradnaya = '$paradnaya', adres002 = '$adres002', mani = '$mani', vipolneno = '$vipolneno' WHERE id = '$id'"; 
echo $query;
/* Выполнить запрос. Если произойдет ошибка - вывести ее. */ 
mysql_query($query) or die(mysql_error());
$sql="UPDATE $users SET id='$id'"; //запись номера заявки в единственую ячейку.
mysql_query($sql) or die(mysql_error()); 	// ----------------------------------------
echo "<center><b>Информация занесена в базу данных.</b></center>";
echo "<meta http-equiv='refresh' content='3 url=$ref'>";
/* Закрыть соединение */ 
    mysql_close();
    exit();
}
// конец добовления клиента

// конец добовления клиента
 


 
 $id = $_GET[id]; //Получение номера строки.
//echo $id;
//Выводит строку с указаным номером.
$query = "SELECT * FROM $userstable WHERE id = $id "; 
/* Выполнить запрос. Если произойдет ошибка - вывести ее. */ 
$res = mysql_query($query) or die(mysql_error());
/* Как много нашлось таких */ 
$id = mysql_num_rows($res); 


/* Напечатать всех в красивом виде*/ 
if ($id <> 1) { 
  echo "<CENTER><P>Неверный запрос</CENTER>"; 
} else { 
while ($row=mysql_fetch_array($res)) {
echo "
<center>
	<form  method=\"POST\">
	<table border=0 width=100%>
<tr>
<INPUT TYPE='hidden' NAME='id' VALUE='$id'> 

<td width=30%>Дата:</td>
<td width=70% COLSPAN=5> <INPUT TYPE='text' NAME='date' SIZE=98% MAXLENGTH='30' VALUE= '".$row ['date']."'> </td></tr>
<tr>
<td width=30%>$Geox координата Х:</td>
<td width=70% COLSPAN=5> <INPUT TYPE='text' NAME='Geox' SIZE=98% MAXLENGTH='30' VALUE= '".$row ['Geox']."'> </td></tr>
<tr>
<td width=30%>$Geoy координата Y:</td>
<td width=70% COLSPAN=5> <INPUT TYPE='text' NAME='Geoy' SIZE=98% MAXLENGTH='30' VALUE= '".$row ['Geoy']."'> </td></tr>
<tr>
<td width=30%>IP адрес:</td>
<td width=70% COLSPAN=5> <INPUT TYPE='text' NAME='ip' SIZE=98% MAXLENGTH='30' VALUE= '".$row ['ip']."'> </td></tr>
<tr>
<td width=30%>Мест:</td>
<td width=70% COLSPAN=5> <INPUT TYPE='text' NAME='mest' SIZE=98% MAXLENGTH='30' VALUE= '".$row ['mest']."'> </td></tr>
<tr>
<td width=30%>adres001:</td>
<td width=70% COLSPAN=5> <INPUT TYPE='text' NAME='adres001' SIZE=98% MAXLENGTH='30' VALUE= '".$row ['adres001']."'> </td></tr>

<tr>
<td width=30%>Подъезд:</td>
<td width=8%>
<SELECT NAME='paradnaya'>
<OPTION value = ".$row ['paradnaya'].">".$row ['paradnaya']."
<OPTION value = '1'>1
<OPTION value = '2'>2
<OPTION value = '3'>3
<OPTION value = '4'>4
</SELECT> 

</td></tr>



<tr>
<td width=30%>adres002:</td>
<td width=70% COLSPAN=5> <INPUT TYPE='text' NAME='adres002' SIZE=98% MAXLENGTH='30' VALUE= '".$row ['adres002']."'> </td></tr>
<tr>
<td width=30%>mani:</td>
<td width=70% COLSPAN=5> <INPUT TYPE='text' NAME='mani' SIZE=98% MAXLENGTH='30' VALUE= '".$row ['mani']."'> </td></tr>
<tr>
<td width=30%>Выполнено:</td>
<td width=8%>
<SELECT NAME='vipolneno'> 
<OPTION value = 'Нет'>Нет
<OPTION value = 'Да'>Да
<OPTION value = 'В работе'>В работе
</SELECT> 
<td width=25% COLSPAN=2><span style='color: #de3163'>Да</span></td>
</td></tr>

<tr>
<td width=30%></td><td width=70% COLSPAN=5>
<INPUT type=\"submit\" name=\"update_baza\" value=\"Записать\"></td></tr>
</center>
</TABLE></CENTER>";
}
 mysql_close();
exit();
} 
?> 
