<link rel="stylesheet" href="../css/style2.css" type="text/css" media="all">
<?php
session_start();
include '../db.php';
$login = $_SESSION['login'];
if(@$_SESSION['zalogowany']==1)
{
		$pola=mysql_query("SELECT * FROM uzytkownik WHERE login='$login'");
		$pole=mysql_fetch_assoc($pola);

echo '<center><b><h1>Edycja danych osobowych</h1></b><br /><br /><br /><br /><br /><br /><br />
<table style="color:#000;margin:0 0 0 30px" border="0"><form action="zmien_dane.php" method="post">
	<input type="hidden" name="zmien_dane" value="TRUE" />
		<tr class="reglbl"><td>Imie:</td><td><input type="text" name="imie" value="'.$pole['imie'].'" /></td></tr>
		<tr class="reglbl"><td>Nazwisko:</td><td><input type="text" name="nazwisko" value="'.$pole['nazwisko'].'" /></td></tr>
		<tr class="reglbl"><td>Adres e-mail:</td><td><input type="text" name="email" value="'.$pole['email'].'" /></td></tr></table>
     <p><input type="submit" value="Zmień" /></p></form></center>
    </form>
</center>';
echo '<br /><br /><br /><br /><br /><br />
<table style="width: 100%">
<td><a href="uzytkownik.php" style="text-align: left;  padding-left: 30px"><button>Wstecz</button></a></td>
</table>';
}else{header('Location: ../index.php ');}
?>