<?php
 
session_start(); // rozpocz�cie sesji
 
if (!isset($_SESSION['login'])) { // dost�p dla niezalogowanego u�ytkownika
 
    if ($_POST['wyslane']) { // je�eli formularz zosta� wys�any, to wykonuje si� poni�szy skrypt
 
        include 'db.php'; // po��czenie si� z baz� danych
        $tabela = 'users'; // zdefiniowanie tabeli MySQL
 
        $login = $_POST["login"];
        $haslo = $_POST["haslo"];
 
        $haslo = md5($haslo); // szyfrowanie podanego has�a
 
        $wynik=mysql_query("SELECT * FROM $tabela WHERE
       user_login='$login' and user_haslo='$haslo' and status=0");
 
        // je�eli u�ytkownik zarejestrowa� si�, a nie aktywowa� swojego konta, to wy�wietla si� komunikat
        if (mysql_num_rows($wynik) == 1) {
            $informacja = mysql_fetch_array($wynik);
            echo '<p>Nie aktywowałeś jeszcze swojego konta. Aby to zrobić, wejdź w swoją skrzynkę odbiorczą, a nastepnie znajdź wiadmość z linkiem aktywacyjnym i aktywuj swoje konto</p>';
            exit;
        }
 
        // je�eli wszystko jest dobrze, u�ytkownik si� loguje
        $wynik=mysql_query("SELECT * FROM $tabela WHERE
       user_login='$login' and user_haslo='$haslo' and status=1");
 
        if (mysql_num_rows($wynik) == 1) {
            $informacja = mysql_fetch_array($wynik);
						
            $_SESSION["login"] = $informacja["login"];
            header('Location: user.php ');
        } else {
            echo '<p>Zostały wprowadzone nieprawidłowe dane</p>';
        }
		
		$wynik=mysql_query("SELECT * FROM $tabela WHERE
       user_login='ksiadz' and user_haslo='$haslo' and status=1");
 
        if (mysql_num_rows($wynik) == 1) {
            $informacja = mysql_fetch_array($wynik);
						
            $_SESSION["login"] = $informacja["login"];
            header('Location: ksiadz.php ');
        } else {
            echo '<p>Zostały wprowadzone nieprawidłowe dane</p>';
        }
		
        mysql_close($polaczenie);
    }
 
    
 
} else {
    header('Location: user.php '); // zalogowany u�ytkownik zostaje przekierowany na stron� g��wn�
}
 
if ($_GET["wylogowanie"] == "tak") {
    // niszczenie sesji u�ytkownika
    session_unset();
    session_destroy();
    header('Location: /logowanie.php '); // przekierwanie na stron� g��wn�
}
 
?>