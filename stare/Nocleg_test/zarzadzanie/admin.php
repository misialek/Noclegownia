﻿<link rel="stylesheet" href="../css/style2.css" type="text/css" media="all">
<?php
session_start();
include '../db.php';
$login = $_SESSION['login'];
if(@$_SESSION['zalogowany']==1)
{
	$uprawnienia=(mysql_query("SELECT * FROM uzytkownik WHERE login='$login' AND typ_konta=30"));
    if (mysql_num_rows($uprawnienia) == 1) {header('Location: uzytkownik.php ');
	exit;}
	$uprawnienia=(mysql_query("SELECT * FROM uzytkownik WHERE login='$login' AND typ_konta=20"));
    if (mysql_num_rows($uprawnienia) == 1) {header('Location: recepcionista.php ');
	exit;}
?>
<script type="text/javascript">
function nextPage( url )
{   
      window.top.location.href = url;   
}
</script>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zarządzanie kontem</title>
<style type="text/css">
.style1 {
	text-align: center;
}
</style>
</head>

<body>

     <b><h1 class="style1">Zarządzanie </b>kontem - Administrator</h1>
		<br /><br /><br /><br /><br />
	<table style="width: 100%">
	<tr>
		<td class="style1" style="width: 50%">Zmień dane osobowe</td>
		<td class="style1">Zmień hasło</td>
	</tr>
	<tr>
		<td class="style1">	<a href="uzytkownik_zmien_da.php"> <button>Zmień</button></a></td>
		<td class="style1">	<a href="uzytkownik_has.php"> <button>Zmień</button></a></td>
	</tr>
	<tr>
		<td class="style1" style="width: 50%">&nbsp;</td>
		<td class="style1">&nbsp;</td>
	</tr>
	<tr>
		<td class="style1" style="width: 50%"><b>Panel Administracyjny</b></td>
		
	</tr>
	<tr>
		<td class="style1">	<a href="" onclick="nextPage('../admin/index.php');"> <button>Przejdź</button></a></td>
	</tr>
	</table>

</body>
</html>	
<?php
}else{header('Location: ../index.php ');}
?>