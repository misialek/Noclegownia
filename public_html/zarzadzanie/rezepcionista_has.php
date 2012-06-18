<?php
	session_start();
	include '../db.php';
	$login = $_SESSION['login'];
	$uprawnienia=(mysql_query("SELECT * FROM uzytkownik WHERE login='$login' AND typ_konta=30"));
    if (mysql_num_rows($uprawnienia) == 1) {header('Location: uzytkownik_has.php ');}
?>
<link rel="stylesheet" href="../css/style2.css" type="text/css" media="all">
<div style='text-align:left;'>
<a href="uzytkownik.php"><button>Wstecz</button></a>
</div>';
<center>
     <h1>Zmień hasło</h1><br /><br /><br />
    <form action="uzytkownik_haslo.php" method="post">
    <input type="hidden" name="zmien_haslo" value="TRUE" />
    Stare hasło: <br><input type="password" name="haslo" /><br><br>
    Nowe hasło: <br><input type="password" name="haslo2" /><br><br>
    Powtórz nowe hasło: <br><input type="password" name="haslo3" /><br><br>
    <input type="submit" value="Zmień" /><br>
    </form>
<center>