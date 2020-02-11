<?php

$myname=$_SERVER["SERVER_NAME"];;
$pagename="Monopoly";
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/config.php');
$VerefyPone = "No";
$VerefyMail = "No";

/* создать соединение */ 
   $link = mysqli_connect($dbhostnameSQL,$usernameSQL,$passwordSQL, $dbNameSQL); // Соединяемся с базой
    if (!$link) {
      echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
      exit;
		}

print <<<HERE
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Вход</title>
		<style type="text/css">
		INPUT {
		background: silver; // Цвет фона
		}
		</style>
	</head>
<body>
HERE;

	
    if (isset($_POST['submit'])){
		if(empty($_POST['login']))  {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Введите логин!"> Введите логин! </font>';
		} 
//		elseif (!preg_match("/^\w{3,}$/", $_POST['login'])) {
//			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="В поле "Логин" введены недопустимые символы!"> В поле "Логин" введены недопустимые символы! Только буквы, цифры и подчеркивание!</font>';
//		}
		elseif(empty($_POST['password'])) {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Введите пароль !"> Введите пароль!</font>';
		}
//		elseif (!preg_match("/\A(\w){6,20}\Z/", $_POST['password'])) {
//			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Пароль слишком короткий!"> Пароль слишком короткий! Пароль должен быть не менее 6 символов! </font>';
//		}
//		elseif(empty($_POST['password2'])) {
//			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Введите подтверждение пароля!"> Введите подтверждение пароля!</font>';
//		}
//		elseif($_POST['password'] != $_POST['password2']) {
//			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Введенные пароли не совпадают!"> Введенные пароли не совпадают!</font>';
//		}
		
		
		 
		else{
			$login = $_POST['login'];
			$password = $_POST['password'];
			$mdPassword = sha1(sha1($password));//шифруем пароль двойной хеш.
			$password2 = $_POST['password2'];
			$pone = $_POST['pone'];
			$email = $_POST['email'];
			$rdate = date("d-m-Y в H:i");
			$name = $_POST['name'];
			$lastname = $_POST['lastname'];

	$sql = mysqli_query($link, "SELECT id FROM user WHERE login='$login'");
			
			if (mysqli_num_rows($sql) > 0) {
				echo '<font color="red"><img border="0" src="error.gif" align="middle" alt="Пользователь с таким логином зарегистрирован!"> Пользователь с таким логином зарегистрирован!</font>';
			}
			else {
	$sql = mysqli_query($link, "SELECT id FROM user WHERE email='$email'");

				if (mysqli_num_rows($sql) > 0){
					echo '<font color="red"><img border="0" src="error.gif"  alt="Пользователь с таким e-mail зарегистрирован!"> Пользователь с таким e-mail уже зарегистрирован!</font>';
				}
				else{
					$ip = $_SERVER['REMOTE_ADDR'];		//ip адрес клиента.
$sql = "INSERT INTO users (dostup, login, pone, VerefyPone, password, email, VerefyMail, reg_date, ip, name_2, name_3, name_4, hash ) 
					VALUES ('$dostup', '$login', '$pone', '$VerefyPone', '$mdPassword', '$email', '$VerefyMail', '$rdate', '$ip', '$name', '$lastname', '$lastname', '$hash')";

if (mysqli_query($link, $sql)) {
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
require_once($_SERVER['DOCUMENT_ROOT'].'/reg/sendmail/emaiverefy.php');
echo '<font color="green"><img border="0" src="ok.gif" align="middle" alt="Вы успешно зарегистрировались!"> Вы успешно зарегистрировались!</font><br><a href="/index.php">На главную</a>';				

				    }
			     }
    }
}

?>