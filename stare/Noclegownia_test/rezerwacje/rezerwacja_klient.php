<?php
session_start();
include '../db.php';
include '../include/mail_to.php';
if(@$_SESSION['zalogowany']==1){
$login = $_SESSION['login'];
if(isset($_POST["wolna_data"])) 
{
$id_pok = $_POST["id_pok"];
$rezerwacja_o = $_POST["rezerwacja_od"];
$rezerwacja_d = $_POST["rezerwacja_do"];
$hour_od = $_POST["hour_od"];
$minute_od = $_POST["minute_od"];
$hour_do = $_POST["hour_do"];
$minute_do = $_POST["minute_do"];
$obecna_d = date("m/d/Y");
$hour_o = date("H");
$minute_o = date("i");

if ((strlen($rezerwacja_o) < 6) or (strlen($rezerwacja_o) > 11) or (strlen($rezerwacja_d) < 6 ) or (strlen($rezerwacja_d) > 11)) {
echo '<p>Wypełnij pola.</p>';}else{

$d=explode('/',$rezerwacja_o);
$month=$d[0];
$day=$d[1]; 
$year=$d[2];
$rezerwacja_od = mktime($hour_od, $minute_od, 0, $month, $day, $year); 

$e=explode('/',$rezerwacja_d);
$month=$e[0];
$day=$e[1]; 
$year=$e[2];
$rezerwacja_do = mktime($hour_do, $minute_do, 0, $month, $day, $year);

$o=explode('/',$obecna_d);
$month=$o[0];
$day=$o[1]; 
$year=$o[2];
$obecna_data = mktime($hour_o, $minute_o, 0, $month, $day, $year); 

	if(($rezerwacja_od + 86400) > $rezerwacja_do){
	echo 'Minimalny termin rezerwacji to jedna doba.';}else{
	if($obecna_data > $rezerwacja_od){echo 'Wybrana data lub godzina już była.';}else{
	if($rezerwacja_od > $rezerwacja_do){echo 'Data wyjazdu jest wcześbiejsza od daty przyjazdu';}else{
	$sql="SELECT * FROM rezerwacje WHERE id_pokoj = '$id_pok' 
	AND ((data_od <= $rezerwacja_od 
	AND data_do <= $rezerwacja_do 
	AND data_do >= $rezerwacja_od) OR
	(data_od >= $rezerwacja_od 
	AND data_do >= $rezerwacja_do 
	AND data_od <= $rezerwacja_do))";
	
	$query=mysql_query($sql);
	if( mysql_num_rows( $query ) > 0)
	{
	echo 'Proszę wybrać inny termin!';
	}else{
	if(mysql_query("INSERT INTO rezerwacje VALUES('','$id_pok','$login' ,'$rezerwacja_od','$rezerwacja_do','', '')")){
	echo 'Dodano rezerwacje.<br />W ciągu nabliższych 5 minut dostaniesz wiadomość e-mail z linkiem potwierdzającym rezerwację.';
	$mail=mysql_query("SELECT uzytkownik.email, uzytkownik.login AS log, rezerwacje.id_rez FROM uzytkownik JOIN rezerwacje ON (uzytkownik.login = rezerwacje.login) 
	WHERE uzytkownik.login='$login' AND data_od=$rezerwacja_od AND rezerwacje.status='0'");
	$email=mysql_fetch_assoc($mail);
	$log=$email['log'];
	$id_rez=$email['id_rez'];
	$list = "Witaj $login !
    Kliknij w poniższy link, aby aktywować rezerwację.<br />
	Uwaga: Po aktywacji nie będzie możliwości edycji rezerwacji.
	http://www.spowiedz.xaa.pl/noclegownia/komunikaty.php?login=$log&id=$id_rez";
	mail($email['email'], "Potwierdzenie rezerwacji.", $list, $mail_to);}
	}
	}
	}
	}
}
}
}else{header('Location: ../index.php ');}
?>