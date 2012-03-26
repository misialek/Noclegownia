<?PHP

$sql_host = 'spowiedz.xaa.pl';
$sql_user = 'spowiedz_user';
$sql_password = 'qwerty123';
$sql_baza = 'spowiedz_cms';

if (mysql_connect($sql_host, $sql_user, $sql_password) and mysql_select_db($sql_baza)) {
$zapytanie = mysql_query("SELECT * FROM maile where odbiorca='".$_SESSION['login']."' AND stan='nadane' order by data_nadania desc");
$zapytanie1 = mysql_query("SELECT * FROM maile where odbiorca='ernest'");

/*if (isset($_POST["przeczytana"])) { //jeśli istnieje zmienna cos, czyli punkt b zostal zrealizowany to dalej
if ($_POST[przeczytana] == 'tak') // jeśl zmienna cos jest rowna 1, czyli konkretnemu checkboxowi, wykonuje zapytanie
       {
          $q="update maile set stan=przeczytana where odbiorca='".$_SESSION['login']."'";
            $r=mysql_query($q);         
       }
       else{ 
	   echo'bla bla';
}*/


if ($zapytanie) {

while ($wynik = mysql_fetch_array($zapytanie)or die ('<br><br><br>')) {
echo'<br><br>';

echo'<table  width="600" cellspacing="5"><tr><td width="170" height="10">';
echo'<font color="black"><b>Naznaczona Tobie pokuta:</b></font></td>';

echo'<td align="right"><font color="black"><b><center>Data:</b></font>';
echo $wynik["data_nadania"]."<br></center></td>";
echo'<td align="right"><font color="black"><b><center>';
//echo'<input type="checkbox" name="przeczytana" value="tak" />Oznacz jako przeczytana';
//echo'<input type="submit" value="ok"/>';
echo'<a href="update.php"><input type="submit" value="Oznacz jako przeczytane" /></a>';


echo'</table>';

echo'<table border="3" width="600" cellspacing="5"><tr><td width="70" height="100">';

echo '<font color="black"><b>Kazanie:</b></font><br><br>';
echo $wynik["kazanie"]."<br>";

echo '<font color="black"><b>Pokuta:</b></font><br><br>';
echo $wynik["pokuta"]."<br>";
echo'</td>';



echo'</table><br><br>';


}

} else {
echo "Nie można wykonać zapytania!";
}
mysql_close();
}

?>