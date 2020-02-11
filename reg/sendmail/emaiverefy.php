<?php
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

$regmail = generateCode(10);
$hash = sha1($regmail); // строка проверки почты


$sql = "UPDATE  users SET hash = '$hash' WHERE login = '$login'"; // Сохраняем Хеш в базу SQL.
if (mysqli_query($link, $sql)) {				



$rname=htmlspecialchars ($rname); 

$email=htmlspecialchars ($email);
$subject=htmlspecialchars ($subject); 
$message=htmlspecialchars ($message);
$message=nl2br($message); 
$ref=getenv('HTTP_REFERER'); 


$sendsubject = "Сайт taxi.7v8.ru. Учётные данные и подтверждение и подтверждение Email ";
$admin_email="webmaster@7v8.ru"; // E-Mail администратора

//$rnamekoi8 = convert_cyr_string ($rname,w,k);		 //Кодировка в КОИ-8 если имя не читаемо закоментируй строку
$sendmail = "
<html> 
    <head> 
        <title>Непонятная строка!!!</title> 
    </head> 
    <body>
Уважаемый(-ая), ".$name." ".$lastname.", для вас создана новая учетная запись. Используйте приведенные ниже данные для входа в личный кабинет:
<br>
<br>
<br>
<b>Вход:</b> https://taxi.7v8.ru <br>
<b>Логин</b> (e-mail или номер телефона): ".$login.", ".$email." или ".$pone."<br>
<b>Пароль:</b> ".$password." <br>
<br>
Ваш адрес электронной почты будет привязан к Вашему аккаунту после перехода по ссылке подтверждения, высланной на адрес.
<br>
<br>
С уважением,<br>
Администрация taxi.7v8.ru<br>
    </body> 
</html>"; 
 
$headers  = "Content-type: text/html; charset = utf-8 \r\n"; 
$headers .= "From: $admin_email \r\n";

//$sendsubject = convert_cyr_string ($sendsubject,w,k);		 //Кодировка в КОИ-8				 
//$sendmail = convert_cyr_string ($sendmail,w,k); 		//Кодировка в КОИ-8
if (@mail("$email", $sendsubject, $sendmail, $headers)) {
echo "<center><b>Ваше сообщение отправлено!</b></center>";
//echo "<meta http-equiv='refresh' content='3 url=$ref'>";
}
} else {		//ошибка SQL
      echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
?> 


