<?php
session_start();
session_register("zalogowany");
session_register("haslo"); //rejestrujemy jeszcze jedn¹ zmienn¹, która bêdzie przechowywa³a has³o. Przyda siê nam to aby zabezpieczyæ siê przed atakami session poising

//wszystkie zmienne które nie s¹ zmiennymi typu integer a s¹ wprowadzane z wewn¹trz filtrujemy za pomoc¹ funkcji htmlspecialchars. 
//zapobigniemy tym samym atak¹ typu sql injection

mysql_connect("spowiedz.xaa.pl", "spowiedz_user", "qwerty123");
mysql_select_db("spowiedz_cms");

if(!isset($_SESSION["zalogowany"]) || $_SESSION["zalogowany"]==0)$_SESSION["zalogowany"]=0;
else{
$_SESSION["zalogowany"]=intval($_SESSION["zalogowany"]); //identyfikator musi byæ typu integer wiêc, na wszelki wypadek przepuœæmy go przez tê funkcjê
mysql_query("select id from users where user_id=".$_SESSION["zalogowany"]." and user_haslo='".htmlspecialchars($_SESSION["haslo"])."'");
}


if($_POST["haslo"] && $_POST["login"]){
	$wynik=mysql_query("select * from users where user_login='".htmlspecialchars($_POST["login"])."' and user_haslo='".htmlspecialchars($_POST["haslo"])."'");
	if(!mysql_num_rows($wynik))Header("Location: index.php?err=1");
	else{
		$rekord=mysql_fetch_array($wynik);
		$_SESSION["zalogowany"]=$rekord["user_id"];
		$_SESSION["haslo"]=$rekord["user_haslo"];
		Header("Location: index.php");
	}
}

if($_GET["ak"]=="wyl"){$_SESSION["zalogowany"]=0;$_SESSION["haslo"]="";Header("Location: index.php");}

function logowanie_okno($komunikat=""){
	if($komunikat)echo "<br>$komunikat<br>";
	echo "<form action='sesje.php' method=post>";
	echo "Login: <input name=login>";
	echo "<br>Has³o: <input type=password name=haslo>";
	echo "<br><input type=submit value='zaloguj'>";
	echo "</form>";
	echo "Nie masz jeszcze konta? <a href='rejestruj.php'>Zarejestruj siê!</a>";
}
?>
