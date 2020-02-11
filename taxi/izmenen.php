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

 $id = $_GET[id]; //Получение номера строки.
$data_vipolnen=(date("Y/m/d  H.i.s"));		// это файл просмотра админом разрешаем изменение даты.
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
$query = "UPDATE $userstable SET DataVipolneno = '$data_vipolnen', vipolneno = '$vipolneno' WHERE id = '$id'"; 

/* Выполнить запрос. Если произойдет ошибка - вывести ее. */ 
mysqli_query($link, $query) or die(mysql_error());
$sql="UPDATE $users SET id='$id'"; //запись номера заявки в единственую ячейку.
mysqli_query($link, $sql) or die(mysql_error());	// ----------------------------------------
echo "<center><b>Информация занесена в базу данных.</b></center>";
echo "<meta http-equiv='refresh' content='3 url=index.php'>";
/* Закрыть соединение */ 
    mysqli_close();
    exit();
}
// конец добовления клиента

// конец добовления клиента
 


 
 $id = $_GET[id]; //Получение номера строки.
//echo $id;
//Выводит строку с указаным номером.
$query = "SELECT * FROM $userstable WHERE id = $id "; 
/* Выполнить запрос. Если произойдет ошибка - вывести ее. */ 
$res = mysqli_query($link, $query) or die(mysql_error());
/* Как много нашлось таких */ 
$id = mysqli_num_rows($res); 


/* Напечатать всех в красивом виде*/ 
if ($id <> 1) { 
  echo "<CENTER><P>Неверный запрос</CENTER>"; 
} else { 
while ($row=mysqli_fetch_array($res)) {
echo "
<center>
	<form  method=\"POST\">
	<table border=0 width=100%>
<tr>
<INPUT TYPE='hidden' NAME='id' VALUE='$id'> 

<p align='left'>
<b>                         Дата:</b> ".$row ['date']." <br></z>
<b>Адрес отправления:</b> ".$row ['adres001']." <br>
<b>Адрес координаты:</b> ".$row ['Geox']."  ".$row ['Geoy']." <br>
</p>


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
<td width=30%>Адрес прибытия:</td>
<td width=70% COLSPAN=5> <INPUT TYPE='text' NAME='adres002' SIZE=98% MAXLENGTH='30' VALUE= '".$row ['adres002']."'> </td></tr>
<tr>
<td width=30%>mani:</td>
<td width=70% COLSPAN=5> <INPUT TYPE='text' NAME='mani' SIZE=98% MAXLENGTH='30' VALUE= '".$row ['mani']."'> </td></tr>
<tr>
<td width=30%>Выполнено:</td>
<td width=8%>
<SELECT NAME='vipolneno'> 
<OPTION value = ".$row ['vipolneno'].">".$row ['vipolneno']."
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
 mysqli_close();
exit();
} 
?> 
