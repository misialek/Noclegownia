<?php
session_start();
include '../../db.php';
if(@$_SESSION['zalogowany']==1){
$zakres = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '0');

if ($_POST["zmien_dane_noc"]) {
		$blad = 0;
        $tabela = 'noclegownia';
        $nazwa = htmlspecialchars(addslashes(strip_tags(trim($_POST["nazwa"]))), ENT_QUOTES);
        $miejscowosc = htmlspecialchars(addslashes(strip_tags(trim($_POST["miejscowosc"]))), ENT_QUOTES);
		$kod_pocztowy = htmlspecialchars(addslashes(strip_tags(trim($_POST["kod_pocztowy"]))), ENT_QUOTES);
		$id = htmlspecialchars(addslashes(strip_tags(trim($_POST["id_u"]))), ENT_QUOTES);
		$opis = htmlspecialchars(addslashes(strip_tags(trim($_POST["opis"]))), ENT_QUOTES);
		$typ_noc = htmlspecialchars(addslashes(strip_tags(trim($_POST["typ_nocleg"]))), ENT_QUOTES);
		$ulica = htmlspecialchars(addslashes(strip_tags(trim($_POST["ulica"]))), ENT_QUOTES);
		$nr_konta = htmlspecialchars(addslashes(strip_tags(trim($_POST["nr_bank"]))), ENT_QUOTES);
		$foto = '';
		$zmien_zdj = $_POST["zmien_zdj"];
		if($zmien_zdj == '1'){
		if($_FILES['zdjecie']['name'] != ''){
		$foto = addslashes(file_get_contents($_FILES['zdjecie']['tmp_name']));}}
		
        if (strlen($nazwa) < 1 or strlen($nazwa) > 20 ) {
        $blad++;
        echo '<p>Proszę wpisać nazwe. </p>';}
		
        if (strlen($miejscowosc) < 1 or strlen($miejscowosc) > 20 ) {
        $blad++;
        echo '<p>Proszę poprawnie wpisać miejscowość. </p>';}
		
        if (strlen($ulica) < 1 or strlen($ulica) > 20 ) {
        $blad++;
        echo '<p>Proszę poprawnie wpisać ulice. </p>';}
		
        if (strlen($kod_pocztowy) < 1 or strlen($kod_pocztowy) > 8 ) {
        $blad++;
        echo '<p>Proszę poprawnie wpisać kod pocztowy. </p>';}

        if (strlen($nr_konta) <= 25 or strlen($nr_konta) >= 33 ) {
        $blad++;
        echo '<p>Proszę poprawnie wpisać nr rachunku. </p>';}
		
        if($blad == 0){
		if($zmien_zdj == '0'){
		$zapytaj = "UPDATE $tabela SET ocena='$nr_konta', nazwa='$nazwa', miejscowosc='$miejscowosc', kod_pocztowy='$kod_pocztowy', opis='$opis', typ='$typ_noc' WHERE id='$id'";
		if(mysql_query($zapytaj)){
		echo '<p>Zmiany zostały wprowadzone.</p>';}
		else{
		echo 'błąd nr: '.$typ_noc.' blad '.$blad.'';
		}}else{
		if($foto != ''){
		$zapytaj = "UPDATE $tabela SET ocena='$nr_konta', nazwa='$nazwa', miejscowosc='$miejscowosc', kod_pocztowy='$kod_pocztowy', opis='$opis', typ='$typ_noc', zdjecie='$foto' WHERE id='$id'";
		if(mysql_query($zapytaj)){
		echo '<p>Zmiany zostały wprowadzone</p>';}
		else{
		echo 'błąd nr: '.$typ_noc.' blad '.$blad.'';
		}}else{echo '<a href="nocleg_zmien_da.php?id='.$id.'"><button>Wstecz</button></a>&nbsp;Błąd! Proszę wybrać plik ze zdjęciem.';}}

}else{echo '<a href="nocleg_zmien_da.php?id='.$id.'"><button>Wstecz</button>';}
}
}
?>