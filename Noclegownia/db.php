<?php

//stałe bazy danych
$mysql_host = '127.0.0.1';
$mysql_login = 'root';
$mysql_haslo = '1234qaz';
$mysql_baza = 'projekt_nocleg';

// poł±czenie z baz± danych
$polaczenie = mysql_connect($mysql_host, $mysql_login, $mysql_haslo) or die('Bł±d: nie udało się nawi±zać poł±czenia z baz± danych.');
mysql_set_charset("utf8",$polaczenie);
// poł±czenie ze schematem bazy danych
mysql_select_db($mysql_baza) or die('Błąd: nie udało się wybrać schematu bazy danych.');

?>
