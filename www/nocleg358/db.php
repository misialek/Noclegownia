<?php
 
//staณe bazy danych
$mysql_host = 'localhost';
$mysql_login = 'projekt_emil';
$mysql_haslo = 'dzikiwaz358';
$mysql_baza = 'projekt_nocleg';
 
// poณฑczenie z bazฑ danych
$polaczenie = mysql_connect($mysql_host, $mysql_login, $mysql_haslo) or die('Bณฑd: nie udaณo si๊ nawiฑzaๆ poณฑczenia z bazฑ danych.');
 
// poณฑczenie ze schematem bazy danych
mysql_select_db($mysql_baza) or die('Bณฑd: nie udaณo si๊ wybraๆ schematu bazy danych.');
 
?>