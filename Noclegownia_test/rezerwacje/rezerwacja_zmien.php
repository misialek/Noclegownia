<?php
session_start();
include '../db.php';
$login = $_SESSION['login'];
if(@$_SESSION['zalogowany']==1){
if ($_POST["zmien"]) 
{
$id_rezerwacji = $_POST["id_rez"];
$id_pok = $_POST["id_pok"];
$rezerwacja_o = $_POST["rezerwacja_od"];
$rezerwacja_d = $_POST["rezerwacja_do"];
$obecna_d = date ("m/d/Y");

if ((strlen($rezerwacja_o) < 6) or (strlen($rezerwacja_o) > 11) or (strlen($rezerwacja_d) < 6 ) or (strlen($rezerwacja_d) > 11)) {
echo '<p>Wypełnij pola.</p>';}else{

$d=explode('/',$rezerwacja_o);
$month=$d[0];
$day=$d[1]; 
$year=$d[2];
$rezerwacja_od = mktime(0, 0, 0, $month, $day, $year); 

$e=explode('/',$rezerwacja_d);
$month=$e[0];
$day=$e[1]; 
$year=$e[2];
$rezerwacja_do = mktime(0, 0, 0, $month, $day, $year); 

$o=explode('/',$obecna_d);
$month=$o[0];
$day=$o[1]; 
$year=$o[2];
$obecna_data = mktime(0, 0, 0, $month, $day, $year); 


	if($obecna_data > $rezerwacja_od){echo 'Wybrana data już była';}else{
	if($rezerwacja_od > $rezerwacja_do){echo 'Data wyjazdu jest wcześniejsza od daty przyjazdu';}else{
	$sql="SELECT * FROM rezerwacje WHERE id_pokoj = '$id_pok' AND id_rez != '$id_rezerwacji'
	AND (data_od <= $rezerwacja_od 
	AND data_do <= $rezerwacja_do 
	AND data_do >= $rezerwacja_od) OR
	(data_od >= $rezerwacja_od 
	AND data_do >= $rezerwacja_do 
	AND data_od <= $rezerwacja_do)";
	
	$query=mysql_query($sql);
	if( mysql_num_rows( $query ) > 0)
	{
	echo 'Proszę wybrać inny termin!<br />
	Obecny termin jest już zajęty';
	}else{
	if(mysql_query("UPDATE rezerwacje SET data_od='$rezerwacja_od', data_do='$rezerwacja_do', status='0' WHERE login='$login' AND id_rez = '$id_rezerwacji'")){
	echo 'Przesunięto rezerwację.<br /> W przyszłości zostanie wysłany e-mail z linkiem potwierdzającym przesunięcie rezerwacji.';}
	}
	}
	}
}
}
}else{header('Location: ../index.php ');}
?>