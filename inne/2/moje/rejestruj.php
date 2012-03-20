<?php
mysql_connect("spowiedz.xaa.pl", "spowiedz_user", "qwerty123")or die("Nie mo¿na nawi¹zaæ po³¹czenia z baz¹"); //po³¹czenie z baz¹ danych
mysql_select_db("spowiedz_cms")or die("Wyst¹pi³ b³¹d podczas wybierania bazy danych");

function ShowForm($komunikat=""){	//funkcja wyœwietlaj¹ca formularz rejestracyjny
	echo "$komunikat<br>";
	echo "<form action='rejestruj.php' method=post>";
	echo "Login: <input type=text name=login><br>";
	echo "Has³o: <input type=text name=haslo><br>";
	echo "<input type=hidden value='1' name=send>";
	echo "<input type=submit value='Zarejestruj mnie'>";
	echo "</form>";
}
?>
<!DOCTYPE html 
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<title>Formularz rejestracyjny</title>
</head>
<body>
<?php
if($_POST["send"]==1){	//sprawdzanie czy formularz zosta³ wys³any
	if(!empty($_POST["login"]) && !empty($_POST["haslo"])){	//oraz czy uzupe³niono wszystkie dane
		if(mysql_num_rows(mysql_query("select * from users where user_login='".htmlspecialchars($_POST["login"]."'"))))ShowForm("U¿ytkownik o podanym loginie ju¿ istnieje!!!"); // sprawdzanie czy u¿ytkownik o podanej nazwie ju¿ istnieje
		else{
			mysql_query("insert into users values(NULL, '".htmlspecialchars($_POST["login"])."', '".htmlspecialchars($_POST["haslo"])."')"); // zapisywanie rekordu do bazy
			echo "Rejestracja przebieg³a pomyœlnie. Mo¿esz teraz przejœæ do <a href='index.php'>strony g³ównej</a> i siê zalogowaæ.";
			}
	}
	else ShowForm("Nie uzupe³niono wszystkich pól!!!");
}
else ShowForm();
mysql_close(); //zamykanie po³¹czenia z baz¹
?>
</body>
</html>