<?php
session_start();
include '../db.php';
$login = $_SESSION['login'];
if(@$_SESSION['zalogowany']==1){

if ($_POST["zmien_dane"]) {
		$blad = 0;
        $tabela = 'uzytkownik'; 
        $email = htmlspecialchars(stripslashes(strip_tags(trim($_POST["email"]))), ENT_QUOTES);
        $imie = htmlspecialchars(addslashes(strip_tags(trim($_POST["imie"]))), ENT_QUOTES);
        $nazwisko = htmlspecialchars(addslashes(strip_tags(trim($_POST["nazwisko"]))), ENT_QUOTES);

		if (!preg_match("/[(@)]/", $email)) {
        $blad++;
        echo '<p> Proszę wprowadzić poprawnie adres email.</p>';
        }
        if($blad == 0){
		$zapytaj = "UPDATE $tabela SET imie='$imie', nazwisko='$nazwisko', email='$email' WHERE login='$login'";
		if(mysql_query($zapytaj)){
		echo '<p>Zmiany zostały wprowadzone</p>';} 
        mysql_close($polaczenie);

}else{header('Location: ../index.php ');}
}
}
?>