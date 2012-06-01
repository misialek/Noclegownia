<link rel="stylesheet" href="../css/style2.css" type="text/css" media="all">
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
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rezerwację</title>
<style type="text/css">
.style1 {
	text-align: center;
}
</style>
</head>

<body>

     <b><h1 class="style1">Zarządzanie </b>rezerwacjami - Recepcjonista</h1>
		<br /><br /><br /><br /><br />
	<table style="width: 100%">
	<tr>
		<td class="style1" style="width: 100%">np. wyświetlenie rezerwacji dla noclegowni</td>
	</tr>
	</table>

</body>
</html>	
<?php
}else{header('Location: ../index.php ');}
?>