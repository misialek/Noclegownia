<?php
session_start();
include '../db.php';
$login = $_SESSION['login'];
if(@$_SESSION['zalogowany']==1){

if ($_POST["zmien_haslo"]) {
		$blad = 0;
        $tabela = 'uzytkownik'; 
        $haslo = $_POST["haslo"];
        $haslo2 = $_POST["haslo2"];
        $haslo3 = $_POST["haslo3"];
				if (strlen($haslo2) < 6 or strlen($haslo2) > 12 ) {
		$blad++;
            echo '<p>Proszę poprawnie wpisać hasło (od 6 znaków do 12 znaków). </p>';}
			
		if ($haslo2 !== $haslo3) {
		$blad++;
            echo '<p> Podane hasła nie s± ze sob± zgodne. </p>';}
		else{
		$haslo = md5($haslo);
		$haslo2 = md5($haslo2);
		$haslo3 = md5($haslo3);
		
        $wynik=mysql_query("SELECT * FROM $tabela WHERE haslo!='$haslo'");
        if (mysql_num_rows($wynik) == 1) {
            echo '<p>Podaj poprawnie stare hasło</p>';
            exit;
        }
		
		$mail=mysql_query("SELECT * FROM $tabela WHERE login='$login'");
		$email=mysql_fetch_assoc($mail);
 
        $wynik=mysql_query("SELECT * FROM $tabela WHERE haslo='$haslo'");
        if (mysql_num_rows($wynik) == 1 && $blad == 0) {
			$zapytaj = "UPDATE $tabela SET haslo='$haslo2' WHERE login='$login'";
			if(mysql_query($zapytaj)){
			$list = "Witaj $login !
            Twoje hasło zostało zmienione";
            mail($email['email'], "Zmiana hasła", $list, "From: <biuro@spowiedz.xaa.pl>");
			echo '<p>Hasło zostało zmienione<br>Zaloguj się ponownie</p>';}
        }
        }
        mysql_close($polaczenie);
}
}else{header('Location: ../index.php ');}
?>