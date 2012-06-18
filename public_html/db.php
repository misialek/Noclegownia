<?php

//stałe bazy danych
$mysql_host = 'mysql11.000webhost.com';
$mysql_login = 'a2218565_nocleg';
$mysql_haslo = '1234qaz';
$mysql_baza = 'a2218565_nocleg';

// poł±czenie z baz± danych
$polaczenie = mysql_connect($mysql_host, $mysql_login, $mysql_haslo) or die('Bł±d: nie udało się nawi±zać poł±czenia z baz± danych.');
mysql_set_charset("utf8",$polaczenie);
// poł±czenie ze schematem bazy danych
mysql_select_db($mysql_baza) or die('Błąd: nie udało się wybrać schematu bazy danych.');

?>
