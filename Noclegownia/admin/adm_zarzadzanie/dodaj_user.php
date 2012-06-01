<?php
session_start(); // rozpoczęcie sesji
$log = $_SESSION['login'];
 
    include '../../db.php'; // poł±czenie się z baz± danych
    $tabela = 'uzytkownik'; // zdefiniowanie tabeli MySQL

	$uprawnienia=(mysql_query("SELECT * FROM uzytkownik WHERE login='$log' AND typ_konta=10"));
    if (mysql_num_rows($uprawnienia) == 1) {
 
    if ($_POST["wyslane"]) { // jeżeli formularz został wysłany, to wykonuje się poniższy skrypt
 
        $login = htmlspecialchars(stripslashes(strip_tags(trim($_POST["login"]))), ENT_QUOTES);
        $haslo = $_POST["haslo"];
        $haslo2 = $_POST["haslo2"];
        $email = htmlspecialchars(stripslashes(strip_tags(trim($_POST["email"]))), ENT_QUOTES);
        $email2 = htmlspecialchars(stripslashes(strip_tags(trim($_POST["email2"]))), ENT_QUOTES);
        $imie = htmlspecialchars(addslashes(strip_tags(trim($_POST["imie"]))), ENT_QUOTES);
        $nazwisko = htmlspecialchars(addslashes(strip_tags(trim($_POST["nazwisko"]))), ENT_QUOTES);
		$typ_konta = $_POST["typ_konta"];
		$blad = 0;
 
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
        if ($blad == 0) {
 
            $haslo = md5($haslo); // zaszyfrowanie hasla
            $kod = uniqid(rand()); // tworzenie unikalnego kodu dla użytkownika
 
            $wynik = mysql_query("INSERT INTO $tabela VALUES('','$typ_konta', '$imie', '$nazwisko', '$login', '$haslo', '$email', '$kod', NOW(),'1', '')");
            if ($wynik) { ?>
			<script language="javascript" type="text/javascript">
			alert('Zmiany zostały wprowadzone.<br />
			Jeżeli utowrzyłeś konto z uprawnieniami recepcjonisty musisz mu przypożątkować noclegownie. ');
			window.location = '../uzytkownicy.php';
		<?php }
        }else{echo '<a href="dodaj_us.php"><button>Wstecz</button>';}
    }
								}else{echo 'Tylko administrator może dodać dowolnego użytkownika';}
 ?>
