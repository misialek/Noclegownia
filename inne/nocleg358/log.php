<?php
 
session_start(); // rozpoczêcie sesji
 
if (!isset($_SESSION['login'])) { // dostêp dla niezalogowanego u¿ytkownika
 
    if ($_POST['wyslane']) { // je¿eli formularz zosta³ wys³any, to wykonuje siê poni¿szy skrypt
 
        include 'db.php'; // po³±czenie siê z baz± danych
        $tabela = 'uzytkownik'; // zdefiniowanie tabeli MySQL
 
        $login = $_POST["login"];
        $haslo = $_POST["haslo"];
 
        $haslo = md5($haslo); // szyfrowanie podanego has³a
 
        $wynik=mysql_query("SELECT * FROM $tabela WHERE
       login='$login' and haslo='$haslo' and status=0");
 
        // je¿eli u¿ytkownik zarejestrowa³ siê, a nie aktywowa³ swojego konta, to wy¶wietla siê komunikat
        if (mysql_num_rows($wynik) == 1) {
            $informacja = mysql_fetch_array($wynik);
            echo '<p>Nie aktywowa³e¶ jeszcze swojego konta. Aby to zrobiæ, wejd¼ w swoj± skrzynkê odbiorcz±, a nastêpnie znajd¼ wiadmo¶æ z linkiem aktywacyjnym i aktywuj swoje konto</p>';
            exit;
        }
 
        // je¿eli wszystko jest dobrze, u¿ytkownik siê loguje
        $wynik=mysql_query("SELECT * FROM $tabela WHERE
       login='$login' and haslo='$haslo' and status=1");
 
        if (mysql_num_rows($wynik) == 1) {
            $informacja = mysql_fetch_array($wynik);
						
            $_SESSION["login"] = $informacja["login"];
            header('Location: user.php ');
        } else {
            echo '<p>Zosta³y wprowadzone nieprawid³owe dane</p>';
        }
        mysql_close($polaczenie);
    }
 
    
 
} else {
    header('Location: user.php '); // zalogowany u¿ytkownik zostaje przekierowany na stronê g³ówn±
}
 
if ($_GET["wylogowanie"] == "tak") {
    // niszczenie sesji u¿ytkownika
    session_unset();
    session_destroy();
    header('Location: / '); // przekierwanie na stronê g³ówn±
}
 
?>