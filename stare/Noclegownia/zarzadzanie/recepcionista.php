<?php
session_start();
include '../db.php';
$login = $_SESSION['login'];
if(@$_SESSION['zalogowany']==1)
{
	$uprawnienia=(mysql_query("SELECT * FROM uzytkownik WHERE login='$login' AND typ_konta=30"));
    	if (mysql_num_rows($uprawnienia) == 1) {header('Location: uzytkownik.php ');
	exit;}
	$uprawnienia=(mysql_query("SELECT * FROM uzytkownik WHERE login='$login' AND typ_konta=10"));
	if (mysql_num_rows($uprawnienia) == 1) {header('Location: admin.php ');
	exit;}
}else{header('Location: ../index.php ');}
?>