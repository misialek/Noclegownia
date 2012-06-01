<?php
include 'db.php';
include 'include/mail_to.php';
 
if (isset($_POST['przypomnij'])) {
 
$login = $_POST["login"];
$email = $_POST["email"];
$limit = 8;
$haslo_nowe = substr(md5(time().rand()),0,$limit);
$haslo = md5($haslo_nowe);
$blad = 0;
 
       if ((strlen($login) < 3 or strlen($login) > 30) and (preg_match('/^[a-z\d_]{2,20}$/i', $login))){
            $blad++;
            echo '<p>Proszę poprawny wprowadzić login (od 3 do 30 znaków).</p>';
        }
		
        if (!preg_match("/[(@)]/", $email)) {
            $blad++;
            echo '<p> Proszę wprowadzić poprawnie adres email.</p>';
        }
 
        if ($blad == 0) {
		$wynik=mysql_query("SELECT * FROM uzytkownik WHERE login='$login' and email='$email'");
        if (mysql_num_rows($wynik) == 1) {
        if(mysql_query("UPDATE uzytkownik SET haslo='$haslo' WHERE login = '$login' AND email = '$email' AND status = '1'")){
		echo 'Wiadomość e-mail z hałem została wysłana.';
		$list = "Witaj $login !
Twoje obecne dane do logowania.
Login: $login
Hasłó: $haslo_nowe
Proszę po zalogowaniu do serwisu zmienić hasło (Zarządzanie -> Zmień hasło).";
		mail($email, "Przypomnienie hasla.", $list, $mail_to);}
        }else{
		echo 'Błąd!<br />Wprowadziłeś nieprawidłowe dane.';}
		}
 } 
?>