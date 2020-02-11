<?php
session_start();
$dbName = 'nvartovs_taxi';
$username = 'nvartovs_taxi';
$password = '3fV!!NhW6m?L';

mysql_connect ("localhost", $username, $password);
mysql_select_db ($dbName);
mysql_query("SET NAMES utf8");

$login = $_SESSION['login'];
$password = $_SESSION['password'];
$id_user = $_SESSION['id'];
?>