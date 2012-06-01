﻿<?php
 
session_start(); // rozpoczęcie sesji
 
if (!isset($_SESSION['login'])) { // dostęp dla niezalogowanego użytkownika
 
    if ($_POST['wyslane']) { // jeżeli formularz został wysłany, to wykonuje się poniższy skrypt

	$obecna_d = date ("m/d/Y");
	$hour_o = date("H");
	$minute_o = date("i");

	$o=explode('/',$obecna_d);
	$month=$o[0];
	$day=$o[1]; 
	$year=$o[2];
	$obecna_data = mktime($hour_o, $minute_o, 0, $month, $day, $year); 
 
        include 'db.php'; // połączenie się z bazą danych
        $tabela = 'uzytkownik'; // zdefiniowanie tabeli MySQL
 
        $login = $_POST["login"];
        $haslo = $_POST["haslo"];
 
        $haslo = md5($haslo); // szyfrowanie podanego hasła
 
        $wynik=mysql_query("SELECT * FROM $tabela WHERE
       login='$login' and haslo='$haslo' and status=0");
 
        // jeżeli użytkownik zarejestrował się, a nie aktywował swojego konta, to wyświetla się komunikat
        if (mysql_num_rows($wynik) == 1) {
            $informacja = mysql_fetch_array($wynik);
            echo '<p>Nie aktywowałeś jeszcze swojego konta. Aby to zrobić, wejdź w swoją skrzynkę odbiorczą, a następnie znajdź wiadmość z linkiem aktywacyjnym i aktywuj swoje konto</p>';
            exit;
        }
		
		
        $wynik=mysql_query("SELECT * FROM $tabela WHERE
       login='$login' AND typ_konta=20 AND id_miejsce NOT IN (SELECT id FROM noclegownia)");
 
        // recepcjinista nie loguje się gdy nie ma dodanej noclegowni
        if (mysql_num_rows($wynik) == 1) {
            $informacja = mysql_fetch_array($wynik);
            echo '<p>Błąd!<br />Z tym kontem nie jest skojarzona noclegownia.<br />W celu rozwiązania problemów skontaktuj się z administratorem.<br />E-mail: info@noclegownia.keed.pl</p>';
            exit;
        }
 
        // jeżeli wszystko jest dobrze, użytkownik się loguje
        $wynik=mysql_query("SELECT * FROM $tabela WHERE
       login='$login' and haslo='$haslo' and status=1");
 
        if (mysql_num_rows($wynik) == 1) {
            $informacja = mysql_fetch_array($wynik);
            $_SESSION["login"] = $informacja["login"];
	        $_SESSION['zalogowany']=1;
			mysql_query("DELETE FROM rezerwacje WHERE data_od < '$obecna_data'");
			header('Location: odswiez.php');
        } else {
            echo '<p>Zostały wprowadzone nieprawidłowe dane</p>';
        }
        mysql_close($polaczenie);
    }

 
} else {
	$_SESSION['zalogowany']=1;
	header('Location: odswiez.php');
    // zalogowany użytkownik zostaje przekierowany na stronę główną
}
 
?>