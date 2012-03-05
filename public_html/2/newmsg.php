<?php

session_start();
?>
<?php



if (!isset($_SESSION['login']))
 { 
echo'<center>';
echo'<font size="40">';
echo'<font color="white"';
echo'<br><br><br><br><br><br><br>';
echo 'Ta strona wymaga zalogowania';
echo'<br>';
echo'<a href="logowanie.php">Zaloguj sie</a>';
  // header("Location: index.php");
   exit;
}
?>
<? if (isset($_POST['wyslij']))
	{@mysql_connect ('spowiedz.xaa.pl' , 'spowiedz_user', 'qwerty123');
	@mysql_select_db ('spowiedz_cms');

$zapytanie = "INSERT INTO maile (mail_id, tytul, tresc, nadawca, odbiorca, stan, data_nadania)VALUES (0, '{$_POST['temat']}', '{$_POST['tresc']}', '{$_POST['nadawca']}', '{$_POST['odbiorca']}', 'nadane', Now())";

if (empty($_POST['temat']) && empty($_POST['tresc']) && empty($_POST['odbiorca']) && empty($_POST['nadawca']))
{print '<center><font color="red"><h6>BŁĄD: Pola treść, temat, nadawca oraz adresat nie mogą być puste!<br /><br /></h6>';
	print '<a href="newmail.php">Wróć do formularza wysyłania wiadomości.</a></center></font>';
	die;}

if (@mysql_query ($zapytanie)) {
echo'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
echo'<html xmlns="http://www.w3.org/1999/xhtml">';
echo'<head>';
echo'<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
echo'<title>Free Css Template 177</title>';
echo'<link href="styles.css" rel="stylesheet" type="text/css" />';
echo'<center>';
echo'<font size="40">';
echo'<font color="white"';
echo'<br><br><br><br><br><br><br>';
echo 'Wyznano pomyślnie grzechy';
echo'<br>';
echo'<a href="user.php">Wróć do panelu użytkownika</a>';
}
			else {print '<font color=red><b>BŁĄD: <center></b>Nie można się pomyślnie wyspowiadać. Probój ponownie...</font></center>';}
mysql_close();}else{
print '<form action="newmsg.php" method="post">
Ostatni raz u spowiedzi świętej byłem: <br><input type="text" name="temat" size="10" maxsize="40" /><br><br>
   Pana Boga obraziłem nastepującymi grzechami: <br><textarea name="tresc" columns="250" rows="20"  ></textarea><br><br>
   Więcej grzechów nie pamiętam i serdecznie za nie żałuję,<br> a Ciebie Ojcze Duchowny proszę <br>o wysłanie mi rozgrzeszenia i pokutę.<br><br><br>';
  





  print' Nadawca: <br><input type="text" name="nadawca" maxsize="50" value="<? echo $_SESSION["login"]; ?> /><br>
   Odbiorca: <br><input type="text" name="odbiorca" maxsize="50"  value="ksiadz" /><br><br>
   <input type="submit" name="wyslij" value="Wyznaj grzechy"/>
</form>'
;}?>