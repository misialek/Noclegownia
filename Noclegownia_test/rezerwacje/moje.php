<style type="text/css">
body {font:13px Arial, Helvetica, sans-serif;}
th, td {
padding: 7px
}
th {
background: #FFF3C9; 
color: #414632
}
td {
text-align: center; 
background: #F4FFE0
}
table {
background: #D0C6A4 
}
</style>
<?php	
session_start();
include '../db.php';
$login = $_SESSION['login'];
if(@$_SESSION['zalogowany']==1)
{
	$sql="SELECT noclegownia.id, noclegownia.nazwa, noclegownia.miejscowosc, noclegownia.kod_pocztowy, noclegownia.ulica, noclegownia.opis, noclegownia.ocena, noclegownia.typ,
	rezerwacje.id_rez, rezerwacje.data_od, rezerwacje.data_do, rezerwacje.status
	FROM noclegownia
	LEFT JOIN rezerwacje ON ( id_pokoj = id )
	WHERE login='$login' AND rezerwacje.status = '0'
	ORDER BY status";   
	
	echo '<br />';
	echo	'<table width="100%">
	<tr><th>Nazwa noclegowni</th><th>Data od</th><th>Data do</th><th>Status</th><th>Przesuń rezerwację</th><th>Usuń reserwację</th></tr>';
	$query=mysql_query($sql);
	while($result=mysql_fetch_assoc($query))
	{
	if($result['status'] == '0'){
	$ststus = 'Nieaktywowany';}
	if($result['status'] == '1'){
	$status = 'Aktywowany';}
echo '<tr>
		<td>'.$result['nazwa'].'</td>
		<td>'.date('d.m.Y' , $result['data_od']).'</td>
		<td>'.date('d.m.Y' , $result['data_do']).'</td>
		<td>'.$ststus.'</td>
		<td><a href="rezerwacje/rezerwacja_zmien.php?zmien='.$result['id_rez'].'"><button>Przesuń</button></a></td>
		<td><a href="rezerwacje/rezerwacja_usun.php?usun='.$result['id_rez'].'"><button>Usuń</button></a></td>
	</tr>';
	}
echo	'</table><br />';
}
?>