<link rel="stylesheet" href="../css/style2.css" type="text/css" media="all">
<?php
session_start();
include '../db.php';
$login = $_SESSION['login'];
$uprawnienia=(mysql_query("SELECT * FROM uzytkownik WHERE login='$login' AND typ_konta=30"));
if (mysql_num_rows($uprawnienia) == 1) {header('Location: uzytkownik_zmien_da.php ');}
if(@$_SESSION['zalogowany']==1)
{
		$pola=mysql_query("SELECT * FROM uzytkownik WHERE login='$login'");
		$pole=mysql_fetch_assoc($pola);
		
?><div style='text-align:left;'>
<a href="uzytkownik.php"><button>Wstecz</button></a>
</div>';
<?php 
echo '<center><h1>Edycja danych osobowych</h1><br /><br /><br /><br /><br /><br />
<form action="uzytkownik_zmien_dane.php" method="post">
<table>
                        <input type="hidden" name="zmien_dane" value="TRUE" />
		<tr class="reglbl"><td>Imie:</td><td><input type="text" name="imie" value="'.$pole['imie'].'" /></td></tr>
		<tr class="reglbl"><td>Nazwisko:</td><td><input type="text" name="nazwisko" value="'.$pole['nazwisko'].'" /></td></tr>
		<tr class="reglbl"><td>Adres e-mail:</td><td><input type="text" name="email" value="'.$pole['email'].'" /></td></tr>
</table>
<br /><p><input type="submit" value="Zmień" /></p>
</form>
</center>';
}else{header('Location: ../index.php ');}?>