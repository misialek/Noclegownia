<link rel="stylesheet" href="../css/style2.css" type="text/css" media="all">
<?php
session_start();
include '../db.php';
$login = $_SESSION['login'];
if(@$_SESSION['zalogowany']==1)
{
	$uprawnienia=(mysql_query("SELECT * FROM uzytkownik WHERE login='$login' AND typ_konta=20"));
    	if (mysql_num_rows($uprawnienia) == 1) {header('Location: recepcionista.php ');
	exit;}
	$uprawnienia=(mysql_query("SELECT * FROM uzytkownik WHERE login='$login' AND typ_konta=10"));
	if (mysql_num_rows($uprawnienia) == 1) {header('Location: admin.php ');
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
<script type="text/javascript">
function confDel( url )
{
   if( confirm( 'Czy na pewno chcesz usunąć konto?') )
   {
      window.top.location.href = url;
   }
}
</script>

     <b><h1 class="style1">Zarządzanie </b>kontem</h1>
		<br /><br /><br /></ br><br />
     <table style="width: 54%; height: 48px" align="center">
	<tr>
		<td class="style1">Zmień dane osobowe</td>
	</tr>
	<tr>
		<td class="style1">
		<a href="uzytkownik_zmien_da.php">
		<button>Zmień</button></a></td>
	</tr>
</table>
<p>&nbsp;</p>
<table style="width: 54%; height: 48px" align="center">
	<tr>
		<td class="style1">Zmień hasło</td>
	</tr>
	<tr>
		<td class="style1">
		<a href="uzytkownik_has.php">
		<button>Zmień</button></a></td>
	</tr>
</table>
<p>&nbsp;</p>
<table style="width: 54%; height: 48px" align="center">
	<tr>
		<td class="style1">Usuń konto</td>
	</tr>
	<tr>
		<td class="style1">
		<a href="" onclick="confDel('uzytkownik_usun.php');">
		<button>Usuń</button></a></td>
	</tr>
</table>
</body>
</html>
<?php
}else{header('Location: ../index.php ');}
?>
