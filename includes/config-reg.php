<?php
session_start();
//----------------- обявляем переменные. -----------------------
$_SERV=$HTTP_SERVER_VARS['DOCUMENT_ROOT'];
include("header.php");	// заголовок переменых.
// finish --------- обявляем переменные. -----------------------

$nameprojekt = 'taxi';
$dbhostnameSQL = 'localhost';
$dbNameSQL = 'taxirest9562876';
$usernameSQL = 'taxirest9562876';
$passwordSQL = 'taxirest9562876';

$login = $_SESSION['login'];
$password = $_SESSION['password'];
$id_user = $_SESSION['id'];


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

<a href="../">На главную.</a>
HERE;
exit;
}
else{
echo "Привет, <strong>".$login."</strong> | <a href='exit.php'>Выход</a><br>Контент для зарегистрированных пользователей";
}
?>
