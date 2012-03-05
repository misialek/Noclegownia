<?php

session_start();
?>
<?php


$sql_host = 'spowiedz.xaa.pl';
$sql_user = 'spowiedz_user';
$sql_password = 'qwerty123';
$sql_baza = 'spowiedz_cms';

if (mysql_connect($sql_host, $sql_user, $sql_password) and mysql_select_db($sql_baza)) {

$result=mysql_query("SELECT * FROM maile WHERE odbiorca='".$_SESSION['login']."'");
if(!$result){
echo "Nie ma takiego użytkownika!";
}
else 
{
if(mysql_query("UPDATE maile SET stan='przeczytane' where odbiorca='".$_SESSION['login']."'")) {
 echo'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
echo'<html xmlns="http://www.w3.org/1999/xhtml">';
echo'<head>';
echo'<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
echo'<title>Free Css Template 177</title>';
echo'<link href="styles.css" rel="stylesheet" type="text/css" />';
echo'<center>';
echo'<font size="30">';
echo'<font color="white"';
echo'<br><br><br><br><br><br><br>';
echo 'Wiadomości zostały przeczytane.<br>W kolejnym logowaniu możesz zobaczyć je już tylko w archiwum';
echo'<br>';
echo'<a href="user.php">Wróć do panelu użytkownika</a>';}
}
}
?>