<?
require "sesje.php";
require "naglowek.php";

if($_POST["tresc"] && $_POST["do"] && $_POST["temat"]){
mysql_query("insert into wiadomosci values(NULL, '".htmlspecialchars($_POST["tresc"])."', ".$_SESSION["zalogowany"].", ".intval($_POST["do"]).", 0, NOW(), '".htmlspecialchars($_POST["temat"])."', 0)");
mysql_query("insert into wiadomosci values(NULL, '".htmlspecialchars($_POST["tresc"])."', ".$_SESSION["zalogowany"].", ".intval($_POST["do"]).", 0, NOW(), '".htmlspecialchars($_POST["temat"])."', 1)");
echo "<br><br>Wys³ano wiadomoœæ!<br>";
}
else if($_POST["submit"]){
echo "<br><br>Nie uzupe³niono wszystkich pól!<br>";
}
echo "<form action='newmsg.php' method=post>";
echo "<br>Temat: <input name=temat size=30>";
echo "<br>Do kogo: <select name=do>";
$wynik=mysql_query("select user_login, user_id from users order by user_login");
while($rekord=mysql_fetch_array($wynik)){
echo "<option value=".$rekord["user_id"].">".$rekord["user_login"];
}
echo "</select><br>";
echo "Treœæ: <br><textarea name='tresc' rows=8 cols=50></textarea>";
echo "<br><input type=submit value='wyœlij wiadomoœæ' name=submit>";
require "stopka.php";
?>