<?php ob_start(); 

session_start(); // rozpoczęcie sesji
 
if (!isset($_SESSION['login'])) { // dostęp dla niezalogowanego użytkownika
 
    include 'db.php'; // poł±czenie się z baz± danych
    $tabela = 'uzytkownik'; // zdefiniowanie tabeli MySQL
 
    if ($_POST["wyslane"]) { // jeżeli formularz został wysłany, to wykonuje się poniższy skrypt
 
        // filtrowanie tre¶ci wprowadzonych przez użytkownika
        $login = htmlspecialchars(stripslashes(strip_tags(trim($_POST["login"]))), ENT_QUOTES);
        $haslo = $_POST["haslo"];
        $haslo2 = $_POST["haslo2"];
        $email = htmlspecialchars(stripslashes(strip_tags(trim($_POST["email"]))), ENT_QUOTES);
        $email2 = htmlspecialchars(stripslashes(strip_tags(trim($_POST["email2"]))), ENT_QUOTES);
        $imie = htmlspecialchars(addslashes(strip_tags(trim($_POST["imie"]))), ENT_QUOTES);
        $nazwisko = htmlspecialchars(addslashes(strip_tags(trim($_POST["nazwisko"]))), ENT_QUOTES);
		$blad = 0;
 
        // system sprawdza czy prawidło zostały wprowadzone dane
       if ((strlen($login) < 3 or strlen($login) > 30) and (preg_match('/^[a-z\d_]{2,20}$/i', $login))){
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
            echo '<p> Podane hasła nie s± ze sob± zgodne. </p>';
        }
        if (!preg_match("/[(@)]/", $email)) {
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
 
        // jeżeli nie ma żadnego błedu, użytkownik zostaje zarejestronwany i wysłany do niego e-mail z linkiem aktywacyjnym
        if ($blad == 0) {
 
            $haslo = md5($haslo); // zaszyfrowanie hasla
            $kod = uniqid(rand()); // tworzenie unikalnego kodu dla użytkownika
 
            $wynik = mysql_query("INSERT INTO $tabela VALUES('','', '$imie', '$nazwisko', '$login', '$haslo', '$email', '$kod', NOW(),'', '')");
            if ($wynik) {
               $list = "Witaj $login !
               Kliknij w poniższy link, aby aktywować swoje konto. http://www.spowiedz.xaa.pl/noclegownia/weryfikacja.php?weryfikacja=potwierdz&kod=$kod";
                mail($email, "Rejestracja użytkownika", $list, "From: <biuro@spowiedz.xaa.pl>");
                echo '<p>Dziękujemy za rejestrację! W ci±gu nabliższych 5 minut dostaniesz wiadomość e-mail z dalszymi wskazówkami rejestracji.</p>';
                mysql_close($polaczenie);
                exit;          }
        }
        mysql_close($polaczenie);
    }

   
 
} else {
    header('Location: colorbox.php '); // zalogowany użytkownik zostaje przekierowany na stronę główn±
}
 

ob_end_flush(); ?>
