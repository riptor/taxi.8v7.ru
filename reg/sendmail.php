<?php
// получение ip сложный скрипт -------------------------
function GetRealIp()
{
 if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
 {
   $ip=$_SERVER['HTTP_CLIENT_IP'];
 }
 elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
 {
  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
 }
 else
 {
   $ip=$_SERVER['REMOTE_ADDR'];
 }
 return $ip;
}
$realIP2=(getRealIp());
// echo(getRealIp())
// конец скрипта ---------------------------------------

$realIP=$_SERVER['REMOTE_ADDR'];  // IP одной строкой.

$rname=$_POST['rname'];
$rname=htmlspecialchars ($rname); 

$email=$_POST['email'];
$email=htmlspecialchars ($email);
$subject=$_POST['subject'];
$subject=htmlspecialchars ($subject); 
$message=$_POST['message'];
$message=htmlspecialchars ($message);
$message=nl2br($message); 
$ref=getenv('HTTP_REFERER'); 

if ($rname=="" || $email=="" || $subject=="" || $message=="") {
echo "<center><b>Заполните поля!</b></center>";
echo "<meta http-equiv='refresh' content='3 url=$ref'>";
exit;
}
$len=strlen($email);
if (!eregi ("@",$email) || $len<5) {
echo "<center><b>Ваш e-mail Неправильный!</b></center>";
echo "<meta http-equiv='refresh' content='3 url=$ref'>";
exit;
} 
$sendsubject = "Вы успешно зарегистрированы в taxi.7v8.ru";
$admin_email="noreply@7v8.ru"; // E-Mail администратора

//$rnamekoi8 = convert_cyr_string ($rname,w,k);		 //Кодировка в КОИ-8 если имя не читаемо закоментируй строку
$sendmail = " 
<html>

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1251">
<meta name=Generator content="Microsoft Word 14 (filtered)">
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{margin-top:0cm;
	margin-right:0cm;
	margin-bottom:10.0pt;
	margin-left:0cm;
	line-height:115%;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";}
a:link, span.MsoHyperlink
	{color:blue;
	text-decoration:underline;}
a:visited, span.MsoHyperlinkFollowed
	{color:purple;
	text-decoration:underline;}
.MsoChpDefault
	{font-family:"Calibri","sans-serif";}
@page WordSection1
	{size:595.3pt 841.9pt;
	margin:2.0cm 42.5pt 2.0cm 3.0cm;}
div.WordSection1
	{page:WordSection1;}
-->
</style>

</head>

<body lang=RU link=blue vlink=purple>

<div class=WordSection1>

<p class=MsoNormal style='line-height:16.15pt;background:white'><span
style='font-size:11.5pt;font-family:"Arial","sans-serif";color:black'>Уважаемый(-ая), '.$name.' '.$lastname.',&nbsp;для вас создана новая учетная запись. Используйте
приведенные ниже данные для входа в личный кабинет:<br>
<br>
<b>Вход</b>:&nbsp;</span><u><span style='font-size:11.5pt;font-family:"Arial","sans-serif";
color:#660099'><a href="https://taxi.7v8.ru">https://<span lang=EN-US>taxi</span>.7<span
lang=EN-US>v</span>8.<span lang=EN-US>ru</span></a></span></u><b><span
style='font-size:11.5pt;font-family:"Arial","sans-serif";color:black'><br>
Логин</span></b>
<span style='font-size:11.5pt;font-family:"Arial","sans-serif"; color:black'>&nbsp;(e-mail или номер телефона): '.$login.' '.$email.' или '.$pone.' &nbsp; <br>
<b>Пароль</b>: '.$password.' </span></p>

<p class=MsoNormal><span style='font-size:11.5pt;line-height:115%;font-family:
"Arial","sans-serif";color:black;background:white'>Ваш адрес электронной почты
будет привязан к Вашему аккаунту после перехода по ссылке подтверждения,
высланной на адрес.</span></span><span style='font-size:11.5pt;line-height:
115%;font-family:"Arial","sans-serif";color:black'><br style='orphans: auto;
text-align:start;white-space:pre-wrap;widows: 1;-webkit-text-stroke-width: 0px;
word-spacing:0px'>
<br style='orphans: auto;text-align:start;white-space:pre-wrap;widows: 1;
-webkit-text-stroke-width: 0px;word-spacing:0px'>
<br style='orphans: auto;text-align:start;white-space:pre-wrap;widows: 1;
-webkit-text-stroke-width: 0px;word-spacing:0px'>
<span style='background:white'><span style='orphans: auto;text-align:start;
white-space:pre-wrap;widows: 1;-webkit-text-stroke-width: 0px;float:none;
word-spacing:0px'>С уважением,</span></span><br style='orphans: auto;
text-align:start;white-space:pre-wrap;widows: 1;-webkit-text-stroke-width: 0px;
word-spacing:0px'>
<span style='background:white'><span style='orphans: auto;text-align:start;
white-space:pre-wrap;widows: 1;-webkit-text-stroke-width: 0px;float:none;
word-spacing:0px'>Администрация </span></span><span lang=EN-US
style='font-size:11.5pt;line-height:115%;font-family:"Arial","sans-serif";
color:black;background:white'>taxi</span><span style='font-size:11.5pt;
line-height:115%;font-family:"Arial","sans-serif";color:black;background:white'>.7</span><span
lang=EN-US style='font-size:11.5pt;line-height:115%;font-family:"Arial","sans-serif";
color:black;background:white'>v</span><span style='font-size:11.5pt;line-height:
115%;font-family:"Arial","sans-serif";color:black;background:white'>8.</span><span
lang=EN-US style='font-size:11.5pt;line-height:115%;font-family:"Arial","sans-serif";
color:black;background:white'>ru</span></p>

</div>

</body>

</html>

"; 
$headers  = "Content-Type: text/plain; charset=utf-8 \r\n"; 
$headers .= "From: $rname <$email>\r\n";

//$sendsubject = convert_cyr_string ($sendsubject,w,k);		 //Кодировка в КОИ-8				 
//$sendmail = convert_cyr_string ($sendmail,w,k); 		//Кодировка в КОИ-8
if (@mail("$admin_email", $sendsubject, $sendmail, $headers)) {
echo "<center><b>Ваше сообщение отправлено!</b></center>";
echo "<meta http-equiv='refresh' content='3 url=$ref'>";
}
?> 
