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

     <b><h1 class="style1">Zarządzanie </b>kontem - Recepcjonista</h1>
		<br /><br /><br /><br /><br /><br />
	<table style="width: 100%">
	<tr>
		<td class="style1" style="width: 50%">Dodaj pokój</td>
		<td class="style1">Wyświetl pokoje</td>
	</tr>
	<tr>
		<td class="style1" style="width: 50%"><a href="../zarzadzanie_noclegownia/index.php?akcja=dodajPokoj"><button>Dodaj</button></a></td>
		<td class="style1"><a href="../zarzadzanie_noclegownia/index.php?akcja=listujPokoje"><button>Wyświetl</button></a></td>
	</tr>
	<tr>
		<td class="style1" style="width: 50%">&nbsp;</td>
		<td class="style1">&nbsp;</td>
	</tr>
	<tr>
		<td class="style1" style="width: 50%">&nbsp;</td>
		<td class="style1">&nbsp;</td>
	</tr>
	<?php
		$zapytanie=(mysql_query("SELECT id_miejsce FROM uzytkownik
		WHERE login = '$login'"));
		$id=mysql_fetch_assoc($zapytanie);
		$id_miejsce = $id['id_miejsce'];
	?>
	<tr>
		<td class="style1" style="width: 50%">Edytyj profil noclegowni</td>
		<td class="style1">Zmień dane osobowe</td>
	</tr>
	<tr>
		<td class="style1" style="width: 50%"><a href="../admin/adm_zarzadzanie/nocleg_zmien_da.php?id=<?php echo $id_miejsce; ?>"><button>Edytuj</button></td>
		<td class="style1"><a href="rezepcionista_zmien_da.php"><button>Zmień</button></a></td>
	</tr>
	<tr>
		<td class="style1" style="width: 50%">&nbsp;</td>
		<td class="style1">&nbsp;</td>
	</tr>
	<tr>
		<td class="style1" style="width: 50%">&nbsp;</td>
		<td class="style1">&nbsp;</td>
	</tr>
	<tr>
		<td class="style1" style="width: 50%">Zmień hasło</td>
		<td class="style1">Usuń konto</td>
	</tr>
	<tr>
		<td class="style1" style="width: 50%"><a href="rezepcionista_has.php"><button>Zmień</button></a></td>
		<td class="style1"><a href="" onclick="confDel('uzytkownik_usun.php');"><button>Usuń</button></a></td>
	</tr>
	</table>

</body>
</html>	
<?php
}else{header('Location: ../index.php ');}
?>