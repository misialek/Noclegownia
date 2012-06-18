<?php
	session_start();
	include '../../db.php';
	$login = $_SESSION['login'];
?>
<link rel="stylesheet" href="../../css/style2.css" type="text/css" media="all">
<center>
<br />
     <h1>Zmień hasło</h1><br /><br />
    <form action="admin_haslo.php" method="post">
    <input type="hidden" name="zmien_haslo" value="TRUE" />
    Hasło: <br><input type="password" name="haslo" /><br><br>
    Nowe hasło: <br><input type="password" name="haslo2" /><br><br>
    Powtórz nowe hasło: <br><input type="password" name="haslo3" /><br><br>
    <input type="submit" value="Zmień" /><br>
    </form>
</center>