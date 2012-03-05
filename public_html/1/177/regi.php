<?php
 
session_start(); // rozpocz�cie sesji
 ?>
 <?
if (!isset($_SESSION['login'])) { // dost�p dla niezalogowanego u�ytkownika
 
    include 'db.php'; // po��czenie si� z baz� danych
    $tabela = 'uzytkownik'; // zdefiniowanie tabeli MySQL
    require_once('recaptchalib.php'); // do��czenie modu�u reCAPTCHA
    $privatekey = '6LdCPMUSAAAAAGWSvi767yBGQtFjntar4wQoKfIx'; // prywatny klucz reCAPTCHA
    $publickey = '6LdCPMUSAAAAANr7mf2hpdiwI5aYKJE2DNidMAvn'; // publiczny klucz reCAPTCHA
 
    if ($_POST["wyslane"]) { // je�eli formularz zosta� wys�any, to wykonuje si� poni�szy skrypt
 
        // filtrowanie tre�ci wprowadzonych przez u�ytkownika
        $login = htmlspecialchars(stripslashes(strip_tags(trim($_POST["login"]))), ENT_QUOTES);
        $haslo = $_POST["haslo"];
        $haslo2 = $_POST["haslo2"];
        $email = htmlspecialchars(stripslashes(strip_tags(trim($_POST["email"]))), ENT_QUOTES);
        $email2 = htmlspecialchars(stripslashes(strip_tags(trim($_POST["email2"]))), ENT_QUOTES);
        $imie = htmlspecialchars(addslashes(strip_tags(trim($_POST["imie"]))), ENT_QUOTES);
        $nazwisko = htmlspecialchars(addslashes(strip_tags(trim($_POST["nazwisko"]))), ENT_QUOTES);
        $resp = recaptcha_check_answer ($privatekey,
                $_SERVER["REMOTE_ADDR"],
                $_POST["recaptcha_challenge_field"],
                $_POST["recaptcha_response_field"]);
 
        // system sprawdza czy prawid�o zosta�y wprowadzone dane
        if (strlen($login) < 3 or strlen($login) > 30 or !eregi("^[a-zA-Z0-9_.]+$", $login)) {
            $blad++;
            echo '<p>Prosz� poprawny wprowadzi� login (od 3 do 30 znak�w).</p>';
        } else {
            $wynik = mysql_query("SELECT * FROM $tabela WHERE login='$login'");
            if (mysql_num_rows($wynik) <> 0) {
                $blad++;
                echo '<p>Podana nazwa u�ytkownika zosta�a ju� zaj�ta.</p>';
            }
        }
        if (strlen($haslo) < 6 or strlen($haslo) > 30 ) {
            $blad++;
            echo '<p>Prosz� poprawnie wpisa� has�o (od 6 znak�w do 30 znak�w). </p>';
        }
        if ($haslo !== $haslo2) {
            $blad++;
            echo '<p> Podane has�a nie s� ze sob� zgodne. </p>';
        }
        if (!eregi("^[0-9a-z_.-]+@([0-9a-z-]+\.)+[a-z]{2,4}$", $email)) {
            $blad++;
            echo '<p> Prosz� wprowadzi� poprawnie adres email.</p>';
        } else {
            $wynik = mysql_query("SELECT * FROM $tabela WHERE email='$email'");
            if (mysql_num_rows($wynik) <> 0) {
                $blad++;
                echo '<p> Podany adres e-mail jest ju� zaj�ty.</p>';
            }
        }
        if ($email !== $email2) {
            $blad++;
            echo '<p> Podane adresy e-mail nie s� ze sob� zgodne.</p>';
        }
        if (!$resp->is_valid) {
            $error = $resp->error;
            echo '<p>Prosz� wpisa� poprawnie wyrazy z obrazka.</p>';
            $blad++;
        }
 
        // je�eli nie ma �adnego b�edu, u�ytkownik zostaje zarejestronwany i wys�any do niego e-mail z linkiem aktywacyjnym
        if ($blad == 0) {
 
            $haslo = md5($haslo); // zaszyfrowanie hasla
            $kod = uniqid(rand()); // tworzenie unikalnego kodu dla u�ytkownika
 
            $wynik = mysql_query("INSERT INTO $tabela VALUES('', '$imie', '$nazwisko', '$login', '$haslo', '$email', '$kod', NOW(), '')");
            if ($wynik) {
                $list = "Witaj $login !
               Kliknij w poni�szy link, aby aktywowa� swoje konto. http://www.twoja-strona.pl/weryfikacja.php?weryfikacja=potwierdz&amp;kod=$kod";
                mail($email, "Rejestracja u�ytkownika", $list, "From: <kontakt@twoja-strona.pl>");
                echo '<p>Dzi�kujemy za rejestracj�! W ci�gu nabli�szych 5 minut dostaniesz wiadomo�� e-mail z dalszymi wskaz�wkami rejestracji.</p>';
                mysql_close($polaczenie);
                exit;
            }
        }
        mysql_close($polaczenie);
    }
 
    // tworzenie formularza HTML
    echo <<< KONIEC
 
    <form action="rejestracja.php" method="post">
    <input type="hidden" name="wyslane" value="TRUE" />
 
    <p>Imi�: <input type="text" name="imie" /></p>
    <p>Nazwisko: <input type="text" name="nazwisko" /></p>
    <p>Login*: <input type="text" name="login" /></p>
    <p>Has�o*: <input type="password" name="haslo" /></p>
    <p>Powt�rz has�o*: <input type="password" name="haslo2" /></p>
    <p>Adres e-mail*: <input type="text" name="email" /></p>
    <p>Powt�rz adres e-mail*: <input type="text" name="email2" /></p>
KONIEC;
 
    echo recaptcha_get_html($publickey); // wy�wietlanie reCAPTCHA
    echo <<< KONIEC
 
    <p><input type="submit" value="wy�lij" /></p></form>
KONIEC;
 
} else {
    header('Location: / '); // zalogowany u�ytkownik zostaje przekierowany na stron� g��wn�
}
 
?>