<?php
$login = $_SESSION['login'];
$password = $_SESSION['password'];
$id_user = $_SESSION['id'];

if(empty($login) and empty($password)){
print <<<HERE
<table>
Вход:
<br>
<br>
 
      <form action="/reg/login.php" method="POST">
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
echo "Привет, <strong>".$login."</strong> | <a href='../reg/exit.php'>Выход</a>";
}
?>
