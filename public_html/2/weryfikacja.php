<?php
 
if ($_GET['weryfikacja'] == 'potwierdz') {
 
    include 'db.php'; // po³¹czenie siê z baz¹ danych
    $tabela = 'users'; // zdefiniowanie tabeli MySQL
 
    $kod = htmlspecialchars(stripslashes(strip_tags(trim($_GET['kod']))), ENT_QUOTES); // filtrowanie $_GET['kod']
   //$kod = strip_tags(trim($_GET['kod']), ENT_QUOTES);
   
    // je¿eli kod znajduje siê URL, skrypt najpierw patrzy czy u¿ytkownik ma aktywne konto
    // je¿eli nie ma, wtedy zmienia siê jego status, je¿eli nie up³ynê³o 48 godzin od rejestracji
    $wynik = mysql_query("SELECT * FROM $tabela WHERE kod='$kod' and status=1");
    if (mysql_num_rows($wynik) == 1) {
        echo '<p>Aktywowa³eœ ju¿ swoje konto.</p';
        exit;
    } else {
        $wynik = mysql_query("DELETE FROM $tabela
         WHERE data<=DATE_SUB(NOW(),INTERVAL 2 DAY) and status=0");
        $wynik = mysql_query("UPDATE $tabela
         SET status='1', data=NOW() WHERE kod='$kod' and status=0");
        $wynik = mysql_query("SELECT * FROM $tabela
         WHERE kod='$kod' and status=1");
        if (mysql_num_rows($wynik) == 1) {
            echo '<p>Dziêkujemy. Rejestracja zosta³a zakoñczona poprawnie. Mo¿esz siê teraz zalogowaæ.</p>';
        }
    }

 
    // je¿eli zosta³ wprowadzony z³y link, wyœwietla siê b³¹d
    if (!$kod or mysql_num_rows($wynik)<>1) {
        echo '<p>Aktywowanie konta nie powiod³o siê.</p>';
		echo $kod;
		
		    }
    mysql_close($polaczenie);
 
}
 
?>