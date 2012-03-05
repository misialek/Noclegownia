<?php
 
session_start(); // rozpoczêcie sesji
 
if (!isset($_SESSION['login'])) { // dostêp dla niezalogowanego u¿ytkownika
 
    include 'db.php'; // po³±czenie siê z baz± danych
    $tabela = 'users'; // zdefiniowanie tabeli MySQL
   //require_once('recaptchalib.php'); // do³±czenie modu³u reCAPTCHA
 //$privatekey = '6LdCPMUSAAAAAGWSvi767yBGQtFjntar4wQoKfIx'; // prywatny klucz reCAPTCHA
 //   $publickey = '6LdCPMUSAAAAANr7mf2hpdiwI5aYKJE2DNidMAvn'; // publiczny klucz reCAPTCHA
 
    if ($_POST["wyslane"]) { // je¿eli formularz zosta³ wys³any, to wykonuje siê poni¿szy skrypt
 
        // filtrowanie tre¶ci wprowadzonych przez u¿ytkownika
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
 
        // system sprawdza czy prawid³o zosta³y wprowadzone dane
        if (strlen($login) < 3 or strlen($login) > 30 or !eregi("^[a-zA-Z0-9_.]+$", $login)) {
            $blad++;
            echo '<p>Proszê poprawny wprowadziæ login (od 3 do 30 znaków).</p>';
        } else {
            $wynik = mysql_query("SELECT * FROM $tabela WHERE user_login='$login'");
            if (mysql_num_rows($wynik) <> 0) {
                $blad++;
                echo '<p>Podana nazwa u¿ytkownika zosta³a ju¿ zajêta.</p>';
            }
        }
        if (strlen($haslo) < 6 or strlen($haslo) > 30 ) {
            $blad++;
            echo '<p>Proszê poprawnie wpisaæ has³o (od 6 znaków do 30 znaków). </p>';
        }
        if ($haslo !== $haslo2) {
            $blad++;
            echo '<p> Podane has³a nie s± ze sob± zgodne. </p>';
        }
        if (!eregi("^[0-9a-z_.-]+@([0-9a-z-]+\.)+[a-z]{2,4}$", $email)) {
            $blad++;
            echo '<p> Proszê wprowadziæ poprawnie adres email.</p>';
        } else {
            $wynik = mysql_query("SELECT * FROM $tabela WHERE email='$email'");
            if (mysql_num_rows($wynik) <> 0) {
                $blad++;
                echo '<p> Podany adres e-mail jest ju¿ zajêty.</p>';
            }
        }
        if ($email !== $email2) {
            $blad++;
            echo '<p> Podane adresy e-mail nie s¹ ze sob¹ zgodne.</p>';
        }
		
       // if (!$resp->is_valid) {
       //     $error = $resp->error;
       //     echo '<p>Proszê wpisaæ poprawnie wyrazy z obrazka.</p>';
       //    $blad++;
      //  }
 
        // je¿eli nie ma ¿adnego b³edu, u¿ytkownik zostaje zarejestronwany i wys³any do niego e-mail z linkiem aktywacyjnym
        if ($blad == 0) {
 
            $haslo = md5($haslo); // zaszyfrowanie hasla
            $kod = uniqid(rand()); // tworzenie unikalnego kodu dla u¿ytkownika
 
            $wynik = mysql_query("INSERT INTO $tabela VALUES('', '$imie', '$nazwisko', '$login', '$haslo', '$email', '$kod', NOW(), '')");
            if ($wynik) {
                $list = "Witaj $login !
               Kliknij w poni¿szy link, aby aktywowaæ swoje konto. http://www.spowiedz.xaa.pl/200/weryfikacja.php?weryfikacja=potwierdz&kod=$kod";
                mail($email, "Rejestracja u¿ytkownika", $list, "From: <biuro@spowiedz.xaa.pl>");
                echo '<p>Dziêkujemy za rejestracjê! W ci±gu nabli¿szych 5 minut dostaniesz wiadomo¶æ e-mail z dalszymi wskazówkami rejestracji.</p>';
                mysql_close($polaczenie);
                exit;
            }
        }
        mysql_close($polaczenie);
    }

 
  
 
} else {
    header('Location: index.html '); // zalogowany u¿ytkownik zostaje przekierowany na stronê g³ówn±
}
 
?>