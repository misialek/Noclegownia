<?php
session_start();
include '../../db.php';
if(@$_SESSION['zalogowany']==1){

if ($_POST["zmien_dane"]) {
		$blad = 0;
        $tabela = 'uzytkownik';
        $imie = htmlspecialchars(addslashes(strip_tags(trim($_POST["imie"]))), ENT_QUOTES);
        $nazwisko = htmlspecialchars(addslashes(strip_tags(trim($_POST["nazwisko"]))), ENT_QUOTES);
        $email = htmlspecialchars(addslashes(strip_tags(trim($_POST["email"]))), ENT_QUOTES);
		$id = htmlspecialchars(addslashes(strip_tags(trim($_POST["id_u"]))), ENT_QUOTES);
		$typ = htmlspecialchars(addslashes(strip_tags(trim($_POST["typ"]))), ENT_QUOTES);
		if (!isset($_POST["nazwa_nocleg"])){
		$naz_noc = 0;}else{$naz_noc = $_POST["nazwa_nocleg"];}

        if (!preg_match("/[(@)]/", $email)) {
        $blad++;
        echo '<p> Proszę wprowadzić poprawnie adres email.</p>';}
		
        if($blad == 0){
		$zapytaj = "UPDATE $tabela SET imie='$imie', nazwisko='$nazwisko', id_miejsce='$naz_noc', typ_konta='$typ', email='$email' WHERE id='$id'";
		if(mysql_query($zapytaj)){
		echo '<p>Zmiany zostały wprowadzone.<br />
		Jeżeli utowrzyłeś konto z uprawnieniami recepcjonisty musisz mu przypożątkować noclegownie. </p>';}
		else{
		echo 'błąd nr: '.$naz_noc.' blad '.$blad.'';
		}

}else{echo '<a href="uzytkownik_zmien_da.php?id='.$id.'"><button>Wstecz</button>';}
}
}
?>