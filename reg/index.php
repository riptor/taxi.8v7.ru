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
?>
	
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Вход</title>
		<style type="text/css">
		INPUT {
		background: silver; /* Цвет фона */
		}
		</style>
	</head>
<body>

<?php
if(empty($login) and empty($password)){
print <<<HERE
<table>
Вход:
<br>
<br>
 
      <form action="login.php" method="POST">
      <tr>
      <td>Логин:</td>
      <td><input type="text" name="login" ></td>
      </tr>
	  
      <tr>
      <td>Пароль:</td>
      <td><input type="password" name="password" ></td>
      </tr>
	  
	  <tr>
      <td colspan="2"><input type="submit" value="OK" name="submit" ></td>
      </tr>
      </form>
      </table>
<a href="registration.php">Регистрация</a>

<p>&nbsp;</p>
<a href="rezetpassword.php">Забыли Пароль?</a>
<p>&nbsp;</p>

<a href="../">На главную.</a>
HERE;
}
else{
echo "Привет, <strong>".$login."</strong> | <a href='exit.php'>Выход</a><br>Контент для зарегистрированных пользователей";

}
?>
</body>
</html>