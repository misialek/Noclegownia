<?php
session_start();
include '../db.php';
if(@$_SESSION['zalogowany']==1){
if(isset($_GET['usun'])){
$usun = $_GET['usun'];
$login = $_SESSION['login'];
	if(mysql_query("DELETE FROM rezerwacje WHERE login='$login' AND id_rez='$usun'")){  
	header('Location: ../colorbox.php ');}
}
}else{header('Location: ../index.php ');}
?>