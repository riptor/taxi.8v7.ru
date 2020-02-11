<?php
// ver. 1.003.10
// 12:32 10.03.2016 год.
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
/* создать соединение */ 
$dbh = mysql_connect($hostnameSQL,$usernameSQL,$passwordSQL) or die("Не могу соединиться с MySQL.");
/* выбрать базу данных. Если произойдет ошибка - вывести ее */ 
mysql_select_db($dbNameSQL) or die(mysql_error()); 
$table = "invite";
$user = "null";


// Функция для генерации случайной строки
// вызов функции         $hash = sha1(generateCode(20));
function generateCode($length=6) {
    $chars = "0123456789";
    $code = "";
    $clen = strlen($chars) - 1;  
    while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];  
    }
    return $code;
}
// finish Функция для генерации случайной строки
for ($x=0; $x<3; $x++){
$invite = generateCode(2);
echo "Ваши invite риглашения ".$x.": ".$invite." <br>";

		$query = "INSERT INTO $table (invite, login, refal)
			VALUES ('$invite', '$user', '$login')";
			$result = mysql_query($query) or die(mysql_error());;
}
 mysql_close();
exit();

?>


