<?php

session_start(); // rozpoczęcie sesji

if (!isset($_SESSION['login'])) { // dostęp dla zalogowanego użytkownika

    include 'db.php'; // połączenie się z bazą danych
    $tabela = 'uzytkownik'; // zdefiniowanie tabeli MySQL
    //require_once('recaptchalib.php'); // dołączenie modułu reCAPTCHA
    //$privatekey = 'tu wpisz klucz prywatny'; // prywatny klucz reCAPTCHA
    //$publickey = 'tu wpisz klucz publiczny'; // publiczny klucz reCAPTCHA

    if ($_POST["wyslane"]) { // jeżeli formularz został wysłany, to wykonuje się poniższy skrypt

        // filtrowanie treści wprowadzonych przez użytkownika
        $login = htmlspecialchars(stripslashes(strip_tags(trim($_POST["login"]))), ENT_QUOTES);
        $haslo = $_POST["haslo"];
        $haslo2 = $_POST["haslo2"];
        $email = htmlspecialchars(stripslashes(strip_tags(trim($_POST["email"]))), ENT_QUOTES);
        $email2 = htmlspecialchars(stripslashes(strip_tags(trim($_POST["email2"]))), ENT_QUOTES);
        $imie = htmlspecialchars(addslashes(strip_tags(trim($_POST["imie"]))), ENT_QUOTES);
        $nazwisko = htmlspecialchars(addslashes(strip_tags(trim($_POST["nazwisko"]))), ENT_QUOTES);
     //   $resp = recaptcha_check_answer ($privatekey,
     //           $_SERVER["REMOTE_ADDR"],
     //           $_POST["recaptcha_challenge_field"],
     //           $_POST["recaptcha_response_field"]);

        // system sprawdza czy prawidło zostały wprowadzone dane
        if (strlen($login) < 3 or strlen($login) > 30 or !eregi("^[a-zA-Z0-9_.]+$", $login)) {
            $blad++;
            echo '<p>Proszę poprawny wprowadzić login (od 3 do 30 znaków).</p>';
        } else {
            $wynik = mysql_query("SELECT * FROM $tabela WHERE login='$login'");
            if (mysql_num_rows($wynik) <> 0) {
                $blad++;
                echo '<p>Podana nazwa użytkownika została już zajęta.</p>';
            }
        }
        if (strlen($haslo) < 6 or strlen($haslo) > 30 ) {
            $blad++;
            echo '<p>Proszę poprawnie wpisać hasło (od 6 znaków do 30 znaków). </p>';
        }
        if ($haslo !== $haslo2) {
            $blad++;
            echo '<p> Podane hasła nie są ze sobą zgodne. </p>';
        }
        if (!eregi("^[0-9a-z_.-]+@([0-9a-z-]+\.)+[a-z]{2,4}$", $email)) {
            $blad++;
            echo '<p> Proszę wprowadzić poprawnie adres email.</p>';
        } else {
            $wynik = mysql_query("SELECT * FROM $tabela WHERE email='$email'");
            if (mysql_num_rows($wynik) <> 0) {
                $blad++;
                echo '<p> Podany adres e-mail jest już zajęty.</p>';
            }
        }
        if ($email !== $email2) {
            $blad++;
            echo '<p> Podane adresy e-mail nie są ze sobą zgodne.</p>';
        }
      //  if (!$resp->is_valid) {
      //      $error = $resp->error;
      //      echo '<p>Proszę wpisać poprawnie wyrazy z obrazka.</p>';
      //      $blad++;
      //  }

        // jeżeli nie ma żadnego błedu, użytkownik zostaje zarejestronwany i wysłany do niego e-mail z linkiem aktywacyjnym
        if ($blad == 0) {

            $haslo = md5($haslo); // zaszyfrowanie hasla
            $kod = uniqid(rand()); // tworzenie unikalnego kodu dla użytkownika

            $wynik = mysql_query("INSERT INTO $tabela VALUES('', '$imie', '$nazwisko', '$login', '$haslo', '$email', '$kod', NOW(), '')");
            if ($wynik) {
                $list = "Witaj $login !
                Kliknij w poniższy link, aby aktywować swoje konto. http://www.twoja-strona.pl/weryfikacja.php?weryfikacja=potwierdz=$kod";
                mail($email, "Rejestracja użytkownika", $list, "From: <kontakt@twoja-strona.pl>");
                echo '<p>Dziękujemy za rejestrację! W ciągu nabliższych 5 minut dostaniesz wiadomość e-mail z dalszymi wskazówkami rejestracji.</p>';
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

    <p>Imię: <input type="text" name="imie" /></p>
    <p>Nazwisko: <input type="text" name="nazwisko" /></p>
    <p>Login*: <input type="text" name="login" /></p>
    <p>Hasło*: <input type="password" name="haslo" /></p>
    <p>Powtórz hasło*: <input type="password" name="haslo2" /></p>
    <p>Adres e-mail*: <input type="text" name="email" /></p>
    <p>Powtórz adres e-mail*: <input type="text" name="email2" /></p>
KONIEC;

   // echo recaptcha_get_html($publickey); // wyświetlanie reCAPTCHA
    echo <<< KONIEC

    <p><input type="submit" value="wyślij" /></p></form>
KONIEC;

} else {
    header('Location: / '); // zalogowany użytkownik zostaje przekierowany na stronę główną
}

?>