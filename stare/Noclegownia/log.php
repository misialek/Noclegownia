﻿<?php
 
session_start(); // rozpoczęcie sesji
 
if (!isset($_SESSION['login'])) { // dostęp dla niezalogowanego użytkownika
 
    if ($_POST['wyslane']) { // jeżeli formularz został wysłany, to wykonuje się poniższy skrypt
 
        include 'db.php'; // połączenie się z bazą danych
        $tabela = 'uzytkownik'; // zdefiniowanie tabeli MySQL
 
        $login = $_POST["login"];
        $haslo = $_POST["haslo"];
 
       // $haslo = md5($haslo); // szyfrowanie podanego hasła
 
        $wynik=mysql_query("SELECT * FROM $tabela WHERE
       login='$login' and haslo='$haslo' and status=0");
 
        // jeżeli użytkownik zarejestrował się, a nie aktywował swojego konta, to wyświetla się komunikat
        if (mysql_num_rows($wynik) == 1) {
            $informacja = mysql_fetch_array($wynik);
            echo '<p>Nie aktywowałeś jeszcze swojego konta. Aby to zrobić, wejdź w swoją skrzynkę odbiorczą, a następnie znajdź wiadmość z linkiem aktywacyjnym i aktywuj swoje konto</p>';
            exit;
        }
 
        // jeżeli wszystko jest dobrze, użytkownik się loguje
        $wynik=mysql_query("SELECT * FROM $tabela WHERE
       login='$login' and haslo='$haslo' and status=1");
 
        if (mysql_num_rows($wynik) == 1) {
            $informacja = mysql_fetch_array($wynik);
            $_SESSION["login"] = $informacja["login"];
	        $_SESSION['zalogowany']=1;
			header('Location: index.php ');
        } else {
            echo '<p>Zostały wprowadzone nieprawidłowe dane</p>';
        }
        mysql_close($polaczenie);
    }

 
} else {
	$_SESSION['zalogowany']=1;
	header('Location: index.php ');
    // zalogowany użytkownik zostaje przekierowany na stronę główną
}
 
?>