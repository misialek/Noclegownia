<title>Aktywacja</title>
<?php
 header('refresh: 5; url=http://noclegownia.keed.pl/index.php');
if ($_GET['weryfikacja'] == 'potwierdz') {
 
    include 'db.php';
    $tabela = 'uzytkownik'; // zdefiniowanie tabeli MySQL
 
    $kod = htmlspecialchars(stripslashes(strip_tags(trim($_GET['kod']))), ENT_QUOTES); // filtrowanie $_GET['kod']
   //$kod = strip_tags(trim($_GET['kod']), ENT_QUOTES);
   
    // jeżeli kod znajduje się URL, skrypt najpierw patrzy czy użytkownik ma aktywne konto
    // jeżeli nie ma, wtedy zmienia się jego status, jeżeli nie upłynol 48 godzin od rejestracji
    $wynik = mysql_query("SELECT * FROM $tabela WHERE kod='$kod' and status=1");
    if (mysql_num_rows($wynik) == 1) {
        echo '<p>Aktywowałeś/aś juź swoje konto.</p>';
        exit;
    } else {
        $wynik = mysql_query("DELETE FROM $tabela
         WHERE data<=DATE_SUB(NOW(),INTERVAL 2 DAY) and status=0");
        $wynik = mysql_query("UPDATE $tabela
         SET status='1', data=NOW() WHERE kod='$kod' and status=0");
        $wynik = mysql_query("SELECT * FROM $tabela
         WHERE kod='$kod' and status=1");
        if (mysql_num_rows($wynik) == 1) {
            echo '<p>Dziękujemy. Rejestracja została zakończona poprawnie. Możesz się teraz zalogować.</p>';
        }
    }

 
    // je?eli zosta? wprowadzony z?y link, wy?wietla si? b??d
    if (!$kod or mysql_num_rows($wynik)<>1) {
        echo '<p>Aktywowanie konta nie powiodło się.</p>';
		echo $kod;
		
		    }
    mysql_close($polaczenie);
 
}
 
?>