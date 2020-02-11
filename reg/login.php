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

/* создать соединение */ 
   $link = mysqli_connect($dbhostnameSQL,$usernameSQL,$passwordSQL, $dbNameSQL); // Соединяемся с базой
    if (!$link) {
      echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
      exit;
		}

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php echo $pagename; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>

<?php
if (isset($_POST['login'])) {
	$login = $_POST['login']; 
	if ($login == '') {
		unset($login);
		exit ("Введите пожалуйста логин!");
	} 
}
if (isset($_POST['password'])) {
	$password=$_POST['password']; 
	if ($password =='') {
		unset($password);
		exit ("Введите пароль");
	}
}

$login = stripslashes($login);
$login = htmlspecialchars($login);

$password = stripslashes($password);
$password = htmlspecialchars($password);


$login = trim($login);
$password = trim($password);
$password = sha1(sha1($password));//шифруем пароль двойной хеш.
	$user = mysqli_query($link, "SELECT id FROM users WHERE login='$login' OR email='$login' AND password='$password'");
	$id_user = mysqli_fetch_array($user);
if (empty($id_user['id'])){
	exit ("Извините, введённый вами логин или пароль неверный.");
}
else {

   
    $_SESSION['password']=$password; 
	$_SESSION['login']=$login; 
    $_SESSION['id']=$id_user['id'];
		  
}
echo "Добро пожаловать, <strong>".$login."</strong> | <a href='exit.php'>Выход</a>";
echo "<meta http-equiv='Refresh' content='0; URL=../taxi/index.php'>";
?>
</body>
</html>
