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
		//$id = htmlspecialchars(addslashes(strip_tags(trim($_POST["id_u"]))), ENT_QUOTES);
		$opis = htmlspecialchars(addslashes(strip_tags(trim($_POST["opis"]))), ENT_QUOTES);
		$typ_noc = htmlspecialchars(addslashes(strip_tags(trim($_POST["typ_noclegu"]))), ENT_QUOTES);

		
        if($blad == 0){
		$zapytaj = "INSERT INTO $tabela (nazwa, miejscowosc, kod_pocztowy, ulica, opis, ocena, typ) VALUES ('$nazwa', '$miejscowosc', '$kod_pocztowy', '$ulica', '$opis', '$ocena', '$typ_noc')";
		if(mysql_query($zapytaj)){
		echo '<p>Zmiany zostały wprowadzone</p>';}
		else{
		echo 'błąd nr: '.$typ_noc.' blad '.$blad.'';
		}

}else{header('Location: ../index.php ');}
}
}
?>