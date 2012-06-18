<?php
session_start();
include '../../db.php';
if(@$_SESSION['zalogowany']==1){

if ($_POST["dodanie_noc"]) {
		$blad = 0;
		$ocena = 0;
                        $tabela = 'noclegownia';
                        $nazwa = htmlspecialchars(addslashes(strip_tags(trim($_POST["nazwa"]))), ENT_QUOTES);
                        $miejscowosc = htmlspecialchars(addslashes(strip_tags(trim($_POST["miejscowosc"]))), ENT_QUOTES);
		$ulica = htmlspecialchars(addslashes(strip_tags(trim($_POST["ulica"]))), ENT_QUOTES);
		$kod_pocztowy = htmlspecialchars(addslashes(strip_tags(trim($_POST["kod_pocztowy"]))), ENT_QUOTES);
		$opis = htmlspecialchars(addslashes(strip_tags(trim($_POST["opis"]))), ENT_QUOTES);
		$typ_noc = htmlspecialchars(addslashes(strip_tags(trim($_POST["typ_noclegu"]))), ENT_QUOTES);
		$nr_konta = htmlspecialchars(addslashes(strip_tags(trim($_POST["nr_bank"]))), ENT_QUOTES);
		$foto = '';
		if($_FILES['zdjecie']['name'] != ''){
		$foto = addslashes(file_get_contents($_FILES['zdjecie']['tmp_name']));}
		
        if (strlen($nazwa) < 1 or strlen($nazwa) > 30 ) {
        $blad++;
        echo '<p>Proszę wpisać nazwe. </p>';}
		
        if($blad == 0){
		$zapytaj = "INSERT INTO $tabela (nazwa, miejscowosc, kod_pocztowy, ulica, opis, ocena, typ, zdjecie) VALUES ('$nazwa', '$miejscowosc', '$kod_pocztowy', '$ulica', '$opis', '$nr_konta', '$typ_noc', '$foto')";
		if(mysql_query($zapytaj)){
		echo '<p>Zmiany zostały wprowadzone</p>';}
		else{
		echo 'błąd nr: '.$typ_noc.' blad '.$blad.'';
		}

}else{echo '<a href="nocleg_dod.php"><button>Wstecz</button>';}
}
}
?>