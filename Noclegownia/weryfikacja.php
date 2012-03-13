<title>Aktywacja</title>
<?php
 header('refresh: 5; url=http://localhost/Noclegownia/logowanie.php');
if ($_GET['weryfikacja'] == 'potwierdz') {
 
    include 'db.php'; // po??czenie si? z baz? danych
    $tabela = 'uzytkownik'; // zdefiniowanie tabeli MySQL
 
    $kod = htmlspecialchars(stripslashes(strip_tags(trim($_GET['kod']))), ENT_QUOTES); // filtrowanie $_GET['kod']
   //$kod = strip_tags(trim($_GET['kod']), ENT_QUOTES);
   
    // je?eli kod znajduje si? URL, skrypt najpierw patrzy czy u?ytkownik ma aktywne konto
    // je?eli nie ma, wtedy zmienia si? jego status, je?eli nie up?yn?o 48 godzin od rejestracji
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