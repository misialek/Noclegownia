<?php
session_start();
include '../../db.php';
if(@$_SESSION['zalogowany']==1){

if ($_POST["zmien_dane"]) {
		$blad = 0;
        $tabela = 'uzytkownik';
        $imie = htmlspecialchars(addslashes(strip_tags(trim($_POST["imie"]))), ENT_QUOTES);
        $nazwisko = htmlspecialchars(addslashes(strip_tags(trim($_POST["nazwisko"]))), ENT_QUOTES);
		//$id_miejsce = htmlspecialchars(addslashes(strip_tags(trim($_POST["id_miejsce"]))), ENT_QUOTES);
		$id = htmlspecialchars(addslashes(strip_tags(trim($_POST["id_u"]))), ENT_QUOTES);
		$typ = htmlspecialchars(addslashes(strip_tags(trim($_POST["typ"]))), ENT_QUOTES);
		if (!isset($_POST["nazwa_nocleg"])){
		$naz_noc = 0;}else{$naz_noc = $_POST["nazwa_nocleg"];}

		
        if($blad == 0){
		$zapytaj = "UPDATE $tabela SET imie='$imie', nazwisko='$nazwisko', id_miejsce='$naz_noc', typ_konta='$typ'  WHERE id='$id'";
		if(mysql_query($zapytaj)){
		echo '<p>Zmiany zostały wprowadzone</p>';}
		else{
		echo 'błąd nr: '.$naz_noc.' blad '.$blad.'';
		}

}else{header('Location: ../index.php ');}
}
}
?>