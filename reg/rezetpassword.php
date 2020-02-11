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
$test=generateCode(20);
$test1 = sha1($test);
echo $test1;
echo "!!!";
echo sha1(sha1($test));//шифруем пароль двойной хеш.


?>


