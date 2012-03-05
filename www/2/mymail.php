<?
	{@mysql_connect ('spowiedz.xaa.pl' , 'spowiedz_user', 'qwerty123');
	@mysql_select_db ('spowiedz_cms');

	$zapytanie = "SELECT * FROM maile ORDER BY data_nadania DESC";

	if ($r = mysql_query ($zapytanie))
{
	while ($wiersz = mysql_fetch_array ($r))
	{
		if($_SESSION['user'] == $wiersz['odbiorca']) {
		print "<
Od: {$wiersz['nadawca']}
Wysłana: {$wiersz['data_nadania']}
Do: {$wiersz['odbiorca']}
Temat: {$wiersz['tytul']}
{$wiersz['tresc']}
/>";
$user = $_SESSION['user'];
$zapytanie2 = "UPDATE maile SET stan='przeczytana' WHERE odbiorca='$user'";
	mysql_query($zapytanie2);}
	}
}
}
?>