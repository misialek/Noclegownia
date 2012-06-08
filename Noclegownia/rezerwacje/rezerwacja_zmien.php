<?php
session_start();
include '../db.php';
include '../include/mail_to.php';
if(@$_SESSION['zalogowany']==1){
$login = $_SESSION['login'];
if(isset($_POST["zmien"]))
{
$id_rezerwacji = $_POST["id_rez"];
$id_pok = $_POST["id_pok"];
$rezerwacja_o = $_POST["rezerwacja_od"];
$rezerwacja_d = $_POST["rezerwacja_do"];
$hour_od = $_POST["hour_od"];
$minute_od = $_POST["minute_od"];
$hour_do = $_POST["hour_do"];
$minute_do = $_POST["minute_do"];
$obecna_d = date ("m/d/Y");
$hour_o = date("H");
$minute_o = date("i");

if ((strlen($rezerwacja_o) < 6) or (strlen($rezerwacja_o) > 11) or (strlen($rezerwacja_d) < 6 ) or (strlen($rezerwacja_d) > 11)) {
echo '<a href="rezerwacja_zm.php?zmien='.$id_rezerwacji.'&id_pok='.$id_pok.'"><button>Wstecz</button></a>&nbsp;&nbsp;Wypełnij pola.';}else{

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
	if($obecna_data > $rezerwacja_od){echo '<a href="rezerwacja_zm.php?zmien='.$id_rezerwacji.'&id_pok='.$id_pok.'"><button>Wstecz</button></a>&nbsp;&nbsp;Wybrana data już była.';}else{
	if($rezerwacja_od > $rezerwacja_do){echo '<a href="rezerwacja_zm.php?zmien='.$id_rezerwacji.'&id_pok='.$id_pok.'"><button>Wstecz</button></a>&nbsp;&nbsp;Data wyjazdu jest wcześniejsza od daty przyjazdu.';}else{
	$sql="SELECT * FROM rezerwacje WHERE status = 1 AND id_rez != '$id_rezerwacji' AND (id_pokoj = '$id_pok'
	AND (data_od <= $rezerwacja_od 
	AND data_do <= $rezerwacja_do 
	AND data_do >= $rezerwacja_od) OR
	(data_od >= $rezerwacja_od 
	AND data_do >= $rezerwacja_do 
	AND data_od <= $rezerwacja_do))";
	
	$query=mysql_query($sql);
	if( mysql_num_rows( $query ) > 0)
	{
	echo '<a href="rezerwacja_zm.php?zmien='.$id_rezerwacji.'&id_pok='.$id_pok.'"><button>Wstecz</button></a>&nbsp;&nbsp;Proszę wybrać inny termin!&nbsp;Obecny termin jest już zajęty.';
	}else{
	if(mysql_query("UPDATE rezerwacje SET data_od='$rezerwacja_od', data_do='$rezerwacja_do', status='0' WHERE login='$login' AND id_rez = '$id_rezerwacji'")){
	echo '<a href="rezerwacja_zm.php?zmien='.$id_rezerwacji.'&id_pok='.$id_pok.'"><button>Wstecz</button></a>&nbsp;
	Przesunięto termin rezerwacji.<br />&nbsp;&nbsp;W ciągu nabliższych 5 minut otrzymasz wiadomość e-mail z linkiem potwierdzającym rezerwację.';
	$mail=mysql_query("SELECT uzytkownik.email, uzytkownik.login AS log, rezerwacje.id_rez FROM uzytkownik JOIN rezerwacje ON (uzytkownik.login = rezerwacje.login) 
	WHERE uzytkownik.login='$login' AND data_od=$rezerwacja_od AND rezerwacje.status='0'");
	$email=mysql_fetch_assoc($mail);
	$log=$email['log'];
	$id_rez=$email['id_rez'];
	$list = "Witaj $login!
	
Kliknij w poniższy link, aby aktywować rezerwację.
http://noclegownia.net16.net/komunikaty.php?login=$log&id=$id_rez";
	mail($email['email'], "Potwierdzenie rezerwacji.", $list, $mail_to);}
	}
	}
	}
	}
}
}
}else{header('Location: ../index.php ');}
?>
