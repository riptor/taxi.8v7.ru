<?php

// Функция для генерации случайной строки
// вызов функции         $hash = sha1(generateCode(20));
function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;  
    while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];  
    }
    return $code;
}
// finish Функция для генерации случайной строки
echo sha1(generateCode(20));

$ip = $_SERVER['REMOTE_ADDR'];		//ip адрес клиента.
echo $ip;

$myname=$_SERVER["SERVER_NAME"]; //Адрес моего сервера.
$ref=getenv('HTTP_REFERER'); //Адрес откуда пришли.
$ip=$_SERVER['REMOTE_ADDR']; //узнать ip откуда пришли.

?>

