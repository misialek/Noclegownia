<?php
session_start();
include '../db.php';
$login = $_SESSION['login'];
if(@$_SESSION['zalogowany']==1)
{
	$uprawnienia=(mysql_query("SELECT * FROM uzytkownik WHERE login='$login' AND typ_konta=0"));
    if (mysql_num_rows($uprawnienia) == 1) {header('Location: uzytkownik.php ');
	exit;}
	$uprawnienia=(mysql_query("SELECT * FROM uzytkownik WHERE login='$login' AND typ_konta=1"));
    if (mysql_num_rows($uprawnienia) == 1) {header('Location: recepcionista.php ');
	exit;}
}
?>