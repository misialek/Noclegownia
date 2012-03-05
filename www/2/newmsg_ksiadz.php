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

$zapytanie = "INSERT INTO maile (mail_id,kazanie,pokuta, nadawca, odbiorca, stan, data_nadania)VALUES (0, '{$_POST['kazanie']}', '{$_POST['pokuta']}', '{$_POST['nadawca']}', '{$_POST['odbiorca']}', 'nadana', Now())";

if (empty($_POST['kazanie']) && empty($_POST['pokuta']) && empty($_POST['nadawca']) && empty($_POST['odbiorca']))
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
echo 'Pomyślnie przekazano pokutę';
echo'<br>';
echo'<a href="user.php">Wróć do panelu użytkownika</a>';
}
			else {print '<font color=red><b>BŁĄD: <center></b>Nie można się pomyślnie wyspowiadać. Probój ponownie...</font></center>';}
mysql_close();}else{
print '<form action="newmsg_ksiadz.php" method="post">
Niech Będzie pochwalony Jezus Chrystus. <br>Pozwól, że chwilę poświecę na krótkie kazanie.<br>
<select name="kazanie">
		<option>
		Wszechmogący i miłosierny Boże, oświeć umysł Tego grzesznika,
		aby poznał grzechy, które popełnił i odmienił swoje serce,
		aby szczerze nawrócił się do Ciebie.
		Niech Twoja miłość zjednoczy Tego człowieka z wszystkimi,
		którym wyrządził krzywdę. Niech Duch Święty
		obdarzy go nowym życiem i odnowi w nim miłość,
		aby w jego czynach zajaśniał obraz Twojego Syna,
		który z Tobą żyje i króluje na wieki wieków.
		Amen. 
		</option>
		
		<option>
		Przyjdź, Duchu Święty, i oświeć rozum Tej zbłąkanej owieczki,
		aby przypomniał sobie to wszystko, czym Boga,
		swego najlepszego Ojca, obraził. Skrusz jego serce,
		aby za grzechy swoje szczerze żałował, i umocnij swoją wolę,
		aby wytrwał w dobrym.
		Matko Boża, Ucieczko grzeszników,
		wyproś Temu człowiekowi u Syna swego łaskę dobrej spowiedzi. 
		Aniele Stróżu i Ty, święty Patronie, 
		wstawcie się za nim u tronu Miłosierdzia Bożego.
		Amen. 
		</option>
		
		<option>
		Duchu Święty, Ty znasz wszystkie grzechy tego baranka.
		Dopomóż mu je sobie dokładnie przypomnieć,
		aby mógł za nie Boga przeprosić, 
		szczerze je na spowiedzi zawsze wyznawać i z nich się poprawić.
		Matko Boża, Aniele Stróżu i Ty, - święty Patronie,
		uproście mu łaskę dobrej spowiedzi świętej.
		Amen. 
		</option>
		
	</select><br><br>
   Naznaczam Ci taką oto pokutę: <br><textarea name="pokuta" columns="250" rows="20"  ></textarea><br><br>
   Twoja wiara Cie ocaliła. Idź w pokoju.<br><br><br>';
  





  print' Nadawca: <br><input type="text" name="nadawca" maxsize="50" value="ksiadz" /><br>
   Odbiorca: <br><input type="text" name="odbiorca" maxsize="50"   /><br><br>
   <input type="submit" name="wyslij" value="Daj pokutę"/>
</form>'
;}?>