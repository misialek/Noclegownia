<?PHP

$sql_host = 'spowiedz.xaa.pl';
$sql_user = 'spowiedz_user';
$sql_password = 'qwerty123';
$sql_baza = 'spowiedz_cms';

if (mysql_connect($sql_host, $sql_user, $sql_password) and mysql_select_db($sql_baza)) {
$zapytanie = mysql_query("SELECT * FROM maile where odbiorca='".$_SESSION['login']."'");
$zapytanie1 = mysql_query("SELECT * FROM maile where odbiorca='ernest'");
if ($zapytanie) {

while ($wynik = mysql_fetch_array($zapytanie)) {
echo'<br><br>';

echo'<table  width="600" cellspacing="5"><tr><td width="170" height="10">';
echo'<font color="black"><b>Nadawca:</b></font>';
echo $wynik["nadawca"]."</td>";

echo'<td align="right"><font color="black"><b><center>Data:</b></font>';
echo $wynik["data_nadania"]."<br></center></td>";

echo'<td><a href="daj_pokute.php">Daj pokutę</a></td>';
echo'</table>';

echo'<table border="3" width="600" cellspacing="5"><tr><td width="70" height="100">';

echo '<font color="black"><b>Grzechy:</b></font><br><br></td><td>';
echo $wynik["grzechy"]."<br></center></td>";






echo'</table><br><br>';


}

} else {
echo "Nie można wykonać zapytania!";
}
mysql_close();
}

?>