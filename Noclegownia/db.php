<?php
 
//stałe bazy danych
$mysql_host = 'localhost';
$mysql_login = 'root';
$mysql_haslo = '';
$mysql_baza = 'nocleg';
 
// poł±czenie z baz± danych
$polaczenie = mysql_connect($mysql_host, $mysql_login, $mysql_haslo) or die('Bł±d: nie udało się nawi±zać poł±czenia z baz± danych.');
 
// poł±czenie ze schematem bazy danych
mysql_select_db($mysql_baza) or die('Bł±d: nie udało się wybrać schematu bazy danych.');
 
?>