<?php
 
//sta�e bazy danych
$mysql_host = 'localhost';
$mysql_login = 'projekt_emil';
$mysql_haslo = 'dzikiwaz358';
$mysql_baza = 'projekt_nocleg';
 
// po��czenie z baz� danych
$polaczenie = mysql_connect($mysql_host, $mysql_login, $mysql_haslo) or die('B��d: nie uda�o si� nawi�za� po��czenia z baz� danych.');
 
// po��czenie ze schematem bazy danych
mysql_select_db($mysql_baza) or die('B��d: nie uda�o si� wybra� schematu bazy danych.');
 
?>