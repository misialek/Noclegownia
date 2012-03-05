<?
require "sesje.php";
require "naglowek.php";

if($_GET["id"]){
$id=intval($_GET["id"]); //zamieniamy zmienn¹ na liczbe, zapobiega to atakom typu sql injection
if(mysql_num_rows(mysql_query("select wiad_od from wiadomosci where wiad_id=$id and wiad_czyj=0 and wiad_od=".$_SESSION["zalogowany"]))){
mysql_query("delete from wiadomosci where wiad_id=$id");   //sprawdzamy czy wiadomoœæ któr¹ u¿ytkownik chce usun¹æ faktycznie ale¿y do niego
echo "Usuniêto wiadomoœæ!<br>";
}
}

else if($_GET["co"]){
$co=intval($_GET["co"]); //zamieniamy zmienn¹ na liczbe, zapobiega to atakom typu sql injection
if(mysql_num_rows(mysql_query("select wiad_od from wiadomosci where wiad_id=$id and wiad_czyj=0 and wiad_od=".$_SESSION["zalogowany"]))){
mysql_query("update wiadomosci set wiad_przeczytane=1 where wiad_id=$co");          //po raz kolejny zostaje sprawdzony warunek, 
$wynik=mysql_query("select * from wiadomosci where wiad_id=$co and wiad_czyj=0");   //który równie¿ sprawdza w³aœciciela wiadomoœci
$rekord=mysql_fetch_array($wynik);
$nadawca=mysql_fetch_array(mysql_query("select user_login from users where user_id=".$rekord["wiad_od"]));
echo "<br><br><table><tr><td>Nadawca: ".$nadawca["user_login"]."</td><td>Data: ".date("d/m/Y H:i", strtotime($rekord["wiad_data"]))."</td><td><a href='odbiorcza.php?id=".$rekord["wiad_id"]."'>usuñ</a></td></tr>";
echo "<tr><td colspan=3>".$rekord["wiad_temat"]."</td></tr>";
echo "<tr><td colspan=3>".$rekord["wiad_tresc"]."</td></tr>";
echo "</table>";
}
}

else{
$wynik=mysql_query("select * from wiadomosci where wiad_do=".$_SESSION["zalogowany"]." and wiad_czyj=0 order by wiad_data");

echo "<table><tr><td>Nadawca</td><td>Temat</td><td>Data</td><td>&nbsp;</td></tr>";
if(!mysql_num_rows($wynik))echo "<tr><td colspan=4 style='text-align:center'>Nie masz ¿adnych wiadomoœci!</td></tr>";
else while($rekord=mysql_fetch_array($wynik)){
$nadawca=mysql_fetch_array(mysql_query("select user_login from users where user_id=".$rekord["wiad_od"]));
$kw1="";$kw2="";
if(!$rekord["wiad_przeczytane"]){$kw1="<b>";$kw2="</b>";}
echo "<tr><td>".$nadawca["user_login"]."</td><td><a href='odbiorcza.php?co=".$rekord["wiad_id"]."'>$kw1".$rekord["wiad_temat"]."$kw2</td><td>".date("d/m/Y H:i", strtotime($rekord["wiad_data"]))."</td><td><a href='odbiorcza.php?id=".$rekord["wiad_id"]."'>usuñ</a></td></tr>";
}
echo "</table>";
}
require "stopka.php";
?>