﻿<?php
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

<style type="text/css">
body {font:10px Arial, Helvetica, sans-serif; text-align: center; font-size:10px;}
th, td {
font-size:14px;
padding: 1px 2px 1px 2px;
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
<script>
function wysylaj()
{if (window.confirm("Czy chcesz skasować rezerwację?"))
  document.form.submit();
 else return false;
}
</script>

<?php	
	$sql="SELECT noclegownia.id, noclegownia.nazwa, noclegownia.miejscowosc, noclegownia.kod_pocztowy, noclegownia.ulica, noclegownia.opis, noclegownia.ocena, noclegownia.typ,
	rezerwacje.id_rez, rezerwacje.data_od, rezerwacje.data_do, rezerwacje.status, rezerwacje.id_pokoj,
	pokoj.tytul, pokoj.cena
	FROM pokoj
	JOIN noclegownia ON ( id_miejsce = id )
   	JOIN rezerwacje ON ( id_pok = id_pokoj )
	WHERE login='$login'AND rezerwacje.status != 0
	ORDER BY status";   
	
	echo	'<table width="100%">
	<tr>
	<th>Id</th><th>Nazwa noclegowni</th><th>Pokój</th><th>Data i godz. od</th><th>Data i godz. do</th><th>Ile dni i godz.</th><th>Status</th><th>Cena</th><th>&nbsp;&nbsp;&nbsp;</th><th>&nbsp;&nbsp;&nbsp;</th></tr>';
	$query=mysql_query($sql);
	while($result=mysql_fetch_assoc($query))
	{
	if($result['status'] == '0'){
	$status = 'Nieaktywowana';}
	if($result['status'] == '1'){
	$status = 'Niezapłacona';}
	if($result['status'] == '2'){
	$status = 'Zapłacona';}
	if($result['status'] == '3'){
	$status = 'Odrzucona';}
	$dni = $result['data_do'] - $result['data_od'] - 68400;
	$godz = date('G', $dni);
	$min = date('i', $dni);
	$cena = date('j', $dni) * $result['cena'] + ($godz/24) * $result['cena'] + ($min/1440) * $result['cena'];
echo '<tr>';
		if($result['status'] == '0'){
		echo '<td></td>';}else{
		echo '<td>'.$result['id_rez'].'</td>';}
		echo '<td>'.$result['nazwa'].'</td>
		<td>'.$result['tytul'].'</td>
		<td>'.date('d.m.Y, G:i' , $result['data_od']).'</td>
		<td>'.date('d.m.Y, G:i' , $result['data_do']).'</td>';
		if((date('G', $dni) == 0) AND (date('i', $dni) == 00)){
		if(date('j', $dni)== 1){
		echo '<td>'.date('j', $dni).' dzień</td>';}else{
		echo '<td>'.date('j', $dni).' dni</td>';}}else{
		if(date('i', $dni) == 00){
		if(date('j', $dni)== 1){
		echo '<td>'.date('j', $dni).' dzień '.date('G', $dni).' godz.</td>';}else{
		echo '<td>'.date('j', $dni).' dni '.date('G', $dni).' godz.</td>';}}else{
		if(date('j', $dni)== 1){
		echo '<td>'.date('j', $dni).' dzień '.date('G:i', $dni).' godz.</td>';}else{
		echo '<td>'.date('j', $dni).' dni '.date('G:i', $dni).' godz.</td>';}}}
		echo '<td>'.$status.'</td>
		<td>'.round($cena, 0).'zł</td>';
		if(($result['status'] == '2') OR ($result['status'] == '3')){
		echo '<td><a href="rezerwacja_zm.php?zmien='.$result['id_rez'].'&id_pok='.$result['id_pokoj'].'"><button disabled="disabled">Przesuń</button></a></td>
		<form method="post" onsubmit="return wysylaj()" action="rezerwacja_usun.php?usun='.$result['id_rez'].'">
		<td><input type="submit" value="Usuń" disabled="disabled" /></form></td>';}
		if(($result['status'] == '0') OR ($result['status'] == '1')){
		echo '<td><a href="rezerwacja_zm.php?zmien='.$result['id_rez'].'&id_pok='.$result['id_pokoj'].'"><button>Przesuń</button></a></td>
		<form method="post" onsubmit="return wysylaj()" action="rezerwacja_usun.php?usun='.$result['id_rez'].'">
		<td><input type="submit" value="Usuń" /></form></td>';}
echo '</tr>';
	}
echo	'</table><br />';
}else{header('Location: ../index.php ');}
?>
