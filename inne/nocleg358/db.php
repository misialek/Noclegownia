<?php
 
//stałe bazy danych
$mysql_host = 'localhost';
$mysql_login = 'projekt_emil';
$mysql_haslo = 'dzikiwaz358';
$mysql_baza = 'projekt_nocleg';
 
// poł±czenie z baz± danych
$polaczenie = mysql_connect($mysql_host, $mysql_login, $mysql_haslo) or die('Bł±d: nie udało się nawi±zać poł±czenia z baz± danych.');
 
// poł±czenie ze schematem bazy danych
mysql_select_db($mysql_baza) or die('Bł±d: nie udało się wybrać schematu bazy danych.');
 
?>