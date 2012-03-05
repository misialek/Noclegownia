<?php
 
//staณe bazy danych
$mysql_host = 'spowiedz.xaa.pl';
$mysql_login = 'spowiedz_user';
$mysql_haslo = 'qwerty123';
$mysql_baza = 'spowiedz_cms';
 
// poณฑczenie z bazฑ danych
$polaczenie = mysql_connect($mysql_host, $mysql_login, $mysql_haslo) or die('Bณฑd: nie udaณo si๊ nawiฑzaๆ poณฑczenia z bazฑ danych.');
 
// poณฑczenie ze schematem bazy danych
mysql_select_db($mysql_baza) or die('Bณฑd: nie udaณo si๊ wybraๆ schematu bazy danych.');
 
?>