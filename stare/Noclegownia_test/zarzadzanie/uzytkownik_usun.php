<?php
session_start();
include '../db.php';
$login = $_SESSION['login'];

$uprawnienia=(mysql_query("SELECT * FROM uzytkownik WHERE login='$login' AND typ_konta != 10"));
if (mysql_num_rows($uprawnienia) == 1){
if(@$_SESSION['zalogowany']==1)
{
	if(mysql_query("DELETE FROM uzytkownik WHERE login='$login'")){  
	session_destroy();
	$_SESSION = array();
	$_SESSION['zalogowany']=0;
	header('Location: ../index.php ');}
}else{header('Location: ../index.php ');}
}else{echo 'Administrator nie może usunąć własnego konta';}
?>