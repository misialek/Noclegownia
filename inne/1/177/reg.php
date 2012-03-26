<?php

 header('refresh: 5; url=http://spowiedz.xaa.pl/177/index.php');
 
session_start(); // rozpocz�cie sesji

 
 
 
if (!isset($_SESSION['login'])) { // dost�p dla niezalogowanego u�ytkownika
 
    include 'db.php'; // po��czenie si� z baz� danych
    $tabela = 'users'; // zdefiniowanie tabeli MySQL
   //require_once('recaptchalib.php'); // do��czenie modu�u reCAPTCHA
 //$privatekey = '6LdCPMUSAAAAAGWSvi767yBGQtFjntar4wQoKfIx'; // prywatny klucz reCAPTCHA
 //   $publickey = '6LdCPMUSAAAAANr7mf2hpdiwI5aYKJE2DNidMAvn'; // publiczny klucz reCAPTCHA
 
    if ($_POST["wyslane"]) { // je�eli formularz zosta� wys�any, to wykonuje si� poni�szy skrypt
 
        // filtrowanie tre�ci wprowadzonych przez u�ytkownika
        $login = htmlspecialchars(stripslashes(strip_tags(trim($_POST["login"]))), ENT_QUOTES);
        $haslo = $_POST["haslo"];
        $haslo2 = $_POST["haslo2"];
        $email = htmlspecialchars(stripslashes(strip_tags(trim($_POST["email"]))), ENT_QUOTES);
        $email2 = htmlspecialchars(stripslashes(strip_tags(trim($_POST["email2"]))), ENT_QUOTES);
        $imie = htmlspecialchars(addslashes(strip_tags(trim($_POST["imie"]))), ENT_QUOTES);
        $nazwisko = htmlspecialchars(addslashes(strip_tags(trim($_POST["nazwisko"]))), ENT_QUOTES);
       // $resp = recaptcha_check_answer ($privatekey,
       //         $_SERVER["REMOTE_ADDR"],
        //        $_POST["recaptcha_challenge_field"],
        //        $_POST["recaptcha_response_field"]);
 
        // system sprawdza czy prawid�o zosta�y wprowadzone dane
        if (strlen($login) < 3 or strlen($login) > 30 or !eregi("^[a-zA-Z0-9_.]+$", $login)) {
            $blad++;
           echo '<p>Proszę o poprawne wprowadzenie loginu (od 3 do 30 znaków).</p>';
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
           echo '<p> Podane adresy e-mail nie są ze soba zgodne.</p>';
        }
		
       // if (!$resp->is_valid) {
       //     $error = $resp->error;
       //     echo '<p>Prosz� wpisa� poprawnie wyrazy z obrazka.</p>';
       //    $blad++;
      //  }
 
        // je�eli nie ma �adnego b�edu, u�ytkownik zostaje zarejestronwany i wys�any do niego e-mail z linkiem aktywacyjnym
        if ($blad == 0) {
 
            $haslo = md5($haslo); // zaszyfrowanie hasla
            $kod = uniqid(rand()); // tworzenie unikalnego kodu dla u�ytkownika
 
            $wynik = mysql_query("INSERT INTO $tabela VALUES('', '$imie', '$nazwisko', '$login', '$haslo', '$email', '$kod', NOW(), '')");
            if ($wynik) {
                $list = "Witaj $login !
               Kliknij w poniższy link, aby aktywować swoje konto. http://www.spowiedz.xaa.pl/177/weryfikacja.php?weryfikacja=potwierdz&kod=$kod";
                mail($email, "Rejestracja użytkownika", $list, "From: <biuro@spowiedz.xaa.pl>");
                echo '<p>Dziękujemy za rejestrację! W ciągu nabliższych 5 minut dostaniesz wiadomość e-mail z dalszymi wskazówkami rejestracji.</p>';
                mysql_close($polaczenie);
                exit;
            }
        }
        mysql_close($polaczenie);
    }

 
  
 
} else {
    header('Location: index.html '); // zalogowany u�ytkownik zostaje przekierowany na stron� g��wn�
}
 
?>


<link href="styles.css" rel="stylesheet" type="text/css">
