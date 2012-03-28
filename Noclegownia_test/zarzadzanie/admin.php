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
	$uprawnienia=(mysql_query("SELECT * FROM uzytkownik WHERE login='$login' AND typ_konta=20"));
    if (mysql_num_rows($uprawnienia) == 1) {header('Location: recepcionista.php ');
	exit;}
?>
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
		<td class="style1" style="width: 50%">Wyświetl uśytkowników</td>
		<td class="style1">Wyświetl noclegi</td>
	</tr>
	<tr>
		<td class="style1" style="width: 50%"><button>Wyświetl</button></td>
		<td class="style1"><button>Wyświetl</button></td>
	</tr>
	<tr>
		<td class="style1" style="width: 50%">&nbsp;</td>
		<td class="style1">&nbsp;</td>
	</tr>
	<tr>
		<td class="style1" style="width: 50%">Dodaj nową noclegownię</td>
		<td class="style1">itd.</td>
	</tr>
	<tr>
		<td class="style1" style="width: 50%"><button>Dodaj</button></td>
		<td class="style1">&nbsp;</td>
	</tr>
	</table>

</body>
</html>	
<?php
}else{header('Location: ../index.php ');}
?>