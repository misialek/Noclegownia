<?php
session_start();
session_register("zalogowany");
session_register("haslo"); //rejestrujemy jeszcze jedn� zmienn�, kt�ra b�dzie przechowywa�a has�o. Przyda si� nam to aby zabezpieczy� si� przed atakami session poising

//wszystkie zmienne kt�re nie s� zmiennymi typu integer a s� wprowadzane z wewn�trz filtrujemy za pomoc� funkcji htmlspecialchars. 
//zapobigniemy tym samym atak� typu sql injection

mysql_connect("spowiedz.xaa.pl", "spowiedz_user", "qwerty123");
mysql_select_db("spowiedz_cms");

if(!isset($_SESSION["zalogowany"]) || $_SESSION["zalogowany"]==0)$_SESSION["zalogowany"]=0;
else{
$_SESSION["zalogowany"]=intval($_SESSION["zalogowany"]); //identyfikator musi by� typu integer wi�c, na wszelki wypadek przepu��my go przez t� funkcj�
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
	echo "<br>Has�o: <input type=password name=haslo>";
	echo "<br><input type=submit value='zaloguj'>";
	echo "</form>";
	echo "Nie masz jeszcze konta? <a href='rejestruj.php'>Zarejestruj si�!</a>";
}
?>
