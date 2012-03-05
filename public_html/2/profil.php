<?PHP

$sql_host = 'spowiedz.xaa.pl';
$sql_user = 'spowiedz_user';
$sql_password = 'qwerty123';
$sql_baza = 'spowiedz_cms';

if (mysql_connect($sql_host, $sql_user, $sql_password) and mysql_select_db($sql_baza)) {
$zapytanie = mysql_query("SELECT * FROM users  WHERE user_login='".$_SESSION['login']."'");
$zapytanie1 = mysql_query("SELECT COUNT(*)as ILOSC FROM maile  WHERE nadawca='".$_SESSION['login']."'");
if ($zapytanie) {

while ($wynik = mysql_fetch_array($zapytanie)) {
echo'<br><br>';
echo'<div align="left"><font color="black"><b>Nazwa użytkownika:</font>';
echo $wynik["user_login"]."<br><br>";

echo'<font color="black">E-mail:</font>';
echo $wynik["email"]."<br><br>";

echo'<font color="black">Od kiedy na portalu:</b></font>';
echo $wynik["data"]."<br/><br>";



if ($zapytanie1) {

while ($wynik1 = mysql_fetch_array($zapytanie1)) {
echo'<font color="black"><b>Ile razy się spowiadał:</b></font>';
echo $wynik1["ILOSC"]."<br><br></div>";
}
}






echo'<br><br>';
}

} else {
echo "Nie można wykonać zapytania!";
}
mysql_close();
}

?>