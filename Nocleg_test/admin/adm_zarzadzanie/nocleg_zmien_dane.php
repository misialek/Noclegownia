<?php
session_start();
include '../../db.php';
if(@$_SESSION['zalogowany']==1){
$zakres = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '0');

if(in_array($_POST["ocena"], $zakres)){
if ($_POST["zmien_dane_noc"]) {
		$blad = 0;
        $tabela = 'noclegownia';
        $nazwa = htmlspecialchars(addslashes(strip_tags(trim($_POST["nazwa"]))), ENT_QUOTES);
        $miejscowosc = htmlspecialchars(addslashes(strip_tags(trim($_POST["miejscowosc"]))), ENT_QUOTES);
		$kod_pocztowy = htmlspecialchars(addslashes(strip_tags(trim($_POST["kod_pocztowy"]))), ENT_QUOTES);
		$id = htmlspecialchars(addslashes(strip_tags(trim($_POST["id_u"]))), ENT_QUOTES);
		$opis = htmlspecialchars(addslashes(strip_tags(trim($_POST["opis"]))), ENT_QUOTES);
		$typ_noc = htmlspecialchars(addslashes(strip_tags(trim($_POST["typ_nocleg"]))), ENT_QUOTES);
		$ocena = htmlspecialchars(addslashes(strip_tags(trim($_POST["ocena"]))), ENT_QUOTES);

		
        if($blad == 0){
		$zapytaj = "UPDATE $tabela SET nazwa='$nazwa', miejscowosc='$miejscowosc', kod_pocztowy='$kod_pocztowy', opis='$opis', typ='$typ_noc', ocena='$ocena'  WHERE id='$id'";
		if(mysql_query($zapytaj)){
		echo '<p>Zmiany zostały wprowadzone</p>';}
		else{
		echo 'błąd nr: '.$typ_noc.' blad '.$blad.'';
		}

}else{header('Location: ../index.php ');}
}
}else{echo 'Nie poprawna ocena. Wpisz wartość z zakresu od 0-10.';}
}
?>